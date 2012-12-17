<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Статья';
$this->breadcrumbs=array(
    'Статья',
);
?>
<h3><?php echo $article->title;?></h3>
<p><?php echo $article->article; ?></p>
<span>Дата: <?php echo $article->date?></span><br />
<span>Автор: <?php echo $article->author; ?></span>