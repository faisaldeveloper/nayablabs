<?php
$Summary_id = (int)$_GET['id'];
if(!empty($Summary_id) && isset(Yii::app()->session['bill_print']) && !empty(Yii::app()->session['bill_print'])){
	$bill_print = Yii::app()->session['bill_print'];
	$url_lab_form = Yii::app()->baseUrl."/PatientTestSummary/regcard/". $Summary_id;
	$url_patient_bill = Yii::app()->baseUrl."/PatientTestSummary/invoice/".$Summary_id;
	
	echo "<script type=\"text/javascript\">	printExternal('".$url_lab_form."',900,700); </script>";	
	echo "<script type=\"text/javascript\">	printExternal2('".$url_patient_bill."',900,700); </script>";
	unset(Yii::app()->session['bill_print']);
}

$this->breadcrumbs=array(
	'Patient Test Summaries'=>array('index'),
	'Manage',
);

$this->menu=array(
//array('label'=>'List PatientTestSummary','url'=>array('index')),
//array('label'=>'Create PatientTestSummary','url'=>array('create')),
);

$this->menu = "<div align=\"right\">";
$this->menu .= "<a id=\"new_patient\" class=\"alignright\"   href=\"".Yii::app()->baseUrl ."/Patient/create\"><img class=\"myclass\" src=\"" .Yii::app()->baseUrl ."/images/add.png\" title=\"Add New Patient\"  /></a>";
$this->menu .= "</div>";

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('patient-test-summary-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<table class="mytbl" style="background-color:transparent;" width="600" border="0">
  <tr>
    <td width="750px"><h3>Manage Patient Test Summaries</h3></td>    
    <td><?php echo $this->menu;?></td>
  </tr>  
</table>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:block">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 

/* $template ='';
if(Yii::app()->user->checkAccess(get_class($model).'View')) {$template .= "{view}";}
if(Yii::app()->user->checkAccess(get_class($model).'Update')) { $template .= "{update}";}
if(Yii::app()->user->checkAccess(get_class($model).'Delete')) {$template .= "{delete}";}
 */

$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'patient-test-summary-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'examination_date',
		//'klt_no',
		array('name'=>'reg_no', 'header'=>'Reg No', 'value'=>'$data->patient->reg_no'),
		array('name'=>'ref_no', 'header'=>'Reference No', 'value'=>'$data->patient->ref_no'),
		
		array('name'=>'patient_id', 'type'=>'raw', 'value'=>'ucwords(strtolower($data->patient->name))'),
		//'patient_id',
		array('name'=>'panel_id', 'type'=>'raw', 'filter'=>CHtml::listData(Panel::model()->findAll(), 'id', 'name'), 'value'=>'$data->panel->name'),
		array('name'=>'referrer_id', 'type'=>'raw', 'filter'=>CHtml::listData(Referrer::model()->findAll(), 'id', 'name'), 'value'=>'$data->patient->referrer->name'),
		
		array('name'=>'country_applied_for', 'type'=>'raw', 'value'=>'$data->patient->country->name'),
		
		'price',
		'discount',		
		array('name'=>'payment', 'type'=>'raw', 'value'=>'$data->payment'),
		
		//array('name'=>'balance', 'type'=>'raw', 'value'=>'$data->balance'),		
		//'value'=> 'number_format($data[\'pastdue_pokok\']+$data[\'pastdue_bunga\'],0,"",".")',            
		/*
		'remarks',
		'user_id',
		'created_date',
		'updated_date',
		*/
		
		array(
			'header' => '___Actions___',
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'template'=>'{regcard} {test_inputs} {med_report} {invoice}',
			
			'buttons'=>array(	
					
					'regcard' => array(
					'label'=>'Registration Card',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/regcard.png',
					'url'=>'Yii::app()->baseUrl."/PatientTestSummary/regcard/$data->id"',
					'options'=>array('title'=>'Lab Form', 'class'=>'addimg', 'target'=>'_blank'),
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					),
					/* 
					'tick' => array(
					'label'=>'Tests Completed',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/tick.jpg',
					//'url'=>'Yii::app()->baseUrl."/PatientTestSummary/regcard/$data->id"',
					'options'=>array('title'=>'Tests Completed', 'class'=>'addimg'),
					'visible'=>'PatientTestSummary::checkTestDetails2($data->id)',
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					), */
					
					'test_inputs' => array(
					'label'=>'Tests Inputs',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/ad.png',
					'url'=>'Yii::app()->baseUrl."/PatientTestSummary/TestInputs/$data->id"',
					'options'=>array('title'=>'Tests Inputs', 'class'=>'addimg'),
					//'visible'=>'PatientTestSummary::checkTestDetails($data->id)',
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					),		
					
					/* 'test_entries' => array(
					'label'=>'Patient Tests',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/ad.png',
					'url'=>'Yii::app()->baseUrl."/PatientTestDetail/admin/$data->id"',
					'options'=>array('title'=>'Patient Tests', 'class'=>'addimg'),
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					),	 */
					
					'med_report' => array(
					'label'=>'Medical Report',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/tick.jpg',
					'url'=>'Yii::app()->baseUrl."/PatientTestSummary/MedReport/$data->id"',
					'options'=>array('title'=>'Medical Report', 'class'=>'addimg', 'target'=>'_blank'),
					'visible'=>'PatientTestSummary::checkTestDetails2($data->id)',
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					),		
					
					'invoice' => array(
					'label'=>'Patient Bill',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/invoice.gif',
					'url'=>'Yii::app()->baseUrl."/PatientTestSummary/invoice/$data->id"',
					'options'=>array('title'=>'Client Bill', 'class'=>'addimg', 'target'=>'_blank'),
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					),			 
					
						
								
				),//end buttons
			),//end Actions 
		
		
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{view} {update} {delete}',
//'template'=>$template ,

		'buttons'=>array(
					'update' => array(					
					'url'=>'Yii::app()->baseUrl."/Patient/update/$data->patient_id"',
					//'options'=>array('title'=>Yii::t('strings','Update').' '.Yii::t('strings','Item')),					
					),	
		),	
	),
),
)); ?>
