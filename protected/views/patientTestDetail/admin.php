<?php 
$myid = (int)$_GET['id'];
if(empty($myid)){  Yii::app()->user->setFlash('error', 'No Patient is selected.'); Yii::app()->controller->redirect(array ('PatientTestSummary/admin'));  }

$res = Yii::app()->db->createCommand()->select("patient_id, panel_id, klt_no")->from("patient_test_summary")->where('id=:id', array(':id'=>$myid))->queryRow();
$patient_id = $res['patient_id'];
$panel_id = $res['panel_id'];
$klt_no = $res['klt_no'];


$patient_name = Yii::app()->db->createCommand()->select("name")->from("patient")->where('id=:id', array(':id'=>$patient_id))->queryScalar();
$panel_name = Yii::app()->db->createCommand()->select("name")->from("panel")->where('id=:id', array(':id'=>$panel_id))->queryScalar();
?>
<h4> Name: <?php echo  $patient_name; ?> - Panel: <?php echo $panel_name;  ?> - KLT NO : <?php echo $klt_no ; ?></h4>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'patient-test-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($PatientTestDetail); ?>

	<div style="float:left; padding-right:10px">
     <?php echo $form->dropDownListRow($PatientTestDetail, 'test_main_id', CHtml::listData(TestMain::model()->findAll(), 'id', 'name')); ?>
	</div>    
	
    <div style="float:left; padding-right:10px">
     <?php echo $form->dropDownListRow($PatientTestDetail, 'test_id', CHtml::listData(Test::model()->findAll(), 'id', 'name')); ?>
	</div>
    
	<div style="clear:both" ></div>
    
    <div style="float:left; padding-right:10px">
    <?php echo $form->textFieldRow($PatientTestDetail,'measured_reading',array('class'=>'span2','maxlength'=>250)); ?>
    </div>    
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($PatientTestDetail,'normal_reading',array('class'=>'span2','maxlength'=>250)); ?>	
	</div>    
    
    
	<?php echo $form->textAreaRow($PatientTestDetail,'remarks',array('rows'=>1, 'cols'=>20, 'class'=>'span3')); ?>	
    <div style="clear:both" ></div>   
	<?php echo $form->hiddenField($PatientTestDetail,'user_id'); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$PatientTestDetail->isNewRecord ? 'Create' : 'Save',
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

<?php
$this->breadcrumbs=array(
	'Patient Test Details'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List PatientTestDetail','url'=>array('index')),
array('label'=>'Create PatientTestDetail','url'=>array('PatientTestDetail/create/'.$myid)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('patient-test-detail-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Patient Test Details</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'patient-test-detail-grid',
'dataProvider'=>$model->search2($myid),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		
		//'test_main_id',
		array('name'=>'test_main_id', 'type'=>'raw', 'value'=>'$data->testMain->name'),
		//'test_id',
		array('name'=>'test_id', 'type'=>'raw', 'value'=>'$data->test->name'),
		
		'normal_reading',
		'measured_reading',
		'remarks',
		/*
		'test_summary_id',
		'user_id',
		'created_date',
		'updated_date',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
