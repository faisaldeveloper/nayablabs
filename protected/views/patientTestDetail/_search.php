<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'test_main_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'test_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'normal_reading',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'measured_reading',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textAreaRow($model,'remarks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'test_summary_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'updated_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
