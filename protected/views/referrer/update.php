<?php
$this->breadcrumbs=array(
	'Referrers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Referrer','url'=>array('index')),
	array('label'=>'Create Referrer','url'=>array('create')),
	array('label'=>'View Referrer','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Referrer','url'=>array('admin')),
	);
	?>

	<h1>Update Referrer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>