<?php
$this->breadcrumbs=array(
	'Patient Test Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PatientTestDetail','url'=>array('index')),
	array('label'=>'Create PatientTestDetail','url'=>array('create')),
	array('label'=>'View PatientTestDetail','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PatientTestDetail','url'=>array('admin')),
	);
	?>

	<h1>Update PatientTestDetail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>