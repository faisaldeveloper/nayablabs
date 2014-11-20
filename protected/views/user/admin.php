<?php $this->widget('application.components.Dialogue',array('action'=>'admin')); ?>
<?php

$this->breadcrumbs=array(
	'User'=>array('index'),
	Yii::t('strings','Manage'),
);
$this->menu=array(
array('label'=>Yii::t('strings','List').' '.Yii::t('strings','User'),'url'=>array('index')),
array('label'=>Yii::t('strings','Create').' '.Yii::t('strings','User'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('user-grid', {
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
<h1><?php echo Yii::t('strings','Manage').' '.Yii::t('strings','User');?></h1>

<?php echo CHtml::link(Yii::t('strings','Advanced').' '.Yii::t('strings','Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
'id'=>'user-grid',

'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
//'template' => "{extendedSummary}\n{items}",
'filter'=>$model,
'columns'=>array(
		//'id',
		array('header'=>'Sr #','class'=>'IndexColumn'),
		'name',
		'username',
		'password',
	
	array(
	
			'header' => CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_432_plus.png', Yii::t('strings','Create').' '.Yii::t('strings','User'),array('title'=>Yii::t('strings','Create').' '.Yii::t('strings','User') )),array('user/create'),array('class'=>'update-dialog-create','id'=>Yii::t('strings','Create').' '.Yii::t('strings','User'))),
			
			'class'=>'bootstrap.widgets.TbButtonColumn',
			//'class' => 'CButtonColumn',
            'htmlOptions'=>array('class'=>'CButtonColumn','style'=>'width: 50px'),//width: 86px
			'template'=>'{view} {update} {delete}',
			
			"deleteConfirmation"=>"js:deleteConfirm($(this))",
			
            
			'buttons'=>array
		    (
            	'view' => array(
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_051_eye_open.png',
				'url'=>'Yii::app()->baseUrl."/User/view/$data->id"',
				'options'=>array('title'=>Yii::t('strings','View').' '.Yii::t('strings','User')),
				'click' => "function( e ){
				e.preventDefault();
				$( '#update-dialog' ).children( ':eq(0)' ).empty(); // Stop auto POST
				
				updateDialog( $( this ).attr( 'href' ),'update-dialog' );
				$( '#update-dialog' )
				  .dialog( { title: '".Yii::t('strings','View').' '.Yii::t('strings','User').' '.Yii::t('strings','Information')."' } )
				  .dialog( 'open' ); }",
				),
				'update' => array(
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_030_pencil.png',
				'url'=>'Yii::app()->baseUrl."/User/update/$data->id"',
				'options'=>array('title'=>Yii::t('strings','Update').' '.Yii::t('strings','User')),
				
				'click' => "function( e ){
				e.preventDefault();
				$( '#update-dialog' ).children( ':eq(0)' ).empty(); // Stop auto POST
				updateDialog( $( this ).attr( 'href' ),'update-dialog' );
				$( '#update-dialog' )
				  .dialog( { title: '".Yii::t('strings','View').' '.Yii::t('strings','User')."' } )
				  .dialog( 'open' ); 
				  
				  }",
				),
				'delete' => array
		        (
		         'label'=>Yii::t('strings','Delete').' '.Yii::t('strings','User'),
		         'imageUrl'=>Yii::app()->request->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_207_remove_2.png',
		         // 'url'=>'Yii::app()->baseUrl."/user/delete/$data->id"',
					//'options'=>array('title'=>'delete'),
					//'url'=>'Yii::app()->createUrl("Asset/email", array("id"=>$data->id))',
		        ),
		        
		    ),//end buttons
			
	),
	
),

/*'extendedSummary' => array(
'title' => 'Expertise',
'columns' => array(
'username' => array(
'label'=>'Total Expertise',
'types' => array(
'imdad'=>array('label'=>'Imdad'),
'ali'=>array('label'=>'Ali'),

),
'class'=>'TbPercentOfTypeGooglePieOperation',
)
)
),

'extendedSummaryOptions' => array(
'class' => 'well pull-right',
'style' => 'width:300px'
),

*/
)); ?>

<?php
    $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'myModal')); ?>
     
    <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
    </div>
     
    <div class="modal-body">
    it is body
    <form >
    
    <input type="submit"  />
    
    <?php //CHtml::image(Yii::app()->baseUrl.'/images/glyphicons/glyphicons/png/glyphicons_432_plus.png', 'Create User',array('title'=>'Create User'))
	
	?>
        
        
    </form>
    </div>
     
    <div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'primary',
    'label' => 'Save changes',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Close',
    'url' => '#',
    'htmlOptions' => array('data-dismiss' => 'modal'),
    )); ?>
    </div>
     
    <?php $this->endWidget(); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label' => 'Click me',
    'type' => 'primary',
    'htmlOptions' => array(
    'data-toggle' => 'modal',
    'data-target' => '#myModal',
    ),
    )); ?>
