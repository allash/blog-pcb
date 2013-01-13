<?php
/* @var $this ArticleController */
/* @var $model Article */
/*
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->email=>array('view','id'=>$model->pk_user),
	'Update',
);*/

/*$this->menu=array(
	array('label'=>'List Article', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'View Article', 'url'=>array('view', 'id'=>$model->pk_user)),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);*/
?>

<h1>Update User <?php echo $model->pk_user; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>