<?php
$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List SystemSettings','url'=>array('index')),
array('label'=>'Create SystemSettings','url'=>array('create')),
array('label'=>'Update SystemSettings','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete SystemSettings','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SystemSettings','url'=>array('admin')),
);
?>

<h1>View SystemSettings #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'warehouse',
		'store',
		'menu_type',
),
)); ?>
