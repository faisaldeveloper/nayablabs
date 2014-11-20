<?php 
$myid = (int)$_GET['id'];


if($model->isNewRecord==true){
	$res = Yii::app()->db->createCommand()->select("name, panel_id")->from("patient")->where('id=:id', array(':id'=>$myid))->queryRow();
	$patient_name = $res['name'];
	$panel_id = $res['panel_id']; 
	$panel_res = Yii::app()->db->createCommand()->select("name, price, discount")->from("panel")->where('id=:id', array(':id'=>$panel_id))->queryRow();
	$panel_name = $panel_res['name'];		
	$price = $panel_res['price'];	
	$discount = $panel_res['discount'];	
	$discount_percent = 0;
}
else{
	$res_summary = Yii::app()->db->createCommand()->select("patient_id, panel_id")->from("patient_test_summary")->where("id = $myid")->queryRow();
	
	$panel_id = $res_summary['panel_id'];
	$patient_id = $res_summary['patient_id'];
	
	$patient_name = Patient::model()->find("id = $patient_id")->name;
	$panel_name = Panel::model()->find("id = $panel_id")->name;;
	
	$price = $model->price;
	$discount_percent = $model->discount_percent;
	$discount = $model->discount;
}

?>


<h4> Name: <?php echo  ucwords(strtolower($patient_name)); ?> - Panel: <?php echo ucwords(strtolower($panel_name));  ?></h4>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'patient-test-summary-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'examination_date',array('class'=>'span5')); ?>
    
     <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'klt_no',array('class'=>'span1','maxlength'=>100)); ?>
	</div>
    <div style="float:left; padding-right:10px">
     <?php echo $form->datepickerRow(
      $model,
      'examination_date',
      array(
	  'options' => array('language' => 'en','width'=>'80px','format'=>'dd-mm-yyyy',"autoclose"=>true),
	  'style'=>'width:80px',    
      //'hint' => 'Click inside! This is a super cool date field.',
	  'placeholder'=>'dd-mm-yyyy',
      'prepend' => '<i class="icon-calendar"></i>'
      )
      ); ?>	
    </div>
    
    <!--<div style="clear:both"> </div>-->
    
    <div style="float:left; padding-right:10px">	
     <?php echo $form->dropDownListRow($model, 'patient_test_status', Settings::model()->getFieldSettings(17), array('class'=>'span2')); ?>
	</div>

	 <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'price',array('style'=>'width:70px;', 'value'=>$price, 'onchange'=>'updatePayment(2)')); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'discount_percent',array('style'=>'width:70px;', 'value'=>$discount_percent, 'onchange'=>'updatePayment(1)')); ?>
	</div>
	 <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'discount',array('style'=>'width:70px;', 'value'=>$discount, 'onchange'=>'updatePayment(2)')); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'payment',array('style'=>'width:70px;', 'readonly'=>'readonly')); ?>
	</div>
    
    <div style="clear:both"> </div>
	<?php echo $form->textAreaRow($model,'remarks',array('rows'=>3, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->hiddenField($model,'user_id'); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
function updatePayment(x){
	//alert(x);
	if(x==1){  //percentage based calculation
			price = $("#PatientTestSummary_price").val();
			discount = $("#PatientTestSummary_discount_percent").val();
			if(price=='')price=0;
			if(discount=='')discount=0;
			price = parseInt(price);
			discount = parseInt(discount);
			payment = price - (price * (discount/100));
			$("#PatientTestSummary_discount").val(price * (discount/100));
			$("#PatientTestSummary_payment").val(payment);
	}
	else{
			price = $("#PatientTestSummary_price").val();
			discount = $("#PatientTestSummary_discount").val();
			if(price=='')price=0;
			if(discount=='')discount=0;
			price = parseInt(price);
			discount = parseInt(discount);
			payment = price - discount;
			$("#PatientTestSummary_discount_percent").val((discount/price)*100);
			$("#PatientTestSummary_payment").val(payment);
	}
}

$(document).ready(function(){
	updatePayment(1);
});
</script>



<?php /*  $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'patient-test-summary-grid',
'dataProvider'=>$model->searchParticularPatient($myid),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'examination_date',
		'klt_no',
		array('name'=>'patient_id', 'type'=>'raw', 'value'=>'$data->patient->name'),
		//'patient_id',
		array('name'=>'panel_id', 'type'=>'raw', 'value'=>'$data->panel->name'),
		//'panel_id',
		'price',
		'discount',	
		
		array(
			'header' => 'Actions',
			'class' => 'CButtonColumn',
			'template'=>'{regcard}',
			
			'buttons'=>array(
				
					'regcard' => array
					(
					'label'=>'Patient Tests',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/add.png',
					'url'=>'Yii::app()->baseUrl."/PatientTestDetail/admin/$data->id"',
					'options'=>array('title'=>'Patient Tests', 'class'=>'addimg'),
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					),							
								
				),//end buttons
			),//end Actions 
		
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
));  */ ?>

