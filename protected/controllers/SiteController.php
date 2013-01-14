<?php


class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $count=Article::model()->count($criteria);

        $pages=new CPagination($count);

        // элементов на страницу
        $pages->pageSize=7;
        $pages->applyLimit($criteria);

        $models = Article::model()->findAll($criteria);

        $this->render('index', array(
            'models' => $models,
            'pages' => $pages
        ));

	}

    public function actionViewTest() {

        // Render view and get content
        // Notice the last argument being `true` on render()
        $content = $this->render('viewTest', array(
            'Test' => 'TestText 123',
        ), true);


    }

    public function actionArticle()
    {
        if(isset($_GET['id']))
        {
            $article = Article::model()->findByPk($_GET['id']);
            $this->render('article', array('article' => $article));
        }
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    public function actionRegister()
    {
        // Создать модель и указать ей, что используется сценарий регистрации
        $user = new User(User::SCENARIO_SIGNUP);

        // Если пришли данные для сохранения
        if(isset($_POST['User']))
        {
            // Безопасное присваивание значений атрибутам
            $user->attributes = $_POST['User'];

            // Проверка данных
            if($user->validate())
            {
                $user->save(false);
                $model = User::model()->find('email=:email', array(':email'=>$_POST['User']['email']));
                $message = "<html><body>Please click this below to activate your membership<br />".
                    Yii::app()->createAbsoluteUrl('site/activate', array('email' => $_POST['User']['email'])).'&pass='.$_POST['User']['password'].'&key='.$model->activation ."
                </body></html>";

                Mailer::newMail($_POST['User']['email'], "Registration Confirmation", $message);
                $this->redirect($this->createUrl('site/MailSent'));
            }
        }

        // Вывести форму
        $this->render('register', array('form'=>$user));
    }

    public function actionActivate()
    {
        if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
        {
            $email = $_GET['email'];
            $model = User::model()->find('email=:email', array(':email'=>$email));
        }

        if(isset($_GET['pass']))
        {
            if (isset($_GET['key']))
            {
                $key = $_GET['key'];

                if($model->activation == $key)
                {
                    $model->activateAccount();
                    $model->save(false);

                    $identity=new UserIdentity($_GET['email'], $_GET['pass']);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);
                    $this->redirect($this->createUrl('site/'));
                }
            }
        }

    }

    public function actionMailSent()
    {
        $this->render('mailsent');
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}