<?php
$test_summary_id = (int)$_GET['id'];

$res_summary = Yii::app()->db->createCommand()->select("*")->from("patient_test_summary")->where("id = $test_summary_id")->queryRow();
$examination_date = $res_summary['examination_date'];
$reporting_date = $res_summary['reporting_date'];
$patient_id = $res_summary['patient_id'];
$panel_id = $res_summary['panel_id'];
$panel_name = Panel::model()->find("id = $panel_id")->name;
$price = $res_summary['price'];
$discount = $res_summary['discount'];
$urgent_charges = $res_summary['urgent_charges'];
$payment = $res_summary['payment'];
$balance = $res_summary['balance'];
$klt_no = $res_summary['klt_no'];


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
if(!empty($res_patient['country_applied_for']))
$country_applied_for = Country::model()->find("id = ".$res_patient['country_applied_for'])->name;

$phone = $res_patient['phone'];
$passport_no = $res_patient['passport_no'];
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
 <style> table{ line-height:5px; }
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
	 width:300px;	
	 font-weight: bold;
 }
 
 .top-right-box3{
	 float:left; 
	 margin-top:4px; 
	 padding:5px; 
	 text-align:center; 
	 line-height:6px; 
	 width:200px;	
	 font-weight: bold;
	 font-size:18px;
	 background-color: #999;
	 color:#FFF;
	 box-shadow: 7px 7px 5px #888888;
 }
 .tr_class {	 	
	 border:1px solid;	 
	 height:25px;
 }
 .td_class{
	 border-right:1px solid;	 
 }
  .td_class2{
	 border-right:1px solid;
	 border-left:1px solid;	 
	 text-align:right;
 }
 
 .td_class3{
	 border:1px solid;
	 text-align:right;
 }
 
 .patine_name{
	 line-height:20px;
	 padding-left:5px;
 }
 
  </style>
 
 
 
<div class="container_mce" style="width:760px; background:#fff; margin:0 auto">

<!--<div class="top-right-box"> 
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
-->

  <table width="100%" class="top_table" border="0" style="margin-top:300px;">
  <tr>
    <td width="18%">&nbsp;Reg Date:</td>
    <td width="29%">&nbsp;<?php echo $examination_date; ?></td>    
    <td width="3%">&nbsp;</td>
    <td width="50%" rowspan="4">&nbsp;
    <div style="background-color:#fff; border:1px dashed; height:67px; margin-top:-15px; padding:8px 5px;" >
    <span class="patine_name"> <?php echo strtoupper(strtolower($name))." S/O ".strtoupper(strtolower($father_name)); ?></span><br />
    <span class="patine_name"> <?php echo $age ." Years   &emsp;&emsp;&emsp;&emsp;&emsp; ". $gender; ?></span><br>
    <span class="patine_name"> Phone &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $phone; ?></span>
    </div>
    </td>            
  </tr>
  
  
  <tr>
   <td>&nbsp;Acc ID:</td>
    <td>&nbsp;<?php echo $ref_no;  ?></td>    
    <td>&nbsp;</td>     
  </tr>
  <tr>
   <td>&nbsp;Lab No:</td>
    <td>&nbsp;<?php echo $reg_no;  ?></td>    
    <td>&nbsp;</td>  
  </tr>
   <tr>
   <td>&nbsp;Panel:</td>
    <td>&nbsp;<?php echo $panel_name;  ?></td>   
    <td width="3%">&nbsp;</td> 
   
  </tr>
   <tr>
   <td>&nbsp;Code No:</td>
    <td>&nbsp;<?php echo $klt_no." ". $passport_no;  ?></td>   
    <td width="3%">&nbsp;</td> 
     <td width="3%">&nbsp;Ref By: <?php echo $referrer_name;  ?><span style="float:right"> Type: <?php echo $patient_type_id; ?> </span></td>    
  </tr>
   
</table>
<br >
<!--<div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>-->


<div align="center">
<table class="tbl_content" width="100%" >

<tr class="tr_class">
<th class="td_class" width="13%">#</th>
<th class="td_class" width="47%">Test to be performed</th>
<th class="td_class" width="29%">Reporting Date & Time</th>
<th width="11%">Amount</th>
</tr>

<tr class="tr_class">
<td class="td_class">1</td>
<td class="td_class"> <?php echo $panel_name; ?></td>

<td class="td_class"> <?php echo date("d-m-y H:i", strtotime($reporting_date)); ?></td>
<td class="td_class2"> <?php echo number_format($price,2); ?></td>
</tr>

<tr>
<td colspan="2">&emsp;</td>

<td align="center"><b>Total Amount</b></td>
<td class="td_class2"> <?php echo number_format($price,2); ?></td>
</tr>

<?php 
if($discount > 0){
?>

<tr>
<td colspan="2">&emsp;</td>
<td align="center"><b>Adjustment</b></td>
<td class="td_class2"> <?php echo number_format($discount,2); ?></td>
</tr>

<?php } ?>

<tr>
<td colspan="2">&emsp;</td>
<td align="center"><b>Urgent Charges</b></td>
<td class="td_class2"> <?php echo number_format($urgent_charges,2); ?></td>
</tr>

<tr>
<td colspan="2">&emsp;</td>
<td align="center"><b>Net Amount</b></td>
<td class="td_class2"> <?php echo number_format(($payment),2); ?></td>
</tr>

<tr>
<td colspan="2">&emsp;</td>
<td align="center"><b>Amount Received</b></td>
<td class="td_class2"> <?php echo number_format(($payment),2); ?></td>
</tr>

<tr>
<td ></td>
<td ></td>
<td align="center"><b>Balance</b></td>
<td class="td_class3"> <?php echo number_format((($price + $urgent_charges)- ($payment + $discount)),2); ?></td>
</tr>

</table>  






</div><!-- end div center -->


<div style="clear:both"></div>
<br /><br />

  
</div>