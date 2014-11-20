<?php 
$panel_id = (int)$_GET['id'];
if(!empty($panel_id)) $panel_name = Panel::model()->find("id = $panel_id")->name;
?>
<?php echo $this->renderPartial('_form', array('model'=>$Test, 'panelid'=>$panel_id)); ?>

<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Test','url'=>array('index')),
array('label'=>'Create Test','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('test-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
                
<h3>Tests for Panel <?php echo $panel_name; ?></h3>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:block">
	<?php ///$this->renderPartial('_search',array('model'=>$model,)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'test-grid',
'dataProvider'=>$model->search($panel_id),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'name',
		'normal_reading',		
		//'main_id',
		array('name'=>'main_id', 'type'=>'raw', 'filter'=>CHtml::listData(TestMain::model()->findAll("panel_id = $panel_id"), 'id', 'name'), 'value'=>'$data->main->name'),		
		array('name'=>'et', 'header'=>'Examination Type', 'value'=>'$data->main->examinationType->name'),
		
		//array('name'=>'panel_id','type'=>'raw', 'filter'=>CHtml::listData(Panel::model()->findAll(), 'id', 'name'), 'value'=>'$data->panel->name'),
		//'panel_id',
		//'user_id',
		//'created_date',
		/*
		'updated_date',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
