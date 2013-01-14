<?php
/**
 * Created by JetBrains PhpStorm.
 * User: allash
 * Date: 03.12.12
 * Time: 20:46
 * To change this template use File | Settings | File Templates.
 */
class UserController extends CController
{
    // Действие по умолчанию. Выведем список пользователей.
/*    public function actionIndex()
    {
        // Получить список всех зарегестрированных пользователей...
        $users = User::model()->findAll();

        // ...и вывести их
        $this->render('users_list', array('users'=>$users));
    }*/

    public function loadModel($id)
    {
        $model=User::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }


    public function actionIndex()
    {
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
            $model->attributes=$_GET['User'];

        $this->render('user',array(
            'model'=>$model,
        ));
    }




    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User']))
        {
            unset($_POST['User']['password']);
            $model->attributes=$_POST['User'];
            if($model->save())
                $this->redirect(array('index','id'=>$model->pk_user));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('user'));
    }




    // Действие регистрации
    public function actionSignup()
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
                // Сохранить полученные данные
                // false нужен для того, чтобы не производить повторную проверку
                $user->save(false);

                // Перенаправить на список зарегестрированных пользователей
                $this->redirect($this->createUrl('user/'));
            }
        }

        // Вывести форму
        $this->render('form_signup', array('form'=>$user));
    }
}
