<?php
$this->breadcrumbs=array(
	'Referrers'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Referrer','url'=>array('index')),
array('label'=>'Manage Referrer','url'=>array('admin')),
);
?>

<h1>Create Referrer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>