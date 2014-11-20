<?php
$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List SystemSettings','url'=>array('index')),
	array('label'=>'Create SystemSettings','url'=>array('create')),
	array('label'=>'View SystemSettings','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage SystemSettings','url'=>array('admin')),
	);
	?>

	<h1>Update SystemSettings </h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>