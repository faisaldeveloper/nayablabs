<?php
$this->breadcrumbs=array(
	'Panels'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Panel','url'=>array('index')),
array('label'=>'Create Panel','url'=>array('create')),
array('label'=>'Update Panel','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Panel','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Panel','url'=>array('admin')),
);
?>

<h1>View Panel #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'address',
		'phone',
		'fax',
		'email',
		'test_ids',
		'price',
		'descount',
		'user_id',
		'created_date',
		'updated_date',
),
)); ?>
