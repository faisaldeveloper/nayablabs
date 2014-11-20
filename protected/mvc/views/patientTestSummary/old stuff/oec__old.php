<?php
$test_summary_id = (int)$_GET['id'];

$res_summary = Yii::app()->db->createCommand()->select("examination_date, klt_no, patient_id, panel_id, price, remarks")->from("patient_test_summary")->where("id = $test_summary_id")->queryRow();
$examination_date = date("d/m/Y",strtotime($res_summary['examination_date']));
$klt_no = $res_summary['klt_no'];
$patient_id = $res_summary['patient_id'];
$panel_id = $res_summary['panel_id'];
$price = $res_summary['price'];
$remarks = $res_summary['remarks'];

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
	$pos1 = stripos($key, 'X-Ray');
 	if ($pos1 !== false) { $remarks = PatientTestDetail::model()->find("test_summary_id = $test_summary_id AND measured_reading = '".$val."'")->remarks;  break; } 
  } 	
$variable = str_replace("\r\n", '-+-', $remarks); // for windows 
$list = explode("-+-", $variable);
$str = "";
foreach($list as $v){ $str .= "<li>".$v."</li>";}
$str = "<ul>".$str."</ul>";

//echo $str;
//exit;

//else { echo "No Test is Registered for this Panel. Please Register Some tests for this Panel before further proceeding."; exit; }




$arr_tests = Yii::app()->db->createCommand()->select("name")->from("test")->where("$cond")->order("main_id")->queryAll();

$test_res_arr = $this->Mytest($test_summary_id);
$ar = json_decode($test_res_arr);

//print_r($ar);  exit;
//$patient_photo = '140206152326DSC07484.jpg';
//echo "---".$photo_file_name; exit;

$physician_name = Settings::model()->getPhysicianName(16);
 ?>
<style>
#cat1{
	display: inline-block;
	font-weight:bold;
	border-bottom: #000 1px solid; 
	min-width:210px;	
}

#cat2{
	display: inline-block;
	font-weight:bold;
	border-bottom: #000 1px solid; 
	min-width:380px;	
}

#cat3{
	display: inline-block;
	font-weight:bold;
	border-bottom: #000 1px solid; 
	min-width:105px;	
}
#cat4{
	display: inline-block;
	font-weight:bold;
	border-bottom: #000 1px solid; 
	min-width:512px;	
}

#cat5{
	display: inline-block;
	font-weight:bold;
	border-bottom: #000 1px solid; 
	min-width:340px;	
}
#cat6{
	display: inline-block;
	font-weight:bold;
	border-bottom: #000 1px solid; 
	min-width:310px;	
}
#cat7{
	display: inline-block;
	font-weight:bold;
	border-bottom: #000 1px solid; 
	min-width:370px;	
}
</style>

<div id="container_main">
<div id="header">
<div class="logo">
<img src="<?php echo Yii::app()->baseUrl; ?>/images/nayab-logo2.jpg" />
</div>
<div class="logo2">
<img src="<?php echo Yii::app()->baseUrl; ?>/images/nayab-logo.png" />
<p> Main Branch: 6-Pak Pavilion Plaza 65-E Fazal-e-Haq Road Blue Area<br />
Islamabad. Ph: 0092-51-2276163 - 2827986  Fax: 0092-51-2827910<br />
Email: nayablabs@yahoo.com  Website: www.nayablabs.com</p>

<footer><p><b>KLT # <?php echo $klt_no; ?><br />
MEDICAL EXAMINATION REPORT</b>
</p></footer>
</div>
<div class=" photoright">

<img src="<?php echo Yii::app()->baseUrl."/patient_photos/".$photo_file_name; ?>" name="photo" height="160" width="155" title="photo" />

</div>

</div><!-- header close!-->

<div class="main">
<div class="bio">
<p>
<span>Ref No.</span>&nbsp; <span id="cat1"><?php echo $ref_no; ?></span> <span> Examination Date  </span>&nbsp; &nbsp <span id="cat1"><?php echo $examination_date; ?></span> <span> Country</span>&nbsp; &nbsp;<span id="cat1"><?php echo strtoupper($country); ?></span> </p>
<p>
<span>Name</span>&nbsp; &nbsp; &nbsp;<span id="cat2"><?php echo strtoupper($name); ?></span> &nbsp; &nbsp;<span>S/O</span>&nbsp; &nbsp; <span id="cat2"><?php echo strtoupper($father_name); ?></span></p>
<p>
<span>Sex</span>&nbsp; &nbsp; <span id="cat3"><?php echo $gender; ?> </span>&nbsp;<span>Age (years)</span>&nbsp; &nbsp; <span id="cat3"><?php echo $age; ?></span> &nbsp;<span>Marital Status</span>&nbsp; &nbsp;<span id="cat3"><?php echo $marital_status; ?> </span>&nbsp;<span>Country Applied For</span> &nbsp; <span id="cat1"> <?php echo $country_applied_for; ?></span> </p>
<p><span>Address</span>&nbsp; &nbsp; &nbsp;<span id="cat4"><?php echo ucwords(strtolower($address)); ?></span> &nbsp; &nbsp;<span>Visa Type</span>&nbsp; &nbsp; <span id="cat1"> <?php echo $visa_type; ?></span></p>



<p>
<span>P.P #</span>&nbsp; &nbsp; <span id="cat5"><?php echo $passport_no; ?></span> &nbsp; &nbsp;<span>Place & Date of Issue</span>&nbsp; &nbsp; <span id="cat5"><?php echo $place_date_of_issue; ?></span></p>
<span>Position Applied For</span>&nbsp; &nbsp; <span id="cat6"><?php echo $position_applied_for; ?></span> &nbsp; &nbsp;<span>Recruiting Agent</span>&nbsp; &nbsp; <span id="cat6"><?php echo $recruiting_agent; ?></span></p>
<span>Height</span>&nbsp; &nbsp; <span id="cat7"><?php echo $ar->Height; ?></span> &nbsp; &nbsp;<span>Weight (Kgs)</span>&nbsp; &nbsp; <span id="cat7"><?php echo $ar->Weight; ?></span></p>
</div><!--close bio!-->

<div class="exam-left">
<h3> PHYSICAL EXAMINATION </h3>

<div class="detail-left">
 <div class="first"> <span style="font-weight: bold;">TYPE OF EXAMINATION</span></div>
        
         <div class="second">  <span style="font-weight: bold;">RESULT</span></div>
          
  <div class="first"> <span style="font-weight: bold;">EYE</span></div>     <div class="second">&nbsp;</div>
          
          <div class="first1">&emsp;Vision   &emsp; Rt-Eye</div>  <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->RtEye)); ?></div>
          <div class="first1">&emsp;&emsp;&emsp;&emsp;&emsp; Lt-Eye</div>           <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->LtEye)); ?></div>
          <div class="first">&emsp;Color Vision</div>            <div class="second">&emsp;<?php echo ucwords(strtolower($ar->ColourVision)); ?></div>
              
          <div class="first"><span style="font-weight: bold;">EAR</span></div>        <div class="second">&emsp;</div>
          <div class="first1">&emsp;Rt- Ear  (Hearing)</div>      <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->HearingRtEar)); ?></div>
          <div class="first">&emsp;Lt- Ear  (Hearing)</div>      <div class="second">&emsp;<?php echo ucwords(strtolower($ar->HearingLtEar)); ?></div>
            
  <div class="first"><span style="font-weight: bold;">PHISICAL DISABALITIES</span></div> <div class="second">&emsp;</div>
          <div class="first1">&emsp;Arm / Hands  (Right/Left)</div> <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->ArmsHandsRtLt)); ?></div>
          <div class="first1">&emsp;Leg / Feet (Right/Left)</div>  <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->LegsFeetRtLt)); ?></div>
           <div class="first">&emsp;Waist</div>                 <div class="second">&emsp;<?php echo ucwords(strtolower($ar->Waist)); ?></div>
            
          <div class="first">
    <span style="font-weight: bold;">SYSTEMIC EXAMINATION </span></div> <div class="second">&nbsp;</div>
   
         <div class="first1">&emsp;Blood Pressure</div>      <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->BloodPressure)); ?></div>
          <div class="first1">&emsp;Heart </div>             <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->Heart)); ?></div>
          <div class="first1">&emsp;Respiratory (Lung)</div> <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->RespiratoryLungs)); ?></div>
         <div class="first1">&emsp;Abdomen</div>             <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->Abdomen)); ?></div>
      <div class="first">&emsp;CNS(mental illness)</div>   <div class="second">&emsp;<?php echo ucwords(strtolower($ar->CNSMentalillness)); ?></div>
      <div class="first"><span style="font-weight: bold;">CHEST X-RAY PA view</span></div> <div class="second"> &emsp;<?php echo "Normal"; ?></div>
          <div class="title">
          <span>FINDINGS:</span><BR />
          <ul>
          <li> no active lung lesion seen.</li>
          <li> Both Hila and CP angel are normal.</li>
          <li> Cardic shadow are normal in size. Shape and contour with normal</li>
          <li> Visualized .</li>
          </ul>
          <span>CONCLUSION: Normal Study</span>
          </div>
          
          </div><!-- Close detail-left!-->


</div><!-- close exam-left !-->

<div class="exam-right">
<h3> LABORATORY EXAMINATION </h3>

<div class="detail-right"> 
         
         <div class="first"> <span style="font-weight: bold;">TYPE OF EXAMINATION</span></div>
        
         <div class="second">  <span style="font-weight: bold;">RESULT</span></div>
          
         <div class="first"> <span style="font-weight: bold;">URINALYSIS</span></div>     <div class="second">&nbsp;</div>
          
          <div class="first1">&emsp;Urine Glucose</div> <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->UrineGlucose)); ?></div>          
             <div class="first1">&emsp;Urine Protein / Albumin</div> <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->UrineProteinAlbumin)); ?></div>
             <div class="first">&emsp;Blood in Urine </div> <div class="second">&emsp;<?php echo ucwords(strtolower($ar->BloodinUrine)); ?></div>
              
            <div class="first"><span style="font-weight: bold;">BLOOD</span></div>  <div class="second">&nbsp;</div>
          
          <div class="first1">&emsp;Hemoglobin</div>               <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->Hemoglobin)); ?></div>
          <div class="first1">&emsp;Hematocrit</div>                <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->Hematocrit)); ?></div> 
          
          <div class="first1">&emsp;Blood Type</div>            <div class="second1">&emsp;<?php //echo ucwords(strtolower($ar->BloodType)); ?></div> 
           <div class="first1">&emsp;ABO</div>                       <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->ABO)); ?></div>
           <div class="first1">&emsp;Rh factor</div>              <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->Rhfactor)); ?></div>
           <div class="first1">&emsp;Cholesterol</div>  <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->Cholesterol)); ?></div>
           
            <div class="first1"><span style="font-weight: bold;">&emsp;Lever Function Test</span></div>  <div class="second1">&emsp;</div>
            
              <div class="first1">&emsp;Serum GPT</div>           <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->SerumGPT)); ?></div>
             <div class="first1">&emsp;Serum GOT</div>               <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->SerumGOT)); ?></div>
              <div class="first">&emsp;VDRL / TPHA  </div>            <div class="second">&emsp;<?php echo ucwords(strtolower($ar->VDRLTPHA)); ?></div>
            
          <div class="first">  <span style="font-weight: bold;">ELISA </span></div> <div class="second">&nbsp;</div>
   
         <div class="first1">&emsp;Hepatitis B Virus ( HBsAg)</div>    <div class="second1">&emsp;<?php echo ucwords(strtolower($ar->HepatitisBVirusHBsAg)); ?></div>
       <div class="first">&emsp;Hepatitis C Virus (Anti HCV) </div>   <div class="second">&emsp;<?php echo ucwords(strtolower($ar->HepatitisCVirusAntiHCV)); ?></div>
           
          <div class="first"><span style="font-weight: bold;">HIV AIDS</span></div> <div class="second"> &nbsp;</div>
          <div class="first1">&emsp;HIV AIDS Anti Body I/II</div> <div class="second1"> &emsp;<?php echo ucwords(strtolower($ar->HIVAIDSAntibodyIII)); ?></div>
          </div>



</div>

</div><!--close main!-->

<div style="clear:both"> </div>
<br />

<div class="bottom">
<div class="bottom-name">
<div class="left-p"> Dear Sir, Mentioned above is the Medical Report for: </div> <div class="right-p">&emsp;<?php echo strtoupper($name); ?></div> 
<div class="remark"> <span>REMARKS</span><br />
<div class="text">He is &emsp; <input name="" value="<?php echo $remarks; ?>" type="text" /> &emsp;for the job.</div></div>
<div class="sign">
<div class="left-p"> Medical Officer's Signature: </div><div class="right-p">&emsp;</div><br /><br />
<div class="left-p"> Medical Officer's Name: </div> <div class="right-p">&emsp;<?php echo $physician_name; ?> (M.B.B.S)</div>

</div>     
<div class="valid"><b>* This Medical report is valid for 30 Months.</b></div>

</div><!-- close bottom!-->
</div>


<div class="footer">
<h3>ISO 9001 : 2000 Certified</h3>
</div>

</div>