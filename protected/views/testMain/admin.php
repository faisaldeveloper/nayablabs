<?php $panel_id = (int)$_GET['id']; 
if(!empty($panel_id)) $panel_name = Panel::model()->find("id = $panel_id")->name;
?>
<?php echo $this->renderPartial('_form', array('model'=>$TestMain, 'panelid'=>$panel_id)); ?>

<?php
$this->breadcrumbs=array(
	'Test Mains'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TestMain','url'=>array('index')),
array('label'=>'Create TestMain','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('test-main-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h3>Test Heads for Panel <?php echo $panel_name; ?></h3>

<?php /*?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --><?php */?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'test-main-grid',
'dataProvider'=>$model->search($panel_id),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'name',
		//'examination_type_id',
		array('name'=>'examination_type_id', 'type'=>'raw', 'filter'=>CHtml::listData(ExaminationType::model()->findAll(), 'id', 'name'), 'value'=>'$data->examinationType->name'),
		array('name'=>'panel_id','type'=>'raw', 'filter'=>CHtml::listData(Panel::model()->findAll(), 'id', 'name'), 'value'=>'$data->panel->name'),
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
