<?php
$this->breadcrumbs=array(
	'Test Mains',
);

$this->menu=array(
array('label'=>'Create TestMain','url'=>array('create')),
array('label'=>'Manage TestMain','url'=>array('admin')),
);
?>

<h1>Test Mains</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
