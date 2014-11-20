<?php
$this->breadcrumbs=array(
	'System Settings'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List SystemSettings','url'=>array('index')),
array('label'=>'Manage SystemSettings','url'=>array('admin')),
);
?>

<h1>SystemSettings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>