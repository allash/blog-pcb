<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/swfobject.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script>
        var flashvars = {
        };
        var params = {
            menu: "false",
            scale: "noScale",
            allowFullscreen: "true",
            allowScriptAccess: "always",
            bgcolor: "",
            wmode: "direct" // can cause issues with FP settings & webcam
        };
        var attributes = {
            id:"TestClientServer"
        };
        swfobject.embedSWF(
                "<?php echo Yii::app()->request->baseUrl; ?>/game/TestClientServer.swf",
                "altContent", "100%", "500px", "10.0.0",
                "expressInstall.swf",
                flashvars, params, attributes);
    </script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">Блог</div>
        <div id="login">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => "Регистрация", 'url' => array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
                    array('label' => "Войти", 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest)
                ),
            ));

            ?>
        </div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
<<<<<<< HEAD
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Play!', 'url'=>array('/site/game')),
=======
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>!Yii::app()->user->isAdmin()),
				array('label'=>'Contact', 'url'=>array('/site/contact'), 'visible'=>!Yii::app()->user->isAdmin()),
                array('label'=>'Управление пользователями', 'url'=>array('/user'),'visible'=>Yii::app()->user->isRoot()),
                array('label'=>'Управление статьями', 'url'=>array('/article/admin'), 'visible'=>!Yii::app()->user->isGuest)
>>>>>>> d75c9696454ac08173344fe71c3bc32336bfbfa5
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>



	<?php echo $content; ?>


	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
