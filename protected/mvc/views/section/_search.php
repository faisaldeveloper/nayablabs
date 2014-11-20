<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'program',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'server_name',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'printer_name',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'outlet_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'printer_ip',array('class'=>'span5','maxlength'=>16)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
