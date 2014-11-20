<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'test-main-form',
	'enableAjaxValidation'=>false,
)); ?>


<?php echo $form->hiddenField($model,'panel_id',array('value'=>$panelid)); ?>
<?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>
	<div style="float:left; padding: 10px 10px">
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span2','maxlength'=>250)); ?>
	</div>
    
    <div style="float:left; padding: 10px 10px">
    <?php echo $form->dropDownListRow($model, 'examination_type_id', CHtml::listData(ExaminationType::model()->findAll(), 'id', 'name')); ?>
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
			'url'=>Yii::app()->baseUrl.'/TestMain/admin/'.$panelid,
			)
			);
		?>
</div>

<?php $this->endWidget(); ?>
