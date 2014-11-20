<?php //$this->widget('application.components.Dialogue',array('action'=>'admin')); ?>
<?php //$this->widget('application.components.Dialogue',array('action'=>'position','options'=>array('top'=>'50px','width'=>'auto','z_index'=>'1032'))); ?>
<style>
.form-actions {
   border-top: 2px solid #E5E5E5;
   margin-top: 5px;
   padding: 19px 20px 0px 20px;
}
.well{
	padding:19px 19px 0;
	}
</style>
<div class="form">

<?php

$this->beginWidget( 'zii.widgets.jui.CJuiDialog', array(
  'id' => 'categoriesDialog',
   'options' => array(
    'title' => 'Dialog',
    'autoOpen' => false,
	'show'=>array('effect'=> "slideDown",'duration'=>'8000'),
	//'hide'=>array('effect'=> "explode"),
    'modal' => true,
    'width' => '500',//1000 or auto
	'position'=>'center center',//center center
	'dialogClass'=>'ui-dialog',
	
	//'minWidth'=> '100',
	//'minHeight'=> '100',
    'resizable' => true,
	/*'buttons' => array(
array('text'=>'Submit','click'=> 'js:function(){$("#button").click();}'),
array('text'=>'Cancel','click'=> 'js:function(){$(this).dialog("close");}'),
),*/
	'resizeStart'=>'js:function(event, ui) {
			
			
	}',
	'beforeClose'=>"js:function(event, ui) {
	
	}",
	
  ),
  
)); 

echo "<div class='update-dialog-content' >

</div>";


$this->endWidget(); 


$class = 'form-actions';
$formclass = 'well';
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'htmlOptions'=>array('class'=>$formclass,),
	'enableAjaxValidation'=>true,
	
));

?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->
<p class="note"><?php echo Yii::t('strings','Fields with <span class="required">*</span> are required.');?></p>


<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'name',array('maxlength'=>30,'placeholder'=>Yii::t('strings','its Required') )); ?>

<?php echo $form->textFieldRow($model,'username',array('maxlength'=>40,'placeholder'=>Yii::t('strings','its Required') )); ?>

<?php echo $form->passwordFieldRow($model,'password',array('maxlength'=>40,'placeholder'=>'its Required')); ?>

<?php //echo $form->dropDownListRow($model,'password',CHtml::listData(Categories::model()->findAll(),'id','name'),array('empty'=>Yii::t('strings','Select Categories') )); ?>

<?php //echo CHtml::link('<img alt="Add" src="/yiibooster/images/glyphicons/glyphicons/png/glyphicons_432_plus.png" title="Add Category">',array('categories/create/dropDownList/User_password'),array('class'=>'btn update-dialog-create2','id'=>'Create Categories','style'=>'margin-top:-11px;'));?>

<?php //dropDownList/User_password
/*echo CHtml::ajaxLink('Test',$this->createUrl('categories/addnew'),array(
        'onclick'=>'$("#categoriesDialog").dialog("open"); return false;',
		"beforeSend"=>"js:function(){
			
		}",
		"complete"=>'js:function(){
			
		$("#categoriesDialog").dialog("close");	
		}',
        'update'=>'#User_password'
        ),array('id'=>'showcategoriesDialog','class'=>'add_row_ajax'));*/
		?>
<?php
$actions_display='';
if(Yii::app()->request->isAjaxRequest){
$actions_display='none';	
}
?>
<div class="<?php echo $class;?>" style="display:<?php echo $actions_display;?>">
<input type="submit" value="<?php echo $model->isNewRecord ? Yii::t('strings','Create') : Yii::t('strings','Save')?>" 
name="button" id="userbutton" class="btn btn-primary" >
</div>

<?php $this->endWidget(); ?>



















</div>
<script>
$(function(){
	$("div[id$='_em_']").fadeOut(3000, 'linear');
});
</script>
<div id="categoriesDialog"></div>