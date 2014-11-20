<?php $this->widget('application.components.Dialogue',array('action'=>'admin')); ?>
<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>Yii::t('strings','List').' '.Yii::t('strings','User'),'url'=>array('index')),
	array('label'=>Yii::t('strings','Create').' '.Yii::t('strings','User'),'url'=>array('create')),
	array('label'=>Yii::t('strings','View').' '.Yii::t('strings','User'),'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('strings','Manage').' '.Yii::t('strings','User'),'url'=>array('admin')),
	);
	?>

	<h1>Update User <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>