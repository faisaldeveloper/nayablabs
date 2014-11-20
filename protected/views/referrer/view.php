<?php
$this->breadcrumbs=array(
	'Referrers'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Referrer','url'=>array('index')),
array('label'=>'Create Referrer','url'=>array('create')),
array('label'=>'Update Referrer','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Referrer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Referrer','url'=>array('admin')),
);
?>

<h1>View Referrer #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'address',
		'phone',
		'fax',
		'email',
		'user_id',
		'created_date',
		'updated_date',
),
)); ?>
