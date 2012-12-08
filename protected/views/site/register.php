<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
    'Регистрация',
);
?>


<h1>Регистрация</h1>
<div class="form">
    <?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($form)?>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'login')?>*:
        <?php echo CHtml::activeTextField($form,'login'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'Еmail'); ?>*:
        <?php echo CHtml::activeTextField($form,'email') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'password'); ?>*:
        <?php echo CHtml::activePasswordField($form,'password'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($form,'password_repeat'); ?>*:
        <?php echo CHtml::activePasswordField($form,'password_repeat'); ?>
    </div>


    <div class="row submit">
        <?php echo CHtml::submitButton('Зарегистрироваться'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div>