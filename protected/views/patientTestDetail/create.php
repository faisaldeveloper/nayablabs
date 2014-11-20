<?php 
$myid = (int)$_GET['id'];
?>

<?php
$this->breadcrumbs=array(
	'Patient Test Details'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PatientTestDetail','url'=>array('index')),
array('label'=>'Manage PatientTestDetail','url'=>array('PatientTestDetail/admin/'.$myid)),
);
?>

<h1>Create PatientTestDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>