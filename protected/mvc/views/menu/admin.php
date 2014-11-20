
<?php $this->widget('application.components.Dialogue',array('action'=>'admin')); ?>
<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Menu','url'=>array('index')),
array('label'=>'Create Menu','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('menu-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<script>
function deleteConfirm(selector){
var length = selector.closest('table').children('thead').children('tr').children('td').length;
//var length = $('table.items>thead>tr>td').length;

var msg='';
msg += '<?php echo Yii::t('strings','Are you sure you want to delete this item?');?>'+
			'\n';
for(i=1;i<=length-1;i++){
var title = selector.parent().parent().parent().parent().children(':nth-child(1)').children(':nth-child(1)').children(':nth-child('+i+')').text();
var tdval = selector.parent().parent().children(':nth-child('+i+')').text();

if(tdval.length>0){msg += title+'  = '+tdval+'\n';}

}

return msg;
}
</script>
<h1><?php //echo Yii::t('strings','Manage').' '.Yii::t('strings','Manage');?></h1>
<div style="padding-bottom:10px;">
<?php
    $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
    'type' => 'inverse',
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => "Manage Menu's:",
    )
    );

?>
</div>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
'id'=>'menu-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id',
		array(
            'header'=>'Sr #',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
		'name',
		array
(
    'class'=>'CButtonColumn',
    'template'=>'{email}',
    'buttons'=>array
    (
        'email' => array
        (
		     'header'=>'Add Items',
            'label'=>'Add Items to this menu',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/food.png',
            'url'=>'Yii::app()->createUrl("item/additem", array("id"=>$data->id))',
        ),
        
    ),
),
		//'status',
		//'tableorder',
array(
	
			'header' => CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_432_plus.png', Yii::t('strings','Create').' '.Yii::t('strings','Menu'),array('title'=>Yii::t('strings','Create').' '.Yii::t('strings','Menu') )),array('menu/create'),array('class'=>'update-dialog-create','id'=>Yii::t('strings','Create').' '.Yii::t('strings','Menu'))),
			
			'class'=>'bootstrap.widgets.TbButtonColumn',
			//'class' => 'CButtonColumn',
            'htmlOptions'=>array('class'=>'CButtonColumn','style'=>'width: 50px'),//width: 86px
			'template'=>'{view} {update} {delete}',
			
			"deleteConfirmation"=>"js:deleteConfirm($(this))",
			
            
			'buttons'=>array
		    (
            	'view' => array(
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_051_eye_open.png',
				'url'=>'Yii::app()->baseUrl."/menu/view/$data->id"',
				'options'=>array('title'=>Yii::t('strings','View').' '.Yii::t('strings','Menu')),
				'click' => "function( e ){
				e.preventDefault();
				$( '#update-dialog' ).children( ':eq(0)' ).empty(); // Stop auto POST
				
				updateDialog( $( this ).attr( 'href' ),'update-dialog' );
				$( '#update-dialog' )
				  .dialog( { title: '".Yii::t('strings','View').' '.Yii::t('strings','Menu').' '.Yii::t('strings','Information')."' } )
				  .dialog( 'open' ); }",
				),
				'update' => array(
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_030_pencil.png',
				'url'=>'Yii::app()->baseUrl."/menu/update/$data->id"',
				'options'=>array('title'=>Yii::t('strings','Update').' '.Yii::t('strings','Menu')),
				
				'click' => "function( e ){
				e.preventDefault();
				$( '#update-dialog' ).children( ':eq(0)' ).empty(); // Stop auto POST
				updateDialog( $( this ).attr( 'href' ),'update-dialog' );
				$( '#update-dialog' )
				  .dialog( { title: '".Yii::t('strings','Update').' '.Yii::t('strings','Menu')."' } )
				  .dialog( 'open' ); 
				  
				  }",
				),
				'delete' => array
		        (
		         'label'=>Yii::t('strings','Delete').' '.Yii::t('strings','Menu'),
		         'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_207_remove_2.png',
		         // 'url'=>'Yii::app()->baseUrl."/user/delete/$data->id"',
					//'options'=>array('title'=>'delete'),
					//'url'=>'Yii::app()->createUrl("Asset/email", array("id"=>$data->id))',
		        ),
		        
		    ),//end buttons
),
),
)); ?>
