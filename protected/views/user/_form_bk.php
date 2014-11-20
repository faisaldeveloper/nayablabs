<?php $this->widget('application.components.Dialogue',array('action'=>'position')); ?>

<style>

.formactions {
   border-top: 2px solid #E5E5E5;
   margin-top: 5px;
   padding: 19px 20px 0px 20px;
}
input[placeholder]{
	font-size:12px;
}

</style>

<div class="form">
<?php 
/*
$ajaxvalidation = false;
$clientvalidation = false;
$class = 'form-actions';
$formclass = 'well';
if(Yii::app()->request->isAjaxRequest ){
	$ajaxvalidation = true;
	$clientvalidation = true;
	$class = 'formactions';
	$formclass = '';
}
*/
?>
<script>
/*
function myvalidation(){//client side validation
var err = 0;
$.each($('label.required'),function(){
value = $(this).text();
alert(value);
value = value.replace("*", "");
$(this).next('input').val();

var val = $(this).next('input').val();


if(val.length>0){
$(this).next('input').css('border-color', '#ccc').css('color', '#555555');
}else{
$(this).next('input').css('border-color', 'red').css('color', 'red').attr('placeholder',value+' is required');
$(this).next('input').next('div.help-block.error').hide();
err++;
}

});
return false;
if(err>0){return true;}else{return false;}

}//end validation function

function aftervalidateajax(jsondata){//after ajaxvalidation
var data = $.parseJSON(jsondata);
$('input[id^="User"]').css('border-color', '#ccc').css('color', '#555555');
$.each(data,function(index,value){
	alert(index+' - '+value);
	$('#'+index).css('border-color', 'red').css('color', 'red');
	$('#'+index).next('div.help-block.error').hide();
	});	

}
*/
</script>

<?php

//,'afterValidate'=>'js:myvalidation'
/*
'enableClientValidation'=>true,
	
    'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>false,'validateOnChange'=>false,
	'afterValidate'=>'js:function(form,data,hasError){alert("after validate");
		var clientsideerrors = myvalidation();
		alert(clientsideerrors);
		if(jQuery.isEmptyObject(data)) {//no error so submit
               return true;
            }	
			
		
			
						if(!clientsideerrors){
                        data = form.serializeObject();
						data["ajax"] = "user-form";
                                $.ajax({
                                        "type":"POST",
                                        "url":"'.Yii::app()->request->url.'",
                                        "data":data,
                                        "success":function(data){alert(data);aftervalidateajax(data);},
                                        
                                        });
						}
                        }'
	),*/
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	//'action'=>CHtml::normalizeUrl(array('user/create')),
	//'htmlOptions'=>array('class'=>$formclass,),
	'enableAjaxValidation'=>true,
	
));

?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php /*?><div class="row" >
	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name',array('maxlength'=>50)); ?>
    <?php $form->error($model,'name'); ?>
</div><?php */?>

 <?php //echo $form->datepickerRow($model, 'name',array('prepend'=>'<i class="icon-calendar"></i>')); ?>
 
	<?php echo $form->textFieldRow($model,'name',array('maxlength'=>30,'placeholder'=>'its Required')); ?>
    
	<?php //echo $form->textFieldRow($model,'username',array('maxlength'=>40,'placeholder'=>'its Required')); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('maxlength'=>40,'placeholder'=>'its Required')); ?>
    
<?php echo $form->ckEditorRow($model, 'username', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));?>

<div class="<?php echo $class;?>">

	<?php /*$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		));
		
		
		$this->widget("zii.widgets.jui.CJuiButton",array(
		"name"=>"button",
		"id"=>'mybuttom',
		"caption"=>$model->isNewRecord ? 'Create' : 'Save',
		"value"=>"asd",
		
		//"style"=>"color:#ffffff;width:150px;height:40px;font-size:16px",
		'htmlOptions' => array('class'=>'btn btn-primary btn-large'),
		)
		);*/
		
		?>
<input type="submit" value="<?php echo $model->isNewRecord ? 'Create' : 'Save'?>" 
name="button" id="button" class="btn btn-primary">

</div>

<?php $this->endWidget(); ?>

</div>
<script>

$(function(){
	//$("div.help-block.error").hide(2000);
	 $("div[id$='_em_']").fadeOut(3000, 'linear');
	 //$("input.error").css('background','green');
	 //$("div.help-block.error").slideUp(2000, 'linear');

	 //$("div").hasClass('error').slideUp(2000, 'linear');
	 
	  /*$("div[id$='_em_']").animate({
		opacity: 0.25,
		left: '+=50',
		height: 'toggle'
		}, 5000, function() {
		// Animation complete.
		});
		
		$("div[class*='error']").animate({
		opacity: 0.25,
		left: '+=50',
		height: 'toggle'
		}, 5000, function() {
		// Animation complete.
		});*/
		
		

//$('#User_username_em_').hide();	
});


</script>