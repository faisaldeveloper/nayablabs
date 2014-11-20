<?php
if(Yii::app()->user->hasState('store'))
{
	$store_id=Yii::app()->user->getState('store');
	

}
if(Yii::app()->user->hasState('outlet'))
{
	$outlet_id=Yii::app()->user->getState('outlet');
	

}
?>
<div style="padding-bottom:10px;">
<?php
    $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
    'type' => 'inverse',
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Create Section:',
    )
    );

?>
</div>
<?php echo $this->renderPartial('_form', array('section'=>$section,'outlet_id'=>$outlet_id)); ?>
<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Section','url'=>array('index')),
array('label'=>'Create Section','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('section-grid', {
data: $(this).serialize()
});
return false;
});
");
?>



<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div >
<?php
    $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
    'type' => 'inverse',
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Manage Sections:',
    )
    );

?>
</div>
<?php 
if($outlet_id=='')
$outlet=true;
else
$outlet=false;
?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'section-grid',
'type'=>'bordered',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id',
		array(
            'header'=>'Sr#',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
		'name',
		array('header'=>'Outlet','name'=>'outlet_id','value'=>'$data->outlet->name','visible'=>$outlet),
		'program',
		'server_name',
		'printer_name',
		//'outlet_id',
		
		/*
		'printer_ip',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
