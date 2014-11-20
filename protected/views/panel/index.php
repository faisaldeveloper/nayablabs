<?php
$this->breadcrumbs=array(
	'Panels',
);

$this->menu=array(
array('label'=>'Create Panel','url'=>array('create')),
array('label'=>'Manage Panel','url'=>array('admin')),
);
?>

<h1>Panels</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
