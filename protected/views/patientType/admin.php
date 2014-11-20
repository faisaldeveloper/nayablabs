<?php
$this->breadcrumbs=array(
	'Patient Types'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List PatientType','url'=>array('index')),
array('label'=>'Create PatientType','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('patient-type-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Patient Types</h1>


<?php /*?><?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --><?php */?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'patient-type-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'name',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
