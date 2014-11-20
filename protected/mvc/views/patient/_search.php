<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'reg_no',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'patient_type_id',array('class'=>'span5')); ?>		

		<?php echo $form->textFieldRow($model,'referrer_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ref_no',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'father_name',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'age',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'marital_status',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>400)); ?>

		<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'country',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'country_applied_for',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'cnic',array('class'=>'span5','maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($model,'visa_type',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'passport_no',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'place_of_issue',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'position_applied_for',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'recruiting_agent',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'height',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'panel_id',array('class'=>'span5')); ?>

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
