<?php
$this->breadcrumbs=array(
	'Patient Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PatientType','url'=>array('index')),
array('label'=>'Manage PatientType','url'=>array('admin')),
);
?>

<h1>Create PatientType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>