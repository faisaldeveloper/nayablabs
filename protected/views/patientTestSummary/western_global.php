<?php
$test_summary_id = (int)$_GET['id'];

$res_summary = Yii::app()->db->createCommand()->select("examination_date, klt_no, patient_id, panel_id, price, remarks")->from("patient_test_summary")->where("id = $test_summary_id")->queryRow();
$examination_date = date("d/m/Y",strtotime($res_summary['examination_date']));
$klt_no = $res_summary['klt_no'];
$patient_id = $res_summary['patient_id'];
$panel_id = $res_summary['panel_id'];
$price = $res_summary['price'];
$summary_remarks = $res_summary['remarks'];

$res_patient = Yii::app()->db->createCommand()->select("*")->from("patient")->where("id = $patient_id")->queryRow();
$reg_no = $res_patient['reg_no'];
$referrer_id = $res_patient['referrer_id'];
if(!empty($referrer_id)){ $recruiting_agent = Referrer::model()->find("id = $referrer_id")->name; }
$ref_no = ($res_patient['ref_no']=='')?"---":$res_patient['ref_no'];
$name = $res_patient['name'];
$father_name = $res_patient['father_name'];
$phone = $res_patient['phone'];
$age = $res_patient['age'];
$address = $res_patient['address'];
$cnic = str_replace("-", "", $res_patient['cnic']);
$arr_nic = str_split($cnic);
//$visa_type = $res_patient['visa_type'];
$visa_type = $res_patient['visa_type'];
if($visa_type==1) $visa_type = "Work";
else if($visa_type==2) $visa_type = "Student";
else $visa_type = "---";

$passport_no = $res_patient['passport_no'];

$gender = ($res_patient['gender']==1)?"Male":"Female";
$marital_status = $res_patient['marital_status'];
if($marital_status==1) $marital_status = "---";
else if($marital_status==2) $marital_status = "Single";
else if($marital_status==3) $marital_status = "Married";
else if($marital_status==4) $marital_status = "Divorced";
else if($marital_status==5) $marital_status = "Widowed";
else {}

$place_date_of_issue = $res_patient['place_date_of_issue'];
$position_applied_for = $res_patient['position_applied_for'];
//$recruiting_agent = $res_patient['recruiting_agent'];
$photo_file_name = $res_patient['photo_file_name'];


if(!empty($res_patient['country'])){
$country = Yii::app()->db->createCommand()->select("name")->from("country")->where("id = ". $res_patient['country'])->queryScalar();
}
if(!empty($res_patient['country_applied_for'])){
$country_applied_for = Yii::app()->db->createCommand()->select("name")->from("country")->where("id = ". $res_patient['country_applied_for'])->queryScalar();
}

/////////////////////Get Test values for this test summary id
//print_r($arr_physical_tests);
$test_res_arr = $this->Mytest($test_summary_id);
$ar = json_decode($test_res_arr);
if(count($ar) == 0){ echo "Test Values not found for this test."; exit;}

///////////// following is the code to get xray remarks value from the database .
$array = (array) $ar; // convert object into array
/* echo "<pre>";
print_r($array);
echo "</pre>"; */


$xray_findings = '';
foreach($array as $key => $val){ 		
	$pos1 = stripos($key, 'X-Ray');
 	if ($pos1 !== false) { $remarks = PatientTestDetail::model()->find("test_summary_id = $test_summary_id AND measured_reading = '".$val."'")->remarks;  break; } 
  } 	
$variable = str_replace("\r\n", '-+-', $remarks); // for windows 
$list = explode("-+-", $variable);

$total2 = count($list);
$last_line = $list[$total2-1];
$xray_conclusion = explode("CONCLUSION:", $last_line);
if(count($xray_conclusion) > 1){ $conclusion = $xray_conclusion[1]; array_pop($list); } 

$str = "";
foreach($list as $v){ $str .= "<li>".$v."</li>";}
$str = "<ul>".$str."</ul>";
//echo $str;
//exit;


$test_res_arr = $this->Mytest($test_summary_id);
$ar = json_decode($test_res_arr);

$physician_name = Settings::model()->getPhysicianName(16);
 ?>

<div id="wrapper">


<div id="header">
<div class="logo">
<img src="<?php echo Yii::app()->baseUrl; ?>/images/Untitled-1.jpg" />
</div>
<div class="logo2">
<img src="<?php echo Yii::app()->baseUrl; ?>/images/nayab-logo.png" />
<p> <b>Main Branch:</b> 6-Pak Pavilion Plaza 65-E Fazal-e-Haq Road Blue Area<br />
Islamabad. Ph: 0092-51-2276163 - 2827986&ensp;Fax: 0092-51-2827910<br />
<b>Email:</b> nayablabs@yahoo.com  <b>&emsp;Website:</b> www.nayablabs.com</p>
</div>
</div><!--header close!-->

<div id="top2">
<b>Pre-Employment Medical Fitness Certificate</b>
</div>

<div id="top">
(Issued in accordance with specified criteria from employer)
</div>

<div id="top3">
<div id="date-exam"><span>Date of Examination</span>&emsp;<span id="cat1"><b><?php echo $examination_date; ?></b></span></div>    
<div id="mr-no"><span>M.R. No.</span>&emsp;<span id="cat2"><b><?php echo $reg_no; ?></b></span></div>
</div> <!-- close all tops!-->


<div class="main">
<h3>Personal Details</h3>
<p>
<span>Name: </span>&emsp;  <span id="cat3"><b><?php echo strtoupper($name); ?></b></span> &emsp;<span>Father's Name: </span>&emsp;
<span id="cat4"><b><?php echo strtoupper($father_name); ?></b></span> 
</p>

<p>
<span>Age: </span>&emsp; &emsp; &nbsp;<span id="cat5"><b><?php echo $age; ?> Years</b></span> &emsp;<span>Referred by: </span>&emsp;&emsp;&emsp;&emsp;&emsp;
<span id="cat4"><b><?php echo $recruiting_agent; ?></b></span> 
</p><br />

<div class="nic">
<div class="n-text">NIC #</div>
<?php 
foreach($arr_nic as $k =>$v){
if($k==0){ echo "<div class=\"d1\">".$v."</div>"; }
else if($k==5 || $k==12){ echo "<div class=\"d2\">-</div>"; echo "<div class=\"d2\">".$v."</div>"; }
else{ echo "<div class=\"d2\">".$v."</div>"; } 	
}
?>
</div><br />
<p>
<span>Address:</span>&emsp; &emsp;&nbsp;<span id="cat6"><b><?php echo strtoupper(strtolower($address)); ?></b></span>  
</p>

</div><!--close bio!-->

<div class="find-all">
<h3>Measurements of Physical findings </h3>
<div class="find-left">
<div class="ech"><span>Height&emsp;  &emsp;&emsp;&emsp;</span><span id="cat7"><b><?php echo $ar->Height; ?></b></span></div>
<div class="ech"><span>Weight&emsp;&emsp;&emsp;&emsp;</span><span id="cat7"><b><?php echo $ar->Weight; ?> kg</b></span></div>
<div class="ech"><span>Vision (Rt Eye)&emsp;</span><span id="cat7"><b><?php echo ucwords(strtolower($ar->VisionRtEye)); ?></b></span></div>
<div class="ech"><span>Vision (Lt Eye)&emsp;</span><span id="cat7"><b><?php echo ucwords(strtolower($ar->VisionRtEye)); ?></b></span></div>
</div>

<div class="find-right">
<div class="ech"><span>Pulse &emsp;  &emsp; &emsp; </span><span id="cat7"><b><?php echo ucwords(strtolower($ar->Pulse)); ?></b></span></div>
<div class="ech"><span>Blood Pressure </span><span id="cat7"><b><?php echo ucwords(strtolower($ar->BloodPressure)); ?></b></span></div>
<div class="ech"><span>Hearing (Rt-Ear) </span><span id="cat7"><b><?php echo ucwords(strtolower($ar->HearingRtEar)); ?></b></span></div>
<div class="ech"><span>Hearing (Lt-Ear)&emsp;</span><span id="cat7"><b><?php echo ucwords(strtolower($ar->HearingRtEar)); ?></b></span></div>

</div>

</div>

<div class="ray">
<h3>Radiological finding</h3>
<span>Chest X-Ray:-  &emsp;</span><span id="cat8"><?php $xray = 'ChestX-RAY'; echo ucwords(strtolower($ar->$xray));	 ?></span>
<span>&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&nbsp; </span><span id="cat8"></span>
</div><!-- close ray !-->

<div class="tst-left">
<h3>Laboratry Investigation</h3>
<div id="test">Test</div> <div id="result">Result</div><br />
<div id="detail-test">

<div id="test1">1. Blood CP & ESR</div> <div id="result1">&emsp;<?php echo ucwords(strtolower($ar->BloodCPESR)); ?></div>
<div id="test1">2. Hepatitis "B" (By kit Method)</div> <div id="result1">&emsp;<?php echo ucwords(strtolower($ar->HepatitisBByKitMethod)); ?></div>
<div id="test1">3. Hepatitis "C" (By kit Method)</div> <div id="result1">&emsp;<?php echo ucwords(strtolower($ar->HepatitisCByKitMethod)); ?></div>
<div id="test1">4. Blood Group</div> <div id="result1">&emsp;<?php echo $ar->BloodGroup; ?></div>
<div id="test1">5. VIAG</div> <div id="result1">&emsp;<?php echo ucwords(strtolower($ar->VIAG)); ?></div>
<div id="test1">(Detection of typhoid career)</div> 



</div>
</div><!--close tst-left!-->

<div class="tst-right">
<div class="textpad">Test</div> <div id="result12">Result</div><br />
<div id="right-test">

<div id="test1">6. Urine (R/E)</div> 
<div class="sub-cat">
<div class="cat-sub">a. Sugar</div>   <div class="sub-result">&emsp;<?php echo ucwords(strtolower($ar->Sugar)); ?></div>
<div class="cat-sub">b. Protein</div>   <div class="sub-result">&emsp;<?php echo ucwords(strtolower($ar->Protine)); ?></div>
<div class="cat-sub">c. Blood</div>   <div class="sub-result">&emsp;<?php echo ucwords(strtolower($ar->Blood)); ?></div>
</div>

<div id="test1">7. Stool (R/E)</div>
<div class="cat-sub">a. Ova</div>   <div class="sub-result">&emsp;<?php echo ucwords(strtolower($ar->Ova)); ?></div>
<div class="cat-sub">b. Cyst</div>   <div class="sub-result">&emsp;<?php echo ucwords(strtolower($ar->Cyst)); ?></div>
<div class="cat-sub">c. Blood</div>   <div class="sub-result">&emsp;<?php echo ucwords(strtolower($ar->Blood)); ?></div>
<div class="cat-sub">d. Mucus</div>   <div class="sub-result">&emsp;<?php echo ucwords(strtolower($ar->Mucus)); ?></div>

</div>
</div><!--close tst-right!-->

<div class="ray">
<span>Vaccination</span>  &emsp; &emsp;&emsp;<span id="cat8"><?php echo ucwords(strtolower($ar->Vacination)); ?></span><br />
<span>REMARKS&emsp;</span><span id="cat8"><?php echo ucwords(strtolower($ar->Remarks)); ?></span><br />
<span>&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;</span><span id="cat8"></span><br />

</div><!-- close ray !-->

<div id="fit-decision">
<font style="font-family:'Times New Roman'; font-size:14pt;">Fitness Decision:</font> As per set out Paremeters / criteria / standards
<div id="left-data">
He may be considered  <span id="cat19"><?php echo $summary_remarks; ?></span><br />
<p><span>Signature of Examination Physician:- </span><span id="cat9"></span></p>

<p><span>Name:- &emsp; &emsp; &emsp; </span><span id="cat10"><b><?php echo $physician_name; ?></b></span></p>

<p><span>Date:- &emsp; &emsp;&emsp;</span><span id="cat11"><b><?php echo date("d M Y"); ?></b></span></p>


</div>


<div id="right-photo">
<?php if(!empty($photo_file_name)){?>
<img src="<?php echo Yii::app()->baseUrl."/patient_photos/".$photo_file_name; ?>" name="photo" height="156" width="115" title="photo" />
<?php }?>
</div>

<div id="of-seal">Offical seal</div>


</div><!-- close of fit-decision!-->


<div class="foot">
ISO 9001: 2000 Certified</div>

</div>