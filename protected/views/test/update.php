<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Test','url'=>array('index')),
	array('label'=>'Create Test','url'=>array('create')),
	array('label'=>'View Test','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Test','url'=>array('admin')),
	);
	?>

	<h3>Update Test <?php //echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>