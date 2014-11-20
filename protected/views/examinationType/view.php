<?php
$this->breadcrumbs=array(
	'Examination Types'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List ExaminationType','url'=>array('index')),
array('label'=>'Create ExaminationType','url'=>array('create')),
array('label'=>'Update ExaminationType','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ExaminationType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ExaminationType','url'=>array('admin')),
);
?>

<h1>View ExaminationType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
),
)); ?>
