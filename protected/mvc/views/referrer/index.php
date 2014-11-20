<?php
$this->breadcrumbs=array(
	'Referrers',
);

$this->menu=array(
array('label'=>'Create Referrer','url'=>array('create')),
array('label'=>'Manage Referrer','url'=>array('admin')),
);
?>

<h1>Referrers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
