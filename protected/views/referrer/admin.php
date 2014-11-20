<?php
$this->breadcrumbs=array(
	'Referrers'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Referrer','url'=>array('index')),
array('label'=>'Create Referrer','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('referrer-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Referrers</h1>


<?php /*?><?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --><?php */?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'referrer-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'name',
		'address',
		'phone',
		'fax',
		'email',
		/*
		'user_id',
		'created_date',
		'updated_date',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
