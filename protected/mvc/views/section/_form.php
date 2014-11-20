
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'section-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($section); ?>
    <div style="float:left; padding-right:10px">
    
	<?php //echo $form->textFieldRow($section,'outlet_id',array('class'=>'span2'));
	if($outlet_id=='')
	{ 
 echo $form->dropDownListRow($section,'outlet_id',CHtml::listData(Outlet::model()->findAll(),'id','name'),array('class'=>'span2')); 
	}
	else
	echo $form->hiddenField($section,'outlet_id',array('class'=>'span5','value'=>$outlet_id));
	?>
    </div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($section,'name',array('class'=>'span2','maxlength'=>30)); ?>
</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($section,'program',array('class'=>'span2','maxlength'=>150)); ?>
</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($section,'server_name',array('class'=>'span2','maxlength'=>30)); ?>
    </div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($section,'printer_name',array('class'=>'span2','maxlength'=>30)); ?>
    </div>
    
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($section,'printer_ip',array('class'=>'span2','maxlength'=>16)); ?>
     </div>
<div style="float:left; margin-top:25px">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'inverse',
			'label'=>$section->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>
<div style="clear:both;"></div>

<?php $this->endWidget(); ?>
