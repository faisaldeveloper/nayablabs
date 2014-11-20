
<?php echo $this->renderPartial('_form', array('model'=>$ExaminationType)); ?>

<?php
$this->breadcrumbs=array(
	'Examination Types'=>array('index'),
	'Manage',
);

$this->menu=array(
//array('label'=>'List ExaminationType','url'=>array('index')),
array('label'=>'Create ExaminationType','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('examination-type-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Examination Types</h1>


<?php /*?><?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --><?php */?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'examination-type-grid',
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
