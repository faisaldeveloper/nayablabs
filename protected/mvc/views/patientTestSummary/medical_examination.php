<?php


$test_summary_id = (int)$_GET['id'];

$res_summary = Yii::app()->db->createCommand()->select("*")->from("patient_test_summary")->where("id = $test_summary_id")->queryRow();
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
$cnic = $res_patient['cnic'];
//$visa_type = $res_patient['visa_type'];
$visa_type = ($res_patient['visa_type']==1)?"Work":"Student";

$passport_no = $res_patient['passport_no'];

$gender = ($res_patient['gender']==1)?"Male":"Female";
$marital_status = ($res_patient['marital_status']=='M')?"Married":"Single";
if($res_patient['gender']==1)
$salutation = "";


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
$xray_findings = '';
foreach($array as $key => $val){ 	
	$pos1 = stripos($key, 'X-RAY');
	//echo "<br> - $key = $val";
 	if ($pos1 === false){  }
	else { $remarks = PatientTestDetail::model()->find("test_summary_id = $test_summary_id AND test_id = 46")->remarks;  break; } 
  } 	
$variable = str_replace("\n", '-+-', $remarks); // for windows 
$list = explode("-+-", $variable);

$total2 = count($list);
$last_line = $list[$total2-1];
$xray_conclusion = explode("CONCLUSION:", $last_line);
if(count($xray_conclusion) > 1){ $conclusion = $xray_conclusion[1]; array_pop($list); } 

$str = "";
foreach($list as $v){ $str .= "<li>".$v."</li>";}
$str = "<ul>".$str."</ul>";


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

<div class=" photoright">
<?php if(!empty($photo_file_name)){?>
<img src="<?php echo Yii::app()->baseUrl."/patient_photos/".$photo_file_name; ?>" name="photo" height="156" width="115" title="photo" />
<?php }?>
</div>
<div id="top2">
<b>MEDICAL EXAMINATION REPORT</b>
</div>
</div><!--header close!-->

<div class="bio">
<p>
<span>Ref No.</span>&ensp; <span id="cat1"><b><?php echo $ref_no; ?></b></span><span> Examination Date  </span> 
<span id="cat2"><b><?php echo $examination_date; ?></b></span> <span> Country</span>  <span id="cat3"><b><?php echo strtoupper($country); ?></b></span>
</p>
<p>
<span>Name</span> <span id="cat4"><b><?php echo strtoupper($name); ?></b></span><span>S/O</span>&emsp; <span id="cat5"><b>&nbsp;<?php echo strtoupper($father_name); ?></b></span> </p>

<p>
<span>Sex:</span> <span id="cat6"><b>&nbsp;<?php echo $gender; ?></b></span> <span>Age (years)</span> <span id="cat7"><b>&nbsp;<?php echo $age; ?></b></span> <span>Marital Status
</span> <span id="cat8"><b>&nbsp;<?php echo $marital_status; ?></b> </span><span>Country Applied For:</span> <span id="cat9">&nbsp;<?php echo $country_applied_for; ?><b></b></span> </p>
 
<p><span>Address:</span> <span id="cat10"><b>&nbsp;<?php echo ucwords(strtolower($address)); ?></b></span> <span><b>Visa Type:</b></span> <span id="cat11"><b>&nbsp;<?php echo $visa_type; ?></b></span></p>

<p><span>P.P #</span>&emsp; <span id="cat12"><b>&nbsp;<?php echo $passport_no; ?></b></span>  <span>Place & Date of Issue</span> <span id="cat13"><b>&nbsp;<?php echo $place_date_of_issue; ?></b></span></p>

<p><span>Position Applied For:</span> <span id="cat14"> <b>&nbsp;<?php echo $position_applied_for; ?></b></span><span>Recruiting Agent</span> <span id="cat15"><b>&nbsp;<?php echo $recruiting_agent; ?></b></span></p>

<p>
<span><b>Height:</b></span>&emsp;<span id="cat16"><b>&nbsp;<?php echo $ar->Height; ?></b></span> <span><b>Weight:</b></span>  <span id="cat17"><b>&nbsp;<?php echo $ar->Weight; ?></b></span></p>

</div><!--close bio!-->
<style>
p{
	margin-top:5px;
	margin-bottom:5px;
}
.exam-left{
width: 433px;
margin-left:31px;
float:left;
height:562px;
color:#000000;
font-size:12px;
}
.exam-left h3{
color:#000000;
margin-left:87px;
font-size:12pt;
font-weight:bold;
margin-top:1px;
margin-bottom:1px;
font-family:"Times New Roman";}
.exam-right h3{
color:#000000;
margin-left:10px;
font-size:12pt;
font-weight:bold;
margin-top:1px;
margin-bottom:1px;
font-family:"Times New Roman";}

.exam-left span{
margin: 2px 0 0 4px;
font-size:10px;
color:#333333;
font-size:13px;
font-family: "Arial";
font-weight: normal;
}
.detail-left{
width:383px;
border:1px solid #000000;
height:468px;
margin-top:0px
}
</style>



<style>
.exam-right{
	/*background:#999;*/
width: 273px;
float:left;
margin-left:17px;
height:562px;
color:#000000;
font-size:12px;
}

.detail-right{
width:338px;
border:1px solid #000000;
height:468px;
}


.tab{
border:#000000 solid 1px;
}

</style>
<div class="exam-left">
<h3> PHYSICAL EXAMINATION </h3>

<style>
.exam-left table{
	border-collapse:collapse;
}
.exam-left tr td:first-child{
	width:40%;	
}
.tableheadings{
	font-family:Arial, Helvetica, sans-serif;
	font-size:9pt;
	font-weight:bold;
}
.exam-left .firstrow,.exam-right .firstrow{
	text-align:center;
	height:20px;
}

.exam-left .headingrows,.exam-right .headingrows{
	height:21px;
}
.exam-left .headingrows2,.exam-right .headingrows2{
	height:20px;
}
td{
	padding-left:6px;
}
.internaltable td{
	padding-left:0px;
}

.systemic tr{
	height:25px;
}
ul{
	margin:0;
	height:63px;}
ul li{
	font-size:8pt;
	font-style:italic;
	
}
.firs02{
padding-left:7px;}

.close{
padding-top: 0px;
}
.exam-left .newheight, .exam-right .newheight{
height:40px;}


</style>
<table border="1" width="100%">
<!--  row 1  -->
<tr class="tableheadings firstrow"><td class="firs02">TYPE OF EXAMINATION</td><td>RESULT</td></tr>
<!--  row 2  -->
<tr class="tableheadings headingrows"><td>EYE</td><td>&nbsp;</td></tr>

<!--  row threee  -->
<tr style="height:60px;">
<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:20px;"><td>Vision &emsp; Rt-Eye</td></tr>
<tr style="height:20px;"><td style="padding-left:53px;">Lt-Eye</td></tr>
<tr style="height:20px;"><td>Colour Vision</td></tr>
</table></td>

<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->RtEye)); ?></td></tr>
<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->LtEye)); ?></td></tr>
<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->ColourVision)); ?></td></tr>

</table></td></tr>
<!--  row four  -->
<tr class="tableheadings headingrows"><td>EAR</td><td>&nbsp;</td></tr>
<!--  row five  -->
<tr style="height:40px;">
<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:22px;"><td>Rt - Ear(Hearing)</td></tr>
<tr style="height:22px;"><td>Lt - Ear(Hearing)</td></tr>

</table></td>

<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:22px;"><td><?php echo ucwords(strtolower($ar->HearingRtEar)); ?></td></tr>
<tr style="height:22px;"><td><?php echo ucwords(strtolower($ar->HearingLtEar)); ?></td></tr>

</table></td></tr>


<!--  row six  -->
<tr class="tableheadings headingrows2"><td>PHYSICAL DISABILITIES</td><td>&nbsp;</td></tr>

<!--  row 7  -->
<tr style="height:60px;">
<td valign="top"><table class='internaltable' border="0" width="100%">

<tr class="newheight"><td>Arm / Hands (Right / Left)</td></tr>
<tr style="height:20px;"><td>Legs / Feet (Right / Left)</td></tr>
<tr style="height:20px;"><td>Waist</td></tr>
</table></td>

<td valign="top"><table class='internaltable' border="0" width="100%">

<tr class="newheight"><td><?php echo ucwords(strtolower($ar->ArmsHandsRtLt)); ?></td></tr>
<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->LegsFeetRtLt)); ?></td></tr>
<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->Waist)); ?></td></tr>

</table></td></tr>
<!--  row 8  -->
<tr class="tableheadings headingrows2"><td>SYSTEMIC EXAMINATION</td><td>&nbsp;</td></tr>
<!--  row 9  -->
<tr style="height:100px;">
<td valign="top"><table class='internaltable systemic' border="0" width="100%">

<tr ><td>Blood Pressure</td></tr>
<tr ><td>Heart</td></tr>
<tr ><td>Respiratory (Lungs)</td></tr>
<tr ><td>Abdomen</td></tr>
<tr ><td>CNS (Mental illness)</td></tr>

</table></td>

<td valign="top"><table class='internaltable systemic' border="0" width="100%">

<tr ><td><?php echo ucwords(strtolower($ar->BloodPressure)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->Heart)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->RespiratoryLungs)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->Abdomen)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->CNSMentalillness)); ?></td></tr>


</table></td></tr>
<!--  row 10  -->
<tr class="tableheadings headingrows2"><td>CHEST X-RAY PA view</td><td><?php echo "Normal"; ?></td></tr>
<!--  row 11  -->
<tr class=""><td colspan="2"><div style="margin-left:6px;">
<B>FINDINGS:</B>
<?php echo $str; ?>
CONCLUSION: <?php echo $conclusion; ?>
</div></td></tr>
</table>
</div><!-- close exam-left !-->

<div class="exam-right">
<h3> LABORATORY EXAMINATION </h3>
<style>
.exam-right table{
	border-collapse:collapse;
}
.exam-right tr td:first-child{
	width:70%;	
}
.blood tr{
	height:27px;
}
</style>
<table border="1" width="100%">
<!--  row 1  -->
<tr class="tableheadings firstrow"><td>TYPE OF INVESTIGATIONS</td><td>RESULT</td></tr>
<!--  row 2  -->
<tr class="tableheadings headingrows"><td>URINALYSIS</td><td>&nbsp;</td></tr>

<!--  row threee  -->
<tr style="height:60px;">
<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:20px;"><td>Urine Glucose</td></tr>
<tr style="height:20px;"><td>Urine Protein / Albumin</td></tr>
<tr style="height:20px;"><td>Blood in Urine</td></tr>
</table></td>

<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->UrineGlucose)); ?></td></tr>
<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->UrineProteinAlbumin)); ?></td></tr>
<tr style="height:20px;"><td><?php echo ucwords(strtolower($ar->BloodinUrine)); ?></td></tr>

</table></td></tr>
<!--  row four  -->
<tr class="tableheadings headingrows"><td>BLOOD</td><td>&nbsp;</td></tr>
<!--  row five  -->
<tr style="height:200px;">
<td valign="top"><table class='internaltable blood' border="0" width="100%">

<tr ><td>Hemoglobin</td></tr>
<tr ><td>Hematocrit</td></tr>
<tr ><td>Blood Type:</td></tr>
<tr ><td>ABO</td></tr>
<tr ><td>Rh factor</td></tr>
<tr class="newheight"><td>cholesterol</td></tr>
<tr ><td>Liver Function Test</td></tr>
<tr ><td>Serum GPT</td></tr>
<tr ><td>Serum GOT</td></tr>
<tr style="height:3px" ><td>VDRL/TPHA</td></tr>
</table></td>

<td valign="top"><table class='internaltable blood' border="0" width="100%">

<tr ><td><?php echo ucwords(strtolower($ar->Hemoglobin)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->Hematocrit)); ?></td></tr>
<tr ><td><?php //echo ucwords(strtolower($ar->BloodType)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->ABO)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->Rhfactor)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->Cholesterol)); ?></td></tr>
<tr class="newheight"><td>&nbsp;</td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->SerumGPT)); ?></td></tr>
<tr ><td><?php echo ucwords(strtolower($ar->SerumGOT)); ?></td></tr>
<tr style="height:38px" ><td><?php echo ucwords(strtolower($ar->VDRLTPHA)); ?></td></tr>
</table></td></tr>


<!--  row six  -->
<tr class="tableheadings headingrows2"><td>ELISA</td><td>&nbsp;</td></tr>

<!--  row 7  -->
<tr style="height:40px;">
<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:22px;"><td>Hepatitis B Virus (HBsAg)</td></tr>
<tr style="height:25px;"><td>Hepatitis C Virus (Anti HCV)</td></tr>
</table></td>

<td valign="top"><table class='internaltable' border="0" width="100%">

<tr style="height:22px;"><td><?php echo ucwords(strtolower($ar->HepatitisBVirusHBsAg)); ?></td></tr>
<tr style="height:22px;"><td><?php echo ucwords(strtolower($ar->HepatitisCVirusAntiHCV)); ?></td></tr>

</table></td></tr>
<!--  row 8  -->
<tr class="tableheadings headingrows2"><td>HIV/AIDS</td><td>&nbsp;</td></tr>
<!--  row 9  -->
<tr style="height:26px;"><td>HIV/AIDS Antibody I/II</td><td>&nbsp;<?php echo ucwords(strtolower($ar->HIVAIDSAntibodyIII)); ?></td></tr>
</table>
</div>





<style>
.remarks{
background:#FFFFFF;
margin:0px;
border:1px solid #000000;
width:722px;
float:left;
margin-left:31px;
height:129px;
padding-bottom:1px;
color:#000000; 
font-family:'Arial';
font-size:9pt;}
.remarks table{
	border-collapse:collapse;
}




.remarks tr td:first-child{
	width:46%;}
	
.textstyle{
	font-family:"Times New Roman";
	font-size:9pt;
	font-weight:bold;}	
</style>

<div class="remarks">
<p>
Dear Sir, Mentioned above is the Medical Report for:&ensp; <span id="cat18"><b><?php echo strtoupper($name); ?></b></span>
</p>
<table width="100%">
<tr>
<td><div style=" float:left; margin-left:1px; width:266px; height:69px; font-family:'Arial'; font-size:9pt">
<B>Remarks:</B><br />
<b>He/She </b> &emsp; is &emsp; <span id="cat19"><b><?php echo $summary_remarks; ?></b></span> For the job.

</div><!-- close div!-->
<div style=" float:left; margin-left:1px; width:266px; height:18px; font-family: 'Comic Sans MS'; font-size:8pt; margin-top:5px;">
<B>*This Medical report is valid only for 03 Month</B><br />
</div><!-- close div!-->
</td>
<td>
<div style="font:right; width:370px; height:36px; margin-top:26px;">
<span class="textstyle"> Medical Officer's Signature</span> <span id="cat20"><b></b></span>
<span class="textstyle"> Medical Officer's Name:</span> <span id="cat21"><b><?php echo $physician_name; ?></b></span>
</div><!-- close right div!--></td></tr>
</table>

</div>

</div>
