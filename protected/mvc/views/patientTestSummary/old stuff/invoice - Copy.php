<?php
$test_summary_id = (int)$_GET['id'];

$res_summary = Yii::app()->db->createCommand()->select("examination_date, patient_id, panel_id, price")->from("patient_test_summary")->where("id = $test_summary_id")->queryRow();
$examination_date = $res_summary['examination_date'];
$patient_id = $res_summary['patient_id'];
$panel_id = $res_summary['panel_id'];
$price = $res_summary['price'];


$res_patient = Yii::app()->db->createCommand()->select(" * ")->from("patient")->where("id = $patient_id")->queryRow();

$reg_no = $res_patient['reg_no'];
$ref_no = $res_patient['ref_no'];
$referrer_id = $res_patient['referrer_id'];
if($referrer_id > 0) $referrer_name = Referrer::model()->find("id = ". $referrer_id )->name;

$name = $res_patient['name'];
$patient_type_id = Settings::model()->getFieldSettings(13);
$patient_type_id = $patient_type_id[$res_patient['patient_type_id']];
// $patient_type_id = ($res_patient['patient_type_id']==1)?"Regular":"s";
$father_name = $res_patient['father_name'];
$address = $res_patient['address'];
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
 
 .top-right-box{
	 float:right; 
	 margin-top:20px; 
	 padding:5px; 
	 text-align:center; 
	 line-height:8px; 
	 margin-right:10px; 
	 border:1px solid; 	
	 width:300px;
	 min-height:100px; 
 }
 .top-right-box2{
	 float:right; 
	 margin-top:4px; 
	 padding:5px; 
	 text-align:center; 
	 line-height:6px; 
	 margin-right:10px;	
	 width:300px;	
	 font-weight: bold;
 }
 
 .top-right-box3{
	 float:left; 
	 margin-top:4px; 
	 padding:5px; 
	 text-align:center; 
	 line-height:6px; 
	 margin-left:20px;	
	 width:200px;	
	 font-weight: bold;
	 font-size:18px;
	 background-color: #999;
	 color:#FFF;
	 box-shadow: 7px 7px 5px #888888;
 }
 
  </style>
 
 
 
<div class="container_mce" style="">

<div class="top-right-box"> 
<p><b><u>Attention</u></b></p>
<p>No reports will be issued</p>
<p>until all dues all clear.</p>

<p><b><u>Incorrect Resluts ???</u></b></p>
<p>Please call 2251212 for</p>
<p>free repeat of blood test within 48 hours</p>
</div>

<div style="clear:both" ></div>
<div class="top-right-box3">
<p> Patient's Copy </p>
</div>

<div class="top-right-box2">
<p> Timings: Mon to Sun 8:00 AM - 10:30 PM</p>
</div>

<div style="clear:both" ></div>

  <table width="100%" class="top_table" border="0" style="margin-top:10px;">
  <tr>
    <td width="14%">&nbsp;Account No:</td>
    <td width="30%">&nbsp;<?php echo $ref_no; ?></td>
    <td width="2%">&nbsp;</td>
    <td width="11%">&nbsp;Reg No:</td>
    <td width="17%">&nbsp;<b><?php echo $reg_no; ?></b></td>
    <td width="1%">&nbsp;</td>
    <td width="11%">&nbsp;Type:</td>
    <td width="14%">&nbsp;<?php echo $patient_type_id; ?></td>         
  </tr>
  <tr>
   <td>&nbsp;Patient Name:</td>
    <td>&nbsp;<?php echo strtoupper($name);  ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;Age:</td>
    <td>&nbsp;<?php echo $age." Years"; ?></td>  
    <td>&nbsp;</td>
    <td>&nbsp;Gender:</td>
    <td>&nbsp;<?php echo $gender; ?></td>  
  </tr>
  <tr>
   <td>&nbsp;Ref. By:</td>
    <td>&nbsp;<?php echo $referrer_name;  ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;Ref. No:</td>
    <td>&nbsp;<?php echo $ref_no ?></td>  
    <td>&nbsp;</td>
    <td>&nbsp;Receipt No:</td>
    <td>&nbsp;<?php echo $reg_no; ?></td>  
  </tr>
   <tr>
   <td>&nbsp;Address:</td>
    <td colspan="5">&nbsp;<?php echo ucwords($address);  ?></td>   
    <td>&nbsp;Phone:</td>
    <td>&nbsp;<?php echo $phone; ?></td>  
  </tr>
   
</table>
<div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>

<div align="center">


<div style="float:left; width:auto;">
<table id="tbl_content" width="750px" >

<tr>
<th>S#</th>
<th>Test</th>
<th>Process</th>
<th>Sample</th>
<th>Reporting Date & Time</th>
<th>Amount</th>
</tr>

<tr>
<td>1</td>
<td> <?php echo "UAE Medical"; //$panel_name ?></td>
<td> <?php echo date("d-m-y H:i"); ?></td>
<td> <?php echo number_format($price,2); ?></td>
</tr>

<tr>
<td colspan="2"></td>
<td align="center"><b>Discount</b></td>
<td> <?php echo number_format($discount,2); ?></td>
</tr>
<tr>
<td colspan="2"></td>
<td align="center"><b>Payment</b></td>
<td> <?php echo number_format($payment,2); ?></td>
</tr>

</table>  
</div>





</div><!-- end div center -->


<div style="clear:both"></div>
<br /><br />

  
</div>