<?php $this->widget('application.components.Dialogue',array('action'=>'admin')); ?>
<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>Yii::t('strings','List').' '.Yii::t('strings','User'),'url'=>array('index')),
array('label'=>Yii::t('strings','Manage').' '.Yii::t('strings','User'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('strings','Create').' '.Yii::t('strings','User');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>