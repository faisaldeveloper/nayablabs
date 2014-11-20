<script type="text/javascript">
function StoreSelect(val){
	
if(val==1)
{
	//alert(val);
	document.getElementById("store-set").style.display="block";
	
}
else
{
	document.getElementById("SystemSettings_store_name").value='';
	document.getElementById("store-set").style.display="none";
	
}
}
function warehouse()
{
	//alert("called");
	if($("#SystemSettings_warehouse").attr('checked') )
	{
	$("#store").css("display", "block");
	$('#SystemSettings_menu_type').val("1");
	}
	else
	{
		$('#SystemSettings_store_0').removeAttr('checked');
		$('#SystemSettings_store_1').removeAttr('checked');
		$('#SystemSettings_recipe_calculator').removeAttr('checked');
		$('#SystemSettings_stock_restrickted').removeAttr('checked');
		$('#SystemSettings_menu_type').val("2");
	    $("#store").css("display", "none");	
		 $("#stock_restrickted").css("display", "none");	
	}
	
}
function stock_restrickted()
{
	if($("#SystemSettings_recipe_calculator").attr('checked') )
	{
	//$("#stock_restrickted").css("display", "block");
	//$('#SystemSettings_menu_type').val("1");
	}
	else
	{
		//$('#SystemSettings_store_0').removeAttr('checked');
		//$('#SystemSettings_store_1').removeAttr('checked');
		//$('#SystemSettings_stock_restrickted').removeAttr('checked');
		//$('#SystemSettings_menu_type').val("2");
	  //  $("#stock_restrickted").css("display", "none");	
		
	}
	
	
}
</script>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'system-settings-form',
	'enableAjaxValidation'=>false,
)); ?>



<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->dateField($model,'warehouse',array('class'=>'span5')); ?>
     <?php echo $form->checkBoxRow($model,'warehouse',array('onchange'=>"warehouse()")); ?>
	<?php //echo $form->textFieldRow($model,'store',array('class'=>'span5')); ?>
    <?php
	if($model->warehouse==1)
	$display="block";
	else if($model->warehouse==0)
	$display="none";
	else{}
	if($model->recipe_calculator==1)
	$recipe="'checked'=>'checked'";
	?>
    
    <div id="store" style="margin-left:18px; display:<?php echo $display;?>;">
         <?php echo $form->checkBoxRow($model,'stock_restrickted',array()); ?>
     
        <?php echo $form->checkBoxRow($model,'recipe_calculator',array('onchange'=>'stock_restrickted()')); ?>
        <?php
		if($model->recipe_calculator==1)
		 $stock_display="block";
		 else
		 $stock_display="none";
		 ?>
        <div id="stock_restrickted" style="margin-left:18px;display:<?php echo $stock_display; ?>;" >
        <?php //echo $form->checkBoxRow($model,'stock_restrickted',array()); ?>
        </div>
        <?php
                $storeStatus = array('1'=>'Store', '2'=>'No Store');
                echo $form->radioButtonList($model,'store',$storeStatus,array('separator'=>' ','onchange' => 'StoreSelect(this.value);'));
        ?>
        </div>
        <?php
		
		if($model->store==1)
		{
			$store=Store::model()->find();
		$store_name=$store->name;
		$store_display="block";
		
		}
		else
		{
			$stock_display="none";
		}
		$user=User::model()->find();
		if(count($user)>0)
		{
			$username=$user->username;
			$password=$user->password;
			
		}
		?>
        <div id="store-set" style="display:<?php echo $store_display;?>;">
        <?php  echo $form->textFieldRow($model,'store_name',array('class'=>'span3', 'value'=>$store_name)); ?>
        </div>
        
        <div>
        <?php  echo $form->textFieldRow($model,'username',array('class'=>'span3','value'=>$username)); ?>
        
        </div>
        <div>
        <?php  echo $form->textFieldRow($model,'password',array('class'=>'span3','value'=>$password)); ?>
        </div>
        <div>
        <?php  echo $form->textFieldRow($model,'re_password',array('class'=>'span3')); ?>
        </div>
	<?php  echo $form->hiddenField($model,'menu_type',array('class'=>'span3')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
