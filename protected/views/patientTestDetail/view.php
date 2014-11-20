<?php
$this->breadcrumbs=array(
	'Patient Test Details'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List PatientTestDetail','url'=>array('index')),
array('label'=>'Create PatientTestDetail','url'=>array('create')),
array('label'=>'Update PatientTestDetail','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete PatientTestDetail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PatientTestDetail','url'=>array('admin')),
);
?>

<h1>View PatientTestDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'test_main_id',
		'test_id',
		'normal_reading',
		'measured_reading',
		'remarks',
		'test_summary_id',
		'user_id',
		'created_date',
		'updated_date',
),
)); ?>
