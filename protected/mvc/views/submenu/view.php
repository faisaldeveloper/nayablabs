<?php
$this->breadcrumbs=array(
	'Submenus'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Submenu','url'=>array('index')),
array('label'=>'Create Submenu','url'=>array('create')),
array('label'=>'Update Submenu','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Submenu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this submenu?')),
array('label'=>'Manage Submenu','url'=>array('admin')),
);
?>

<h1>View Submenu #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'menu_id',
		'name',
		'rate',
),
)); ?>
