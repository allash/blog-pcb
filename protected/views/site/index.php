<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php  if(!Yii::app()->user->isGuest) :
    echo CHtml::link("Написать статью", array("article/"));
endif; ?><br /><br />

<?php foreach($models as $model):?>
<h3><?php echo $model->title;?></h3>
<p><?php echo (strlen($model->article) > 300) ? substr($model->article, 0, 300) . "..." : $model->article;?></p>
   <?php echo CHtml::link("Читать далее...", array('site/article', 'id'=>$model->id)); ?> <br /><br />
<?php endforeach; ?>


<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
));?>

