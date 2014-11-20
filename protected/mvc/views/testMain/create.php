<?php
$this->breadcrumbs=array(
	'Test Mains'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TestMain','url'=>array('index')),
array('label'=>'Manage TestMain','url'=>array('admin')),
);
?>

<h1>Create TestMain</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>