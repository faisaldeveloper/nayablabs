<?php
$this->breadcrumbs=array(
	'Test Mains'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TestMain','url'=>array('index')),
	array('label'=>'Create TestMain','url'=>array('create')),
	array('label'=>'View TestMain','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TestMain','url'=>array('admin')),
	);
	?>

	<h3>Update Test Head <?php //echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>