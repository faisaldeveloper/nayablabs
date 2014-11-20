<?php
$this->breadcrumbs=array(
	'Test Mains'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List TestMain','url'=>array('index')),
array('label'=>'Create TestMain','url'=>array('create')),
array('label'=>'Update TestMain','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TestMain','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TestMain','url'=>array('admin')),
);
?>

<h1>View TestMain #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'examination_type_id',
),
)); ?>
