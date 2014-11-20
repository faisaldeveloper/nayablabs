<?php
$this->breadcrumbs=array(
	'Panels'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List Panel','url'=>array('index')),
	//array('label'=>'Create Panel','url'=>array('create')),
	//array('label'=>'View Panel','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Panel','url'=>array('admin')),
	);
	?>

	<h1>Update Panel <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>