<?php
$this->breadcrumbs=array(
	'Patient Test Summaries'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PatientTestSummary','url'=>array('index')),
array('label'=>'Manage PatientTestSummary','url'=>array('admin')),
);
?>

<h1>Create PatientTestSummary</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>