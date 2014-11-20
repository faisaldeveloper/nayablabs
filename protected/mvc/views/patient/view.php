<?php
$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Patient','url'=>array('index')),
array('label'=>'Create Patient','url'=>array('create')),
array('label'=>'Update Patient','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Patient','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Patient','url'=>array('admin')),
);
?>

<h1>View Patient #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'reg_no',
		'patient_type_id',		
		'referrer_id',
		'ref_no',
		'name',
		'father_name',
		'gender',
		'age',
		'marital_status',
		'address',
		'phone',
		'country',
		'country_applied_for',
		'cnic',
		'visa_type',
		'passport_no',
		'place_of_issue',
		'date_of_issue',
		'position_applied_for',
		'recruiting_agent',
		'height',
		'weight',
		'panel_id',
		'user_id',
		'created_date',
		'updated_date',
),
)); ?>
