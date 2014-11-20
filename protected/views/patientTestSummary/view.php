<?php
$this->breadcrumbs=array(
	'Patient Test Summaries'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List PatientTestSummary','url'=>array('index')),
array('label'=>'Create PatientTestSummary','url'=>array('create')),
array('label'=>'Update PatientTestSummary','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete PatientTestSummary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PatientTestSummary','url'=>array('admin')),
);
?>

<h1>Patient Test Summary<?php //echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id',
		'examination_date',
		'klt_no',
		//'patient_id',
		array('name'=>'patient_id', 'type'=>'raw', 'value'=>$model->patient->name),
		//'panel_id',
		array('name'=>'panel_id', 'type'=>'raw', 'value'=>$model->panel->name),
		'price',
		'discount',
		'remarks',
		array('name'=>'user_id', 'type'=>'raw', 'value'=>$model->user->name),
		//'user_id',
		'created_date',
		//'updated_date',
),
)); ?>
