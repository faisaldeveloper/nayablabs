<?php
$this->breadcrumbs=array(
	'Examination Types',
);

$this->menu=array(
array('label'=>'Create ExaminationType','url'=>array('create')),
array('label'=>'Manage ExaminationType','url'=>array('admin')),
);
?>

<h1>Examination Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
