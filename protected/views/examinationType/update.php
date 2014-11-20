<?php
$this->breadcrumbs=array(
	'Examination Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ExaminationType','url'=>array('index')),
	array('label'=>'Create ExaminationType','url'=>array('create')),
	array('label'=>'View ExaminationType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ExaminationType','url'=>array('admin')),
	);
	?>

	<h1>Update ExaminationType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>