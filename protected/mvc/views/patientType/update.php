<?php
$this->breadcrumbs=array(
	'Patient Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PatientType','url'=>array('index')),
	array('label'=>'Create PatientType','url'=>array('create')),
	array('label'=>'View PatientType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PatientType','url'=>array('admin')),
	);
	?>

	<h1>Update PatientType <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>