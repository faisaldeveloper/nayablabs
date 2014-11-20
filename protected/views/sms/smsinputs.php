<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<style>
#box{
margin: 0;
box-shadow: 0px 4px 9px #000000;
line-height: 100%;
border-radius: 1em;

/*-webkit-box-shadow: 0 1px 15px rgba(0, 0, 0, .4);
-moz-box-shadow: 1px 1px 3px rgba(0, 0, 0, .4);*/
background:#FAFAFA;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a9a9a9', endColorstr='#7a7a7a');
background: -webkit-gradient(linear, left top, left bottom, from(#f0f0f0), to(#fafafa));
background: -moz-linear-gradient(top, #FAFAFA, #CCC);
border: solid 5px #FFF;
width:450px;
height:auto;
margin-left:auto;
margin-right:auto;
}
#page {
    padding-top: 7%;
}

.input-large {
    width: auto;
}
</style>
<script>
$(function(){
logoleftmargin();
});

function logoleftmargin(){
var page_width = $('#page').width();
page_width = (parseFloat(page_width)-141)/2;
$('#mylogo_div').css('margin-left',page_width+'px');
}

	if (window.addEventListener) {
        window.addEventListener('resize', logoleftmargin, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', logoleftmargin);
    }
	
	
</script>
<!--<div id="mylogo_div" style="width:141px; height:50px; margin-left:43%; margin-top:0%;">
<img src="<?php //echo Yii::app()->baseUrl; ?>/images/logo_login.png"  />
</div>-->

<div align="center" style="color:#900"> <h2>SMS MESSAGE CENTER</h2></div>

<div id="box" style="width:585px;"><br><br>
 
 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-form',
	'htmlOptions'=>array('class'=>'form-inline', 'style'=>'margin-left:20px;'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),
)); ?>

		<?php 
		//$model->username="backoffice";
		//$model->password="backoffice";
		
		echo $form->textField($model,'mobile_no', array('class'=>"input-large", 'placeholder'=>"Mobile No")); ?>
		<?php echo $form->error($model,'mobile_no'); ?><br><br>
        
        <?php echo $form->textArea($model,'message', array('maxlength' => 225,'rows' => 3, 'cols' => 80, 'class'=>"input-large", 'placeholder'=>"Message goes here...")); ?>
		<?php echo $form->error($model,'message'); ?><br />
        
        <?php //echo CHtml::textField('password22',$secret, array('class'=>"input-small",'style'=>"width:102px")); ?>
		<?php //echo CHtml::textField('password2','', array('class'=>"input-small", 'placeholder'=>$secret)); ?>
		

    <?php 
	$iscaptcha = Yii::app()->db->createCommand('select value from settings where unit="captcha"')->queryScalar();
	if($iscaptcha){
	$this->widget('CCaptcha', array('imageOptions' => array('style'=>'height:50px'),'buttonOptions' => array('style' => '')));
	?>
    <?php echo $form->textField($model,'verifyCode',array('class'=>"input-large", 'placeholder'=>"Please Enter Code")); 
	}
	?>

<br />
  
  		<?php /*?><?php echo $form->checkBox($model,'rememberMe'); ?>
  		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
<?php */?>        
   <!-- <input type="checkbox"> Remember me-->
  <br>

  <button type="submit" class="btn btn-primary"><?php echo Yii::t('loginlayout','Send Message');?></button>
  
<?php $this->endWidget();?>

 </div>
 <br /> <br />