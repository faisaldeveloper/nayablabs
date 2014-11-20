<?php
$this->breadcrumbs=array(
	'Examination Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ExaminationType','url'=>array('index')),
array('label'=>'Manage ExaminationType','url'=>array('admin')),
);
?>

<h1>Create ExaminationType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>