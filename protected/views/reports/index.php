<?php 
$res = Referrer::model()->findAll();
$list = CHtml::listdata($res, 'id', 'name');


?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admissions-form',
	'enableAjaxValidation'=>false,	
	'htmlOptions'=>array('target'=>'_blank'),	
)); 
?>

<fieldset>
<legend class="mcelegend" style="color:#900;">Nayab Lab - Reporting Panel</legend>
   <table align="center" width="50%" border="0">
      
    <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;<label> Report Type:</label></td>
    <td colspan="4">&nbsp;    	
        <select name="report_type" id="report_type" onchange="update(this.value)">
        
                        <optgroup value="" label="-- Admin Reports --">                         
                            <option value="1">Daily Log Sheet</option>
                            <option value="2">Cash Report</option> 
                            <option value="3">Log Sheet By Recruiting Agencies</option>
                            <option value="4">Log Sheet By References</option>                     
                                   
                        </optgroup>
                        
                       
        </select>
    </td>
    </tr>
    
    <tr id="row_recruiting" style="display:none">
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;<label> Recruiting Agencies:</label></td>
    <td colspan="4">&nbsp;    	
        <select name="recruiting_agency" id="recruiting_agency">
                           <!-- <option value="0">All</option>-->
                            <?php 
								foreach($list as $k => $v){
									echo '<option value="'.$k.'">'.$v.'</option>';	
								}
							?>    
        </select>
    </td>
    </tr>
    
    
    
    </table>
    
    
     <table align="center" width="50%" border="0">      
  <tr id="datesRow" style="display:block;">
    <td>&nbsp;</td>
    <td width="18%"><?php echo CHtml::label('From : ','from_date'); ?></td>
    <td width="1%"><div style="float:left">
      <?php
		$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
			'name'=>'from_date', 
			//'model'=>$model,
			//'attribute'=>'chkin_date',
			 'value' => date("Y-m-d"),
			'options'=>array(
				'hourGrid' => 6,
				'dateFormat'=>'yy-mm-dd',
				'hourMin' => 0,
				'hourMax' => 23,
				'timeFormat' => 'h:m',
				'changeMonth' => true,
				'changeYear' => false,
				),
				
			));		
		?>
    </div></td>
    <td width="22%">&nbsp;</td>
    <td width="22%"><span class="lbl100"><?php echo CHtml::label('To : ','to_date'); ?></span></td>
    <td width="21%"><span style="float:left">
      <?php
		$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
			'name'=>'to_date', 
			//'model'=>$model,
			//'attribute'=>'chkin_date',
			 'value' => date("Y-m-d"),
			'options'=>array(
				'hourGrid' => 6,
				'dateFormat'=>'yy-mm-dd',
				'hourMin' => 0,
				'hourMax' => 23,
				'timeFormat' => 'h:m',
				'changeMonth' => true,
				'changeYear' => false,
				),
				//'htmlOptions'=>array('width' => '20px'),
			));		
		?>
    </span></td>
    <td width="10%">&nbsp;</td>    
  </tr>
      
  <tr>    
    <td colspan="7"><span style="margin-left:325px;"><?php echo CHtml::submitButton(' Create Report '); ?></span></td>  
  </tr>
</table>
</fieldset>

<?php $this->endWidget(); ?>


<script> 
function update(x){
	
	if(x==3){
		 $("#row_recruiting").show();
		 $("#recruiting_agency").val(1);
	}else {
		$("#row_recruiting").hide();
		$("#recruiting_agency").val('');
	}
	
}

$(document).ready(function(){
	//updatePayment();
});
</script>