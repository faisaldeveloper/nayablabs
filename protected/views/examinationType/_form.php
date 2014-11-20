<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'examination-type-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>250)); ?>
	</div>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
        
        
        <?php $this->widget(
			'bootstrap.widgets.TbButton',
			array(
			'label' => 'Refresh',
			'type' => 'primary',
			'url'=>Yii::app()->baseUrl.'/ExaminationType/admin',
			)
			);
		?>
</div>

<?php $this->endWidget(); ?>
