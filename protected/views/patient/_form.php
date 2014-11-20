<?php //$this->widget('ext.pixelmatrix.EUniform'); ?>
<?php 
/* $this->widget('ext.pixelmatrix.EUniform', array(    //
    // Use your own jQuery selector. Useful to avoid classes of elements.
    'selector' => 'select:not(.no-uniform), input:not(:button), textarea',
    //
    // Styling theme, options available are 'default' and 'aristo'
    'theme' => 'aristo',    //
    // Uniform options, see the documentation
    'options' => array('useID' => false)
)); */


?>


<?php
///echo "========".Yii::app()->session['settings']['examinationtype'];

?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'patient-form',
	//'enableAjaxValidation'=>false,
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'clientOptions' => array('validateOnSubmit'=>true),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

 <fieldset> <legend> Patient Details </legend>

<?php echo $form->errorSummary(array($model, $model_summary)); ?>


	<div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'reg_no',array('value'=>($model->isNewRecord)?($max_reg_value+1):$mdoel->reg_no, 'style'=>'width:50px;','maxlength'=>50, 'readonly'=>readonly)); ?>
	</div>      
    <div style="float:left; padding-right:10px">
    <?php echo $form->dropDownListRow($model, 'referrer_id', CHtml::listData(Referrer::model()->findAll(), 'id', 'name'), array(
	//'empty'=>'----',	
	'style'=>'width:155px;',	
	'onchange' => CHtml::ajax(
						array(
							'type' => 'POST',
							'data'=> array('referrer_id'=>'js:this.value'),
							'url' => CController::createUrl('Patient/getRefNo'),							
							'beforeSend' => 'function(){ $("#res_loader").show(); }',
							//'complete' => 'function(data){alert(data); }',
							'success'=>"function(data){ 
								var obj=$.parseJSON(data);	
								$(\"#res_loader\").hide();											
								$.each(obj,function(index,value){  //alert(index+'--'+value);
										var tp = $('#'+index).attr('type');	
										if(tp=='text'){ $('#'+index).val(value);  }									
										//else  $('#'+index).html(value);
								}); 									
							}",
							//}",		
							//'update'=>'#GuestInfo_guest_address', //selector to update //get id method
							'error'=>'function(xhr, ajaxOptions, thrownError){alert(xhr.status+\'--\'+thrownError); }',			
						)
				)			
		));  ?><span id="res_loader" style="display:none"><img src="<?php echo Yii::app()->baseUrl; ?>/images/processing.gif" alt="pro" /> </span>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'ref_no', array('value'=>($model->isNewRecord)?("$max_ref_no"):$model->ref_no, 'style'=>'width:70px;','maxlength'=>50)); ?>
	</div>
     <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model_summary,'klt_no',array('style'=>'width:50px;','maxlength'=>100)); ?>
	</div>
    
    <div style="float:left; padding-right:10px">    
    <?php echo $form->dropDownListRow($model, 'panel_id', CHtml::listData(Panel::model()->findAll(), 'id', 'name'), array('style'=>'width:150px;',
	'empty'=>'Select Panel',
	 'onchange' => CHtml::ajax(
						array(
							'type' => 'POST',
							'data'=> array('panel_id'=>'js:this.value'),
							'url' => CController::createUrl('Patient/getPanelPrice'),							
							'beforeSend' => 'function(){ if(this.value==\'\') this.xhr.abort(); $("#res_loader2").show(); }',
							//'complete' => 'function(data){alert(data); }',
							'success'=>"function(data){ 
								var obj=$.parseJSON(data);	
								$(\"#res_loader2\").hide();											
								$.each(obj,function(index,value){  //alert(index+'--'+value);
										var tp = $('#'+index).attr('type');	
										if(tp=='text'){ $('#'+index).val(value);  }									
										//else  $('#'+index).html(value);
								}); 		
								updatePayment(0);							
							}",
							//}",		
							//'update'=>'#GuestInfo_guest_address', //selector to update //get id method
							'error'=>'function(xhr, ajaxOptions, thrownError){alert(xhr.status+\'--\'+thrownError); }',			
						)
				)			
		));  ?><span id="res_loader2" style="display:none"><img src="<?php echo Yii::app()->baseUrl; ?>/images/processing.gif" alt="pro" /> </span>
	</div>    
    
   <?php /*?> <div style="float:left; padding-right:10px">
     <?php echo $form->dropDownListRow($model, 'patient_type_id', Settings::model()->getFieldSettings(13), array('class'=>'span2')); ?>
	</div> <?php */?>
   
     <div style="float:left; padding-right:10px">	
     <?php echo $form->dropDownListRow($model_summary, 'patient_test_status', Settings::model()->getFieldSettings(17), array(
	 'class'=>'span2',
	 'onchange' => CHtml::ajax(
						array(
							'type' => 'POST',							
							'url' => CController::createUrl('Panel/getUrgentCharges'),							
							'beforeSend' => 'function(){ $("#res_loader3").show(); }',							
							'success'=>"function(data){ 
								var obj=$.parseJSON(data);	
								$(\"#res_loader3\").hide();											
								$.each(obj,function(index,value){ // alert(index+'--'+value);
										var tp = $('#'+index).attr('type');	
										if(tp=='text'){ $('#'+index).val(value);  }									
										//else  $('#'+index).html(value);
								}); 		
								updatePayment(0);							
							}",
							//}",		
							//'update'=>'#GuestInfo_guest_address', //selector to update //get id method
							'error'=>'function(xhr, ajaxOptions, thrownError){alert(xhr.status+\'--\'+thrownError); }',			
						)
				)			
		));
	?><span id="res_loader3" style="display:none"><img src="<?php echo Yii::app()->baseUrl; ?>/images/processing.gif" alt="pro" /> </span>
	</div>
     
    <div style="float:left; padding-right:10px">   
    <?php echo $form->dropDownListRow($model, 'country_applied_for', CHtml::listData(Country::model()->findAll(), 'id', 'name'), array('style'=>'width:150px;','empty'=>'Select Country')); ?>
	</div>
    
    
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'name',array('style'=>'width:170px;','maxlength'=>250)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'father_name',array('style'=>'width:170px;','maxlength'=>150)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->dropDownListRow($model,'gender',Settings::model()->getFieldSettings(7), array('class'=>'span2')); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'age',array('style'=>'width:40px;','maxlength'=>10)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->dropDownListRow($model,'marital_status', Settings::model()->getFieldSettings(14), array('class'=>'span2')); ?>
	</div>
     <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'phone',array('style'=>'width:150px;','maxlength'=>50)); ?>    
  	</div>    
    
    <!--<div style="clear:both"> </div>-->
        
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'address',array('style'=>'width:365px;','maxlength'=>400)); ?>
	</div>
       
    <div style="float:left; padding-right:10px">  
    <?php echo $form->dropDownListRow($model, 'country', CHtml::listData(Country::model()->findAll(), 'id', 'name'), array('style'=>'width:165px;')); ?>
 	</div>
    
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'cnic',array('class'=>'span2','maxlength'=>15)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->dropDownListRow($model,'visa_type', Settings::model()->getFieldSettings(15), array('class'=>'span2','maxlength'=>100)); ?>
	</div>
    
    <div style="clear:both"> </div>
    
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'passport_no',array('style'=>'width:112px;','maxlength'=>100)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model,'place_of_issue',array('style'=>'width:112px;','maxlength'=>150)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php //echo $form->textFieldRow($model,'date_of_issue',array('class'=>'span2','maxlength'=>150)); ?>
    <?php echo $form->datepickerRow(
      $model,
      'date_of_issue',
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
	<?php echo $form->textFieldRow($model,'position_applied_for',array('class'=>'span5','maxlength'=>250)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php //echo $form->textFieldRow($model,'recruiting_agent',array('class'=>'span2','maxlength'=>250)); ?>
	</div>
    <div style="float:left; padding-right:10px">
    
    <?php echo $form->labelEx($model,'photo_file_name'); ?>
	<?php //echo $form->textFieldRow($model,'height',array('class'=>'span2','maxlength'=>50)); ?>
    	<?php
            $this->widget('CMultiFileUpload', array(
            'model'=>$model,
            "attribute"=>"photo_file_name",
            'name' => "Patient[photo_file_name][]",
            'accept'=>'jpg|gif|png',
            'max' => 1,            
            'options'=>array(
            "onFileSelect"=>"function(e, v, m){            
            }",            
            'afterFileAppend'=>"function(e, v, m){
            var min_val = $('#min').val();
            min_val = parseInt(min_val);
            min_val = min_val+1;
            $('#min').val(min_val);
            }",
            "onFileRemove"=>"function(e, v, m){
            var min_val = $('#min').val();
            min_val = parseInt(min_val);
            min_val = min_val-1;
            $('#min').val(min_val);
            }",
            
            //'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
            ),
            //'htmlOptions' => array('style'=>'width:85px','size'=>1),
            
            ));
		?>    
	</div> </fieldset>
    
   <!--  <div style="clear:both"> </div>-->
    
    <fieldset> <legend> Payment </legend>
      <div style="float:left; padding-right:10px">
     <?php echo $form->datepickerRow(
      $model_summary,
      'examination_date',
      array(
	  'options' => array('language' => 'en','width'=>'80px','format'=>'dd-mm-yyyy',"autoclose"=>true),
	  'style'=>'width:80px',    
	  'value'=>($model_summary->isNewRecord)?date("d-m-Y"):$model_summary->examination_date,
      //'hint' => 'Click inside! This is a super cool date field.',
	  'placeholder'=>'dd-mm-yyyy',
      'prepend' => '<i class="icon-calendar"></i>'
      )
      ); ?>	
    </div>
    
    <div style="float:left; padding-right:10px">
    <?php echo $form->datepickerRow(
      $model_summary,
      'reporting_date',
      array(
	  'options' => array('language' => 'en','width'=>'80px','format'=>'dd-mm-yyyy',"autoclose"=>true),
	  'style'=>'width:80px',    
	  'value'=>($model_summary->isNewRecord)?date("d-m-Y"):$model_summary->reporting_date,
      //'hint' => 'Click inside! This is a super cool date field.',
	  'placeholder'=>'dd-mm-yyyy',
      'prepend' => '<i class="icon-calendar"></i>'
      )
      ); ?>
    
    </div>    
    
     <div style="float:left; padding-right:10px">
        <?php echo $form->timepickerRow(
     		 $model_summary,
      		'reporting_time',
      		 array(
			 'options' => array('showMeridian' => false),
			 'value'=>($model_summary->isNewRecord)?time("H:i"):$model_summary->reporting_time,
			 'style'=>'width:80px', 
			 'prepend' => '<i class="icon-time"></i>'
			 )  
      		); 
		?>    
    </div>
    
        
   <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model_summary,'price',array('style'=>'width:70px;', 'value'=>$price, 'onchange'=>'updatePayment(2)')); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model_summary,'discount_percent',array('style'=>'width:70px;', 'value'=>$discount_percent, 'onchange'=>'updatePayment(1)')); ?>
	</div>
	 <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model_summary,'discount',array('style'=>'width:70px;', 'value'=>$discount, 'onchange'=>'updatePayment(2)')); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model_summary,'urgent_charges',array('style'=>'width:70px;', 'onchange'=>'updatePayment(2)', 'value'=>($model_summary->isNewRecord)?(0):$model_summary->urgent_charges)); ?>
	</div>
    <div style="float:left; padding-right:10px">
	<?php echo $form->textFieldRow($model_summary,'payment',array('style'=>'width:70px;', 'readonly'=>'readonly')); ?>
	</div>
    
    <div style="clear:both"> </div>
	<?php echo $form->textAreaRow($model_summary,'remarks',array('rows'=>3, 'cols'=>50, 'class'=>'span8')); ?>    
   
   </fieldset>
	<?php echo $form->hiddenField($model,'user_id',array('class'=>'span5')); ?>

	<!--<div style="clear:both"> </div>-->

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
			urgent_charges = $("#PatientTestSummary_urgent_charges").val();
			if(urgent_charges=='')urgent_charges=0;
			if(price=='')price=0;
			if(discount=='')discount=0;
			urgent_charges = parseInt(urgent_charges);
			price = parseInt(price);
			discount = parseInt(discount);
			payment = (price + urgent_charges) - (price * (discount/100));
			$("#PatientTestSummary_discount").val(price * (discount/100));
			$("#PatientTestSummary_payment").val(payment);
	}
	else{
			price = $("#PatientTestSummary_price").val();
			discount = $("#PatientTestSummary_discount").val();
			urgent_charges = $("#PatientTestSummary_urgent_charges").val();
			if(urgent_charges=='')urgent_charges=0;
			if(price=='')price=0;
			if(discount=='')discount=0;
			urgent_charges = parseInt(urgent_charges);
			price = parseInt(price);
			discount = parseInt(discount);
			payment = (price + urgent_charges) - discount;
			$("#PatientTestSummary_discount_percent").val((discount/price)*100);
			$("#PatientTestSummary_payment").val(payment);
	}
}

$(document).ready(function(){
	updatePayment(1);
});
</script>
<style type="text/css">.help-block.error { display:none; }</style>
