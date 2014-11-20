
<?php $this->widget( 'ext.EChosen.EChosen' ); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'panel-form',
	'enableAjaxValidation'=>false,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'fax',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>150)); ?>

	    
   <?php /*?> <?php 
	if($model->isNewRecord){
	echo $form->dropDownListRow($model, 'test_ids', CHtml::listData(TestMain::model()->findAll(), 'id', 'name'),array('empty'=>'Select Option', 'multiple'=>'multiple', 'class'=>'span5 chzn-select')); 
	}
	else{
		
		$select = array('selected' => 'selected');
		$selected_ids = array();
		$ids = explode(",",$model->test_ids);
		foreach($ids as $testID){ $selected_ids[$testID]= $select; }
		
		echo $form->dropDownListRow($model, 'test_ids', CHtml::listData(TestMain::model()->findAll(), 'id', 'name'),array('empty'=>'Select Option', 'multiple'=>'multiple', 'options' => $selected_ids, 'class'=>'span5 chzn-select')); //echo $model->test_ids;
	}
	?><?php */?>
    
    	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'discount',array('class'=>'span5')); ?>
    <?php echo $form->textFieldRow($model,'urgent_charges',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'user_id',array('class'=>'span5')); ?>



<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
