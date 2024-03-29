<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'submenu-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'menu_id',array('class'=>'span5')); ?>
    <?php $list = CHtml::listData(Menu::model()->findAll(),'id', 'name'); ?>
 <?php echo $form->dropDownListRow($model, 'menu_id',$list
); ?>
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'rate',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
