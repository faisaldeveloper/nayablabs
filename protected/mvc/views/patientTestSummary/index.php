<?php
$this->breadcrumbs=array(
	'Patient Test Summaries',
);

$this->menu=array(
array('label'=>'Create PatientTestSummary','url'=>array('create')),
array('label'=>'Manage PatientTestSummary','url'=>array('admin')),
);
?>

<h1>Patient Test Summaries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
