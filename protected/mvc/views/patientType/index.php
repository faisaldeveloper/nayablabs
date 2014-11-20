<?php
$this->breadcrumbs=array(
	'Patient Types',
);

$this->menu=array(
array('label'=>'Create PatientType','url'=>array('create')),
array('label'=>'Manage PatientType','url'=>array('admin')),
);
?>

<h1>Patient Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
