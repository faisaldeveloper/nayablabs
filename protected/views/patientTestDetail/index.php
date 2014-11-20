<?php
$this->breadcrumbs=array(
	'Patient Test Details',
);

$this->menu=array(
array('label'=>'Create PatientTestDetail','url'=>array('create')),
array('label'=>'Manage PatientTestDetail','url'=>array('admin')),
);
?>

<h1>Patient Test Details</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
