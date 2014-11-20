<?php //$this->widget( 'ext.EChosen.EChosen' ); ?>

<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
'id'=>'report',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php //echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'quantity',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'menu_id',array('class'=>'span5')); ?>
        <div style="float:left; padding-right:10px">
		<?php //echo $form->textFieldRow($model,'item_id',array('class'=>'span5')); ?>
        <?php  //echo $form->dropDownListRow($model,'item_id',CHtml::listData(Item::model()->findAll(),'name','name'),array('class'=>'chzn-select','prompt'=>'Select Item:'));
		/*$this->widget('ext.select2.ESelect2', array(
              'name' => 'item_id',
              'data' => CHtml::listData(Item::model()->findAll(),'name', 'name'),
              'htmlOptions' => array(
			  'placeholder'=>'Select Item',
			  'style'=>'width:200px;',
                 // 'multiple' => 'multiple',
              ),
          ));*/
		 ?>
        </div>
        <div style="float:left; padding-right:10px">
        <?php echo $form->datepickerRow(
      $model,
      'from',
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
        <?php echo $form->datepickerRow(
      $model,
      'to',
     array(
	 
    'options' => array('language' => 'en','width'=>'80px','format'=>'dd-mm-yyyy',"autoclose"=>true),
	'style'=>'width:80px',
    //'hint' => 'Click inside! This is a super cool date field.',
	'placeholder'=>'dd-mm-yyyy',
    'prepend' => '<i class="icon-calendar"></i>'
    )
    ); ?>
    </div>
		<?php //echo $form->textFieldRow($model,'tableorder_id',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'rate',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'section_id',array('class'=>'span5')); ?>

	<div style="float:left; margin-top:25px">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    
			'buttonType' => 'submit',
			'type'=>'inverse',
			'label'=>'Search',
			
		)); ?>
	</div>
<div style="clear:both;"></div>

<?php $this->endWidget(); ?>
