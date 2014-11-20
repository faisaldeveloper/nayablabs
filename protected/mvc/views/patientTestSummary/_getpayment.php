<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'patient-test-summary-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>	
    
     <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'klt_no',array('class'=>'span1','maxlength'=>100)); ?>
	</div>
    <div style="float:left; padding-right:10px">
     <?php echo $form->datepickerRow(
      $model,
      'examination_date',
     array(
	'options' => array('language' => 'en','width'=>'80px','format'=>'dd-mm-yyyy',"autoclose"=>true),
	 'style'=>'width:80px',
    
    //'hint' => 'Click inside! This is a super cool date field.',
	'placeholder'=>'dd-mm-yyyy',
    'prepend' => '<i class="icon-calendar"></i>'
    )
    ); ?>	
    </div>
    
 

	 <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'price',array('class'=>'span2', 'value'=>$price )); ?>
	</div>
	 <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'discount',array('class'=>'span2', 'value'=>$discount)); ?>
	</div>
    <div style="clear:both"> </div>
	<?php echo $form->textAreaRow($model,'remarks',array('rows'=>3, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->hiddenField($model,'user_id'); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>




