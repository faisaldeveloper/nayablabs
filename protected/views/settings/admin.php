<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Settings', 'url'=>array('index')),
	array('label'=>'Create Settings', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#settings-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1> <?php echo Yii::t('views','Manage Settings') ?></h1>
<?php echo CHtml::link('Export to Excel','#',array('style'=>'margin:0 5px;','filename'=>'Daily Sale Report','class'=>'export btn btn-success')); ?>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGroupGridView',array(
'id'=>'item-grid',
'mergeColumns' => ('settingsection_id'),
'type'=>'striped bordered condensed',
	'responsiveTable'=>true,
'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'settingsection.name',
		 array('name'=>'settingsection_id','value'=>'$data->settingsection->name'),
		'description',
		'text',
		
		'unit',
		'value',
		'fieldtype',
		
		//'htmlcode',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
