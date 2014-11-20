<?php
$this->breadcrumbs=array(
	'Patients'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'List Patient','url'=>array('index')),
array('label'=>'Manage Patient','url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model, 'model_summary'=>$model_summary, 'max_reg_value'=>$max_reg_value, 'max_ref_no'=>$max_ref_no)); ?>