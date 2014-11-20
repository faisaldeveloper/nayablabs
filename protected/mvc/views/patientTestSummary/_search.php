<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php //echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>
		<div style="float:left; padding-right:10px">		
        <?php echo $form->datepickerRow(
      	$model,
      	'from_date',
    	 array( 'options' => array('language' => 'es','width'=>'80px','format'=>'yyyy-mm-dd'),
    	//'hint' => 'Click inside! This is a super cool date field.',
   		 'prepend' => '<i class="icon-calendar"></i>'
    	)
    		); ?>
        </div>
        
        <div style="float:left; padding-right:10px">		
        <?php echo $form->datepickerRow(
      	$model,
      	'to_date',
    	 array( 'options' => array('language' => 'es','width'=>'80px','format'=>'yyyy-mm-dd'),
    	//'hint' => 'Click inside! This is a super cool date field.',
   		 'prepend' => '<i class="icon-calendar"></i>'
    	)
    		); ?>
        </div>
        
        <div style="float:left; padding-right:10px">
        <?php // echo $form->textFieldRow($model,'klt_no',array('style'=>'width:50px','maxlength'=>100)); ?>
		</div>
		<?php //echo $form->textFieldRow($model,'patient_id',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'panel_id',array('class'=>'span5')); ?>
		<div style="float:left; padding-right:10px">
		<?php //echo $form->textFieldRow($model,'price',array('style'=>'width:50px')); ?>
		</div>
		<?php //echo $form->textFieldRow($model,'discount',array('class'=>'span5')); ?>

		<?php //echo $form->textAreaRow($model,'remarks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php //echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'updated_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
