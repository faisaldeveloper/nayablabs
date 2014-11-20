<?php
$user_id = yii::app()->user->id;
$from_date1 = $data['from_date'];
$to_date1 = $data['to_date']; 
$referer_id = $data['recruiting_agency'];
$recruiting_agent_name = Referrer::model()->find("id = ".$referer_id)->name;
//echo "--$from_date1----$to_date1--------$referer_id--";
//exit; 

if(isset($from_date1) and isset($to_date1)){	
$showdate="<br/> From:  ".date("d/m/y", strtotime($from_date1))."\t TO:  ".date("d/m/y", strtotime($to_date1));	
$today = date("Y-m-d");
}

if($referer_id > 0){
$cond = "p.referrer_id =  $referer_id AND examination_date BETWEEN '".date("Y-m-d", strtotime($from_date1))."' AND '".date("Y-m-d", strtotime($to_date1))."'";
}
else {
$cond = "p.referrer_id > 0 AND examination_date BETWEEN '".date("Y-m-d", strtotime($from_date1))."' AND '".date("Y-m-d", strtotime($to_date1))."'";
}

//echo $cond;
 ?>
 
 <style>
 #mytable tr{
	 border: 1px solid;
	 line-height:6px;	 
 }
  .text{
	 font-size:10px;	 
 }
 </style>
 
<div class="container_mce" style="width:760px; background:#fff; margin:0 auto">
  <table width="100%" border="0">
 <tr>
    <td colspan="3" align="center" style="font-size:12px"><strong> Log Sheet Of Recruiting Agencies </strong></td>   
  </tr>
  
  <tr>    
    <td colspan="3" align="center" style="font-size:10px"><strong> <?php echo $showdate; ?></strong></td>  
  </tr>
</table>
  <div style="width:100%; border-bottom: solid 1px #000; margin:5px 0;"></div>
  <h3><?php echo strtoupper(strtolower($recruiting_agent_name)); ?></h3>
  
  <table id="mytable" width="100%" border="0">
    <tr>
      <td><strong>Sr#</strong></td>     
      <td align="left"><strong>Ref No.</strong></td>
      <td align="left"><strong>Date</strong></td>
      <td align="left"><strong>Name</strong></td>
      <td align="left"><strong>Passport No</strong></td>
      <td align="left"><strong>Rate</strong></td>
      <td align="left"><strong>Discount</strong></td>
      <td align="left"><strong>Payment</strong></td>      
      <td align="left"><strong>Balance</strong></td>
    </tr>
    <?php
		$result = Yii::app()->db->createCommand()->select("s.*, p.name, p.ref_no, p.referrer_id, p.passport_no")->from("patient_test_summary s")->join('patient p', 'p.id=s.patient_id')->where("$cond")->queryAll();
$total_record = count($result);

//echo "--------------------------".$total_record;

$total_price= 0; 
$total_discount= 0;
$total_payment= 0; 
$total_balance= 0;  

$i=0;
    foreach($result as $row){
		
		$examination_date = date("d-m-y",strtotime($row['examination_date']));
		$ref_no = $row['ref_no'];
		$name = $row['name'];
		$passport_no = $row['passport_no'];
		if(!empty($row['referrer_id']))
		$recruiting_agent = Referrer::model()->find("id = ".$row['referrer_id'])->name;
		$price = $row['price'];
		$discount = $row['discount'];
		$payment = $row['payment'];
		$balance = $row['balance'];
		$status = ($row['patient_test_status']==1)?"Normal":"Urgent";
		
		$total_price += $price; 
		$total_discount += $discount;
		$total_payment += $payment; 
		$total_balance += $balance;  
		
	 	$i++;	 
	?>
    <tr class="text">
      <td align="left"><?php echo $i;?></td>      
      <td align="left"><?php echo $ref_no;?></td>  
      <td align="left"><?php echo $examination_date;?></td> 
      <td align="left"><?php echo strtoupper(strtolower($name));?></td>      
      <td align="left"><?php echo  strtoupper(strtolower($passport_no));?></td>  
      <td align="left"><?php echo $price;?></td> 
      <td align="left"><?php echo $discount;?> </td>  
      <td align="left"><?php echo $payment;?></td>
      <td align="left"><?php echo $balance;?></td>
            
    </tr>
    <?php } ?>
    
    <tr class="text">
      <td align="left"><?php //echo $i;?></td>      
      <td align="right" colspan="4"><strong>Total</strong></td>  
     
      <td align="left"><b><?php echo number_format($total_price, 2); ?></b></td> 
      <td align="left"><b><?php echo number_format($total_discount, 2); ?></b></td>  
      <td align="left"><b><?php echo number_format($total_payment, 2); ?></b></td>
      <td align="left"><b><?php echo number_format($total_balance, 2); ?></b></td>
            
    </tr>
  </table>
 
  <div style="clear:both"></div> 
 
 <p align="right" style=" margin-top:40px; padding-right:10px;"><span style="float:left; font-size:12px;">Print Time: <?php echo date("d/m/y H:i"); ?></span> <input id="print" type="button" value="Print" onclick="printthis(this.id)" />    </p>
</div>


