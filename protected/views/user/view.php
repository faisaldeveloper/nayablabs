<?php $this->widget('application.components.Dialogue',array('action'=>'position')); ?>

<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>Yii::t('strings','List').' '.Yii::t('strings','User'),'url'=>array('index')),
array('label'=>Yii::t('strings','Create').' '.Yii::t('strings','User'),'url'=>array('create')),
array('label'=>Yii::t('strings','Update').' '.Yii::t('strings','User'),'url'=>array('update','id'=>$model->id)),
array('label'=>Yii::t('strings','Delete').' '.Yii::t('strings','User'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('strings','Are you sure you want to delete this item?') )),
array('label'=>Yii::t('strings','Manage').' '.Yii::t('strings','User'),'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('strings','View').' '.Yii::t('strings','User');?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'username',
		'password',
),
)); ?>

<script>
$(function(){
	
$( "button:contains('Submit')" ).hide();

//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
//$( "button .ui-button-text" ).hide();
//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
//$( ".ui-button-text" ).parent('button').hide();
//$( "button:nth-child(2)" ).hide();

});

</script>
