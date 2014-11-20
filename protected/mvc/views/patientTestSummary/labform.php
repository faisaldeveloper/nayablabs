<?php
$test_summary_id = (int)$_GET['id'];

$res_summary = Yii::app()->db->createCommand()->select("examination_date, patient_id, panel_id, price")->from("patient_test_summary")->where("id = $test_summary_id")->queryRow();
$examination_date = $res_summary['examination_date'];
$patient_id = $res_summary['patient_id'];
$panel_id = $res_summary['panel_id'];
$price = $res_summary['price'];

$panel_name = Panel::model()->find("id = $panel_id")->name;


$res_patient = Yii::app()->db->createCommand()->select(" * ")->from("patient")->where("id = $patient_id")->queryRow();

$reg_no = $res_patient['reg_no'];
$ref_no = $res_patient['ref_no'];
$referrer_id = $res_patient['referrer_id'];
if($referrer_id > 0) $referrer_name = Referrer::model()->find("id = ". $referrer_id )->name;

$name = $res_patient['name'];
$father_name = $res_patient['father_name'];
$phone = $res_patient['phone'];
$age = $res_patient['age'];
$gender = ($res_patient['gender']==1)?"Male":"Female";
$photo_file_name = $res_patient['photo_file_name'];
$created_date = date("d-m-y H:i", strtotime($res_patient['created_date']));
/////////////////////Get Test values
// query for physical exam
$sql = "select t.id, t.name, t.main_id from Test t Inner JOIN test_main tm ON tm.id = t.main_id Inner JOIN examination_type et ON et.id = tm.examination_type_id WHERE et.id = 1 and tm.panel_id = $panel_id";
$arr_physical_tests =  Yii::app()->db->createCommand($sql)->queryAll();

// query for medical exam
$sql = "select t.id, t.name, t.main_id from Test t Inner JOIN test_main tm ON tm.id = t.main_id Inner JOIN examination_type et ON et.id = tm.examination_type_id WHERE et.id = 2 and tm.panel_id = $panel_id";
$arr_tests =  Yii::app()->db->createCommand($sql)->queryAll();

 ?>
 <style> table{ margin-left: 10px; line-height:5px; }
 table th{
	padding: 3px; 
 }
 
 .top_table{
	 font-weight:bold;	 
 }
  </style>
 
 
<div class="container_mce" style="width:760px; margin:0 auto">
<div style="float:left; width:600px" >
  <table width="98%" class="top_table" border="0" style="margin-top:50px;">
  <tr>
    <td width="23%">&nbsp;Acc.ID</td>
    <td width="39%">&nbsp;<?php echo $ref_no; ?></td>
    
    <td width="24%">&nbsp;Lab No:</td>
    <td width="14%">&nbsp;<b><?php echo $reg_no; ?></b></td>  
  </tr>
  <tr>
   <td>&nbsp;Patient Name:</td>
    <td>&nbsp;<?php echo strtoupper($name); //. " S/O ". strtoupper($father_name);  ?></td>
    
    <td>&nbsp;Age:</td>
    <td>&nbsp;<?php echo $age." Years"; ?></td>   
  </tr>
     <tr>
   <td>&nbsp;Ref By:</td>
    <td>&nbsp;<?php echo $referrer_name; ?></td>
    
    <td>&nbsp;Phone:</td>
    <td>&nbsp;<?php echo $phone; ?></td>   
  </tr>
   <tr>
   <td>&nbsp;Receiving Date:</td>
    <td>&nbsp;<?php echo $created_date; ?></td>
    
    <td>&nbsp;Gender:</td>
    <td>&nbsp;<?php echo $gender; ?></td>   
  </tr>

  <tr>
   <td>&nbsp;Panel:</td>
    <td>&nbsp;<?php echo $panel_name; ?></td>
    
    <td>&nbsp;Design / Ref No:</td>
    <td>&nbsp;<?php echo $ref_no; ?></td>   
  </tr>
</table>
</div>

<div style=" float:left; border:1px dotted #000; overflow:hidden; height:160px; width:155px; margin-top:20px"> 
<?php if(!empty($photo_file_name)){?>
<img src="<?php echo Yii::app()->baseUrl."/patient_photos/".$photo_file_name; ?>" name="photo" height="160" width="155" title="photo" /> 
<?php }?>
</div>
<div style="clear:both"></div>
 <div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>
<div style="margin-left: 20px;">
<h5>TEST NAME</h5>
<p> UAE MEDICAL </p>
</div>

 <div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>

<div align="center">

<div class="physical" style="float:left; width:350px;">
<h5>Physical Examination</h5>
<style>
.physical td,.medical td{
	border:dotted 1px black !important;
}
</style>
    	
 <table align="center" width="100%">
 	<?php 
	$dummy_id = 0;
	foreach($arr_physical_tests as $row){	
		
		$main_id = $row['main_id'];
		$head = TestMain::model()->find("id = ". $row['main_id'])->name;			
		if($main_id !=$dummy_id){ echo "<tr><td colspan=\"2\">&nbsp;<b> $head </b></td>  </tr>"; $dummy_id =$main_id;  }
	?>  
          <tr>
            <td width="60%">&nbsp;<?php echo $row['name'] ?></td>
            <td width="40%">&nbsp;<!--__________________--></td>
          </tr>
  <?php }?>
  </table>
 
</div>

<div class="medical" style="float:left; margin-left:20px;; width:350px;">
<h5>Medical Examination</h5>
	 <table align="center" width="100%">
     	<?php 	foreach($arr_tests as $row){	
		
		$main_id = $row['main_id'];
		$head = TestMain::model()->find("id = ". $row['main_id'])->name;			
		if($main_id !=$dummy_id){ echo "<tr><td colspan=\"2\">&nbsp;<b> $head </b></td></tr>"; $dummy_id =$main_id;  }
		?>
  		<tr>
    		<td width="60%">&nbsp;<?php echo $row['name'] ?></td>
    		<td width="40%">&nbsp;<!--_______________--></td>  
 		</tr>
        <?php }?>
</table>
</div>

</div>


<div style="clear:both"></div>
<br /><br />
<div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>


<table width="100%" border="0">
  <tr>
    <td ><strong>Examined By</strong></td>
    <td ><strong>_____________________</strong></td>
    <td><strong>Test Performed By</strong></td>
    <td ><strong>_______________________</strong></td>
  </tr>
</table> 
    
   <p align="right"  style="padding-right:10px;"> <input type="button" value="Print" onclick="javascript: window.print() " />    </p>
  
</div>