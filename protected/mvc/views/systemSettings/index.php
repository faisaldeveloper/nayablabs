<?php
$this->breadcrumbs=array(
	'System Settings',
);

$this->menu=array(
array('label'=>'Create SystemSettings','url'=>array('create')),
array('label'=>'Manage SystemSettings','url'=>array('admin')),
);
?>

<h1>System Settings</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
