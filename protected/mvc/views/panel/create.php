<?php
$this->breadcrumbs=array(
	'Panels'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Panel','url'=>array('index')),
array('label'=>'Manage Panel','url'=>array('admin')),
);
?>

<h3>Create Panel</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>