<?php
$test_summary_id = (int)$_GET['id'];

$res_summary = Yii::app()->db->createCommand()->select("examination_date, patient_id, panel_id, price")->from("patient_test_summary")->where("id = $test_summary_id")->queryRow();
$examination_date = $res_summary['examination_date'];
$patient_id = $res_summary['patient_id'];
$panel_id = $res_summary['panel_id'];
$panel_name = Panel::model()->find("id =". $panel_id)->name;
$price = $res_summary['price'];

$res_patient = Yii::app()->db->createCommand()->select("reg_no, ref_no, name, father_name, phone, age")->from("patient")->where("id = $patient_id")->queryRow();
$reg_no = $res_patient['reg_no'];
$ref_no = $res_patient['ref_no'];
$name = $res_patient['name'];
$father_name = $res_patient['father_name'];
$phone = $res_patient['phone'];
$age = $res_patient['age'];

/////////////////////Get Test values
// query for physical exam
$sql = "select t.id, t.name from Test t Inner JOIN test_main tm ON tm.id = t.main_id Inner JOIN examination_type et ON et.id = tm.examination_type_id WHERE et.id = 1 and tm.panel_id = $panel_id Order by tm.id, t.id";
$arr_physical_tests =  Yii::app()->db->createCommand($sql)->queryAll();

// query for medical exam
$sql = "select t.id, t.name from Test t Inner JOIN test_main tm ON tm.id = t.main_id Inner JOIN examination_type et ON et.id = tm.examination_type_id WHERE et.id = 2 and tm.panel_id = $panel_id Order by tm.id, t.id";
$arr_tests =  Yii::app()->db->createCommand($sql)->queryAll();



 ?>
 <style>
 table{	margin-left: 10px;	}
	.container_mce{		border: 1px solid;	}
	#tr_input2{		border-bottom: 1px solid;	}
	
	#tbl_phy_exam{
		margin-left:15px
		padding: 0px 0px;
		margin-bottom: 5px;
	}
/* 	
table td, table th {
    padding: 0px 0px;
    text-align: left;
} */
body{	line-height:8px; }
 </style>
 
 
<div class="container_mce">
  <table width="100%" border="0" style="line-height:20px;">
  <tr>
    <td width="16%">&nbsp;Acc.ID</td>
    <td width="32%">&nbsp;<?php echo $reg_no; ?></td>
    <td width="16%">&nbsp;</td>
    <td width="10%">&nbsp;Phone:</td>
    <td width="26%">&nbsp;<?php echo $phone; ?></td>    
  </tr>
  <tr>
   <td>&nbsp;Patient Name:</td>
    <td>&nbsp;<?php echo strtoupper($name). " S/O ". strtoupper($father_name);  ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;Age:</td>
    <td>&nbsp;<?php echo $age." Years"; ?></td>   
  </tr>
   <tr>
   <td>&nbsp;Receiving Date:</td>
    <td>&nbsp;<?php echo ""; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;Ref By:</td>
    <td>&nbsp;<?php echo ""; ?></td>   
  </tr>
    <tr>
   <td>&nbsp;Design / Ref No:</td>
    <td>&nbsp;<?php echo $ref_no; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;Panel:</td>
    <td>&nbsp;<?php echo $panel_name; ?></td>   
  </tr>
</table>

<br />

<h5>TEST NAME</h5>
<p> UAE MEDICAL </p>
 <div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>

<div align="center">


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'patient-test-detail-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->hiddenField($model,'test_summary_id', array('value'=>$test_summary_id)); 	?>

<div style="float:left; width:350px;">
<h5>Physical Examination</h5>
	
    	
 <table align="center" width="100%" border="0" id="tbl_phy_exam">
 	<?php 
	foreach($arr_physical_tests as $row){
		echo $form->hiddenField($model,'test_ids[]', array('value'=>$row['id']));		
		$val = PatientTestDetail::getTestValue($row['id'], $test_summary_id); // hard coded id		
	?>
  <tr id="tr_input">
    <td width="51%">&nbsp;<?php echo $row['name'] ?></td>
    <td width="49%">&nbsp;<?php echo $form->textFieldRow($model,'measured_reading[]',array('value'=>$val, 'class'=>'span2','maxlength'=>50, 'labelOptions' => array("label" => false))); ?>
    		<?php 
			//if(strpos($row['name'],'X-RAY') !== false || strpos($row['name'],'Chest X-RAY') !== false){ // check if name contains word x-ray
			if(stristr($row['name'],'X-RAY')){
				$rmks  = PatientTestDetail::getTestRemarks($row['id'], $test_summary_id); // hard coded id	 
				$vv2 = $row['id'];
				echo "<br />"; 
				echo $form->textAreaRow($model,'remarks['.$vv2.']',array('value'=>($model->isNewRecord)?"":("$rmks"), 'class'=>'span2','rows'=>6, 'cols'=>50, 'labelOptions' => array("label" => false)));
				//echo $form->textAreaRow($model,'address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); 
				 } ?>
    </td>
    
            
  </tr>
  <?php }?>

  </table>
  
<?php /*?>  
  <table align="center" width="100%" border="0">
  		<?php 
	foreach($arr_physical_disabilities as $row){
		echo $form->hiddenField($model,'test_ids[]', array('value'=>$row['id']));
		$val = PatientTestDetail::getTestValue($row['id'], $test_summary_id); // hard coded id
	?>
  <tr id="tr_input">
    <td width="52%">&nbsp;<?php echo $row['name'] ?></td>
    <td width="48%">&nbsp;<?php echo $form->textFieldRow($model,'measured_reading[]',array('value'=>$val, 'class'=>'span2','maxlength'=>50, 'labelOptions' => array("label" => false))); ?></td>        
  </tr>
  <?php }?>  
</table><?php */?>


</div>

<div style="float:left; margin-left:100px;; width:350px;">
<h5>Medical Examination</h5>
	 <table align="center" width="100%" border="0">
     	<?php 					
		foreach($arr_tests as $row){			
			echo $form->hiddenField($model,'test_ids[]', array('value'=>$row['id'])); 	
			$val = PatientTestDetail::getTestValue($row['id'], $test_summary_id); // hard coded id
		?>
  		<tr id="tr_input">
    		<td width="51%">&nbsp;<?php echo $row['name'] ?></td>
    		<td width="49%">&nbsp;<?php echo $form->textFieldRow($model,'measured_reading[]',array('value'=>$val, 'class'=>'span2','maxlength'=>50, 'labelOptions' => array("label" => false))); ?>	</td>  
 		</tr>
        <?php }?>
</table>

<div class="form-actions">

	<?php $this->widget(
			'bootstrap.widgets.TbButton',
			array(
			'label' => ' << Back',
			'type' => 'primary',
			'url'=>Yii::app()->baseUrl.'/PatientTestSummary/admin',
			)
			);
		?>
        
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>        
        
</div>


</div>

<?php $this->endWidget(); ?>

</div><!-- end div center -->


<div style="clear:both"></div>
<br /><br />
<div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>
  
</div>