<?php 

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	'Manage',
);

$this->menu=array(
//array('label'=>'List Patient','url'=>array('index')),
array('label'=>'Create Patient','url'=>array('create')),
);


//this var is defined in framework/web/CCoontroler.php
$this->menu = "<div align=\"right\">";
$this->menu .= "<a id=\"new_patient\" class=\"alignright\"   href=\"".Yii::app()->baseUrl ."/Patient/create\"><img class=\"myclass\" src=\"" .Yii::app()->baseUrl ."/images/add.png\" title=\"Add New Patient\"  /></a>";
$this->menu .= "</div>";

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('patient-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<table class="mytbl" style="background-color:transparent;" width="300" border="0">
  <tr>
    <td width="750px"><h3>Manage Patients</h3></td>    
    <td><?php echo $this->menu;?></td>
  </tr>  
</table>

</script>
<style>
.addimg{
	padding: 0px 5px 0px 10px; 
	
}

.alignright2{
	float:right;
	margin-right:20px;
}
</style>


<?php /*?><?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --><?php */?>

<?php 
$template ='';
if(Yii::app()->user->checkAccess(get_class($model).'View')) {$template .= "{view}";}
if(Yii::app()->user->checkAccess(get_class($model).'Update')) { $template .= "{update}";}
if(Yii::app()->user->checkAccess(get_class($model).'Delete')) {$template .= "{delete}";}

$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'patient-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'reg_no',
		//'name',
		array('name'=>'name', 'type'=>'raw', 'value'=>'ucwords(strtolower($data->name))'),
		//'father_name',
		array('name'=>'father_name', 'type'=>'raw', 'value'=>'ucwords(strtolower($data->father_name))'),
		
		//'address',
		array('name'=>'address', 'type'=>'raw', 'value'=>'ucwords(strtolower($data->address))'),
		
		'phone',
		array('name'=>'country_applied_for', 'type'=>'raw', 'value'=>'$data->countryAppliedFor->name'),
		array('name'=>'panel_id', 'type'=>'raw', 'value'=>'$data->panel->name'),
		array('name'=>'gender', 'type'=>'raw', 'value'=>'($data->gender==1)?"Male":"Female"'),
		//array('name'=>'marital_status', 'type'=>'raw', 'value'=>'Settings::getMaritalStatus($data->marital_status)'),
		//'country',
		//'patient_type_id',		
		//'referrer_id',
		//'ref_no',
		
		 /*  array(
			'header' => 'Test',
			'class' => 'CButtonColumn',
			'template'=>'{regcard}',
			
			   'buttons'=>array(				
					'regcard' => array(
					'label'=>'Patient Tests',
					'imageUrl'=>Yii::app()->request->baseUrl.'/images/regcard.png',
					'url'=>'Yii::app()->baseUrl."/patientTestSummary/create/$data->id"',
					'options'=>array('title'=>'Patient Tests', 'class'=>'addimg'),
					//'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
					),										
				),//end buttons
			),//end Actions   */
			
		
		
		/*
		'name',
		'father_name',
		'gender',
		'age',
		'marital_status',
		'address',
		'phone',
		'country',
		'country_applied_for',
		'cnic',
		'visa_type',
		'passport_no',
		'place_of_issue',
		'date_of_issue',
		'position_applied_for',
		'recruiting_agent',
		'height',
		'weight',
		'panel_id',
		'user_id',
		'created_date',
		'updated_date',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>$template ,
),
),
)); ?>
