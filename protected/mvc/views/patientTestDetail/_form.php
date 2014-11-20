<?php 
$myid = (int)$_GET['id'];
$res = Yii::app()->db->createCommand()->select("patient_id, panel_id")->from("patient_test_summary")->where('id=:id', array(':id'=>$myid))->queryRow();
$patient_id = $res['patient_id'];
$panel_id = $res['panel_id'];

$patient_name = Yii::app()->db->createCommand()->select("name")->from("patient")->where('id=:id', array(':id'=>$patient_id))->queryScalar();
$panel_name = Yii::app()->db->createCommand()->select("name")->from("panel")->where('id=:id', array(':id'=>$panel_id))->queryScalar();
?>

<h4> Name: <?php echo  $patient_name; ?> - Panel: <?php echo $panel_name;  ?></h4>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'patient-test-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	
    <div style="float:left; padding-right:10px">
     <?php echo $form->dropDownListRow($model, 'test_main_id', CHtml::listData(TestMain::model()->findAll(), 'id', 'name')); ?>
	</div>   
	
    <div style="float:left; padding-right:10px">
     <?php echo $form->dropDownListRow($model, 'test_id', CHtml::listData(Test::model()->findAll(), 'id', 'name')); ?>
	</div>    
	<div style="clear:both" ></div>
    
    <div style="float:left; padding-right:10px">
    <?php echo $form->textFieldRow($model,'measured_reading',array('class'=>'span2','maxlength'=>250)); ?>
    </div>
    
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'normal_reading',array('class'=>'span2','maxlength'=>250)); ?>	
	</div>
    
    <div style="clear:both" ></div>
    
	<?php echo $form->textAreaRow($model,'remarks',array('rows'=>2, 'cols'=>30, 'class'=>'span8')); ?>   
	<?php echo $form->hiddenField($model,'user_id'); ?>

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
			'url'=>Yii::app()->baseUrl.'/PatientTestDetail/admin/'.$myid,
			)
			);
		?>
</div>

<?php $this->endWidget(); ?>