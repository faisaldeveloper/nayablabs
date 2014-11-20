


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'test-form',
	'enableAjaxValidation'=>false,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->hiddenField($model,'panel_id',array('value'=>$panelid)); ?>
	<?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id)); ?>

	<div style="float:left; padding: 10px 10px">
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span2','maxlength'=>250)); ?>	
    </div>
    <div style="float:left; padding: 10px 10px">
     <?php echo $form->dropDownListRow($model, 'main_id', CHtml::listData(TestMain::model()->findAll("panel_id = $panelid"), 'id', 'name')); ?>
	</div>
    <div style="float:left; padding: 10px 20px">
	<?php echo $form->textFieldRow($model,'normal_reading',array('class'=>'span2','maxlength'=>250)); ?>
	</div>  
   <!-- <div style="float:left; padding: 10px 10px">
     <?php //echo $form->dropDownListRow($model, 'panel_id', CHtml::listData(Panel::model()->findAll(), 'id', 'name')); ?>
	</div>
	-->


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
			'url'=>Yii::app()->baseUrl.'/test/admin/'.$panelid,
			)
			);
		?>
        
      
</div>

<?php $this->endWidget(); ?>
