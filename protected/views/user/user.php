<?php
/* @var $this ArticleController */
/* @var $model Article */

/*$this->breadcrumbs=array(
    'Articles'=>array('index'),
    'Manage',
);*/
/*
$this->menu=array(
    array('label'=>'List Article', 'url'=>array('index')),
    array('label'=>'Create Article', 'url'=>array('create')),
);*/

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('article-grid', {
        data: $(this).serialize()
    });
    return false;
});
");*/
?>

<h1>Управление пользователями</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'article-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'pk_user',
        'dtime_registration',
        'login',
        'password',
        'email',
        'role',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
        ),
    ),
)); ?>
