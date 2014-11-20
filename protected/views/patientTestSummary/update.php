<?php
$this->breadcrumbs=array(
	'Patient Test Summaries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List PatientTestSummary','url'=>array('index')),
	//array('label'=>'Create PatientTestSummary','url'=>array('create')),
	//array('label'=>'View PatientTestSummary','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PatientTestSummary','url'=>array('admin')),
	);
	?>

	<h1>Update PatientTestSummary <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>