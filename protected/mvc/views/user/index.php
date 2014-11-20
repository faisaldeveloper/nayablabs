<?php
$this->breadcrumbs=array(
	'User',
);

$this->menu=array(
array('label'=>'Create User','url'=>array('create')),
array('label'=>'Manage User','url'=>array('admin')),
);
?>

<h1>User</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'htmlOptions'=>array('class'=>'well'),
'itemView'=>'_view',
)); ?>
