<style>
.ui-dialog{
	top:35px !important;
}
.ui-button{	
	 padding: 5px 14px 6px !important;
	 margin:0 10px;
}
</style>
<?php
//alert($(this).children().children("\.form").children("form").children("input[id=\"Users_name\"]").val());
	//alert($("input[id=\"Users_name\"]").val());
	
	//$("input[id=\"Users_name\"]").val("Imdad Hussain");
	
	//$("div.update-dialog-content").children("\.form").html();
	//$(this).children().children("\.form").children("form").children("input[id=\"Users_name\"]").val();
	//$(this).children().children("\.form").children("form").children("input[id=\"Users_name\"]").val("ali asad");
		
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
$this->beginWidget( 'zii.widgets.jui.CJuiDialog', array(
  'id' => 'update-dialog',
   'options' => array(
    'title' => 'Dialog',
    'autoOpen' => false,
	'show'=>array('effect'=> "slideDown",'duration'=>'8000'),
	//'hide'=>array('effect'=> "explode"),
    'modal' => true,
    'width' => 'auto',//1000 or auto
	'position'=>'left top',//center center
	'dialogClass'=>'ui-dialog',
	
	//'minWidth'=> '100',
	//'minHeight'=> '100',
    'resizable' => true,
	'buttons' => array(
	array('text'=>Yii::t('strings','Submit'),'click'=> 'js:function(){$("#userbutton").click();}'),
	array('text'=>Yii::t('strings','Cancel'),'click'=> 'js:function(){$(this).dialog("close");}'),
	),
	'resizeStart'=>'js:function(event, ui) {}',
	'beforeClose'=>'js:function(event, ui) {}',
	
  ),
  
)); 
echo "<div class='update-dialog-content' >
</div>";

$this->endWidget(); 
?>


<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
$this->beginWidget( 'zii.widgets.jui.CJuiDialog', array(
  'id' => 'update-dialog2',
   'options' => array(
    'title' => 'Dialog',
    'autoOpen' => false,
	'show'=>array('effect'=> "slideDown",'duration'=>'8000'),
	//'hide'=>array('effect'=> "explode"),
    'modal' => true,
    'width' => 'auto',
	'position'=>'left top',
	'dialogClass'=>'ui-dialog',
	//'minWidth'=> '100',
	//'minHeight'=> '100',
    'resizable' => true,
	'buttons' => array(
	array('text'=>Yii::t('strings','Submit'),'click'=> 'js:function(){$("#categorybutton").click();}'),
	array('text'=>Yii::t('strings','Cancel'),'click'=> 'js:function(){$(this).dialog("close");}'),
	),
	'resizeStart'=>'js:function(event, ui) {}',
	'beforeClose'=>"js:function(event, ui) {}",
	
  ),
  
)); 
echo "<div class='update-dialog2-content' >
</div>";

$this->endWidget(); 
?>

<?php
//Create Record
Yii::app()->clientScript->registerScript( 'updateDialogCreate', "
jQuery( function($){

    $( 'a.update-dialog-create' ).live( 'click', function( e ){
      e.preventDefault();
      $( '#update-dialog' ).children( ':eq(0)' ).empty();
	  updateDialog( $( this ).attr( 'href' ),'update-dialog' );
      $( '#update-dialog' )
        .dialog( { title: $( this ).attr( 'id' ) } )
		.dialog( 'open' );
		
    });
	
});
" );
?>
<?php
//Create Record
Yii::app()->clientScript->registerScript( 'updateDialogCreate2', "
jQuery( function($){

    $('a.update-dialog-create2').live( 'click', function( e ){
      e.preventDefault();
      $( '#update-dialog2' ).children( ':eq(0)' ).empty();
	  updateDialog( $( this ).attr( 'href' ),'update-dialog2' );
      $( '#update-dialog2' )
        .dialog( { title: $( this ).attr( 'id' ) } )
		.dialog( 'open' );
		
    });
	
	$(document).on('click','#Posting',function( e ){
		
		var payment = parseFloat($('#grand_total').html());
		var grandtotal = payment;
		var gst = parseFloat($('#gstamount').html());
		
		var remaining = 0;
		var scrn = parseFloat($('#screen').html());
		var tableorder_id = $('#tableorder_id').val();
		if(scrn>0){
		remaining = payment-scrn;
		payment = scrn;
		}
		
		
		payment = payment.toFixed(2);
		remaining = remaining.toFixed(2);
		if(scrn<grandtotal){alert('Payment must be Greater or Equal to the Grand Total');}
		//&& confirm('Are you sure! You have received amount of '+payment)
	if ((scrn>=grandtotal || isNaN(scrn)) && payment>0 && tableorder_id>0 ) {
		
		/*$('#payment').html(payment);
		$('#change').html(remaining);
		
		$.ajax({
		updateDialog( $( this ).attr( 'href' )+'/'+tableorder_id+'?payment='+payment+'gst='+gst,'update-dialog2' );
		type: 'POST',
		//dataType: 'text',
		data:{ status: 1,payment:payment},
		success: function( data ){
		$('#tableorder_id').val(0);
		alert('success');
		}
		});*/
        
        
      e.preventDefault();
	  
      $( '#update-dialog2' ).children( ':eq(0)' ).empty();
	  updateDialog( $( this ).attr( 'href' )+'/'+tableorder_id+'?payment='+payment,'update-dialog2' );
      $( '#update-dialog2' )
        .dialog( { title: $( this ).attr( 'id' ) } )
		.dialog( 'open' );
	}
	
    });

});
" );
?>
<?php
///////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
/*
$updateJS = CHtml::ajax( array(
  'url' => "js:url",
  'data' => "js:form.serialize() + action",
  'type' => 'post',
  'dataType' => 'json',
  'beforeSend'=>"function(){
	
	 	//$( '#'+element+'' ).dialog( { show: 'slideDown' });//.dialog( { width: 'auto' })
		$( '#'+element+' div.'+element+'-content' )
		.html( 
		'<div style=\"margin:50px 100px 50px 50px;\"><img src=\"/blavo/images/loading.gif\"  /></div>'
		 ).fadeIn(7000);  
	
	}",
  'success' => "function( data )
  {
	
	//$( '#'+element+'' ).dialog( { show: 'slideDown' });//.dialog( { 'width': 'auto'})
	
	  if( data.status == 'msg' )
    {
		$( '#'+element+' div.'+element+'-content' ).html( data.content );
		$( '#'+element+' div.'+element+'-content form input[type=submit]' )
        .die() // Stop from re-binding event handlers
        .live( 'click', function( e ){ // Send clicked button value
          e.preventDefault();
          updateDialog( false,''+element+'');//, $( this ).attr( 'name' ) 
     	});
		
	}else if( data.status == 'failure' )
    {
		$( '#'+element+' div.'+element+'-content' ).html( data.content );
	  
      	$( '#'+element+' div.'+element+'-content form input[type=submit]' )
        .die() // Stop from re-binding event handlers
        .live( 'click', function( e ){ // Send clicked button value
          e.preventDefault();
          updateDialog( false,''+element+'');//, $( this ).attr( 'name' ) 
     	});
    }
    else
    {
		$( '#'+element+'' ).dialog( 'close' ).children( ':eq(0)' ).empty();
      //$( '#'+element+' div.'+element+'-content' ).html( data.content );
      
	  if( data.status == 'success' ) // Update all grid views on success
      {
		  
		  $('#statusMsg').html('<div id=\'yw5\'><div class=\'alert in alert-block fade alert-success\'><a data-dismiss=\'alert\' class=\'close\' href=\'#\'>×</a><span style=\'color:#ff\'>'+data.content+'</span></div></div>');
		  
  $('html, body').animate({ scrollTop: 0 }, 'slow');
  
		  
        $( 'div.grid-view' ).each( function(){ // Change the selector if you use different class or element
          $.fn.yiiGridView.update( $( this ).attr( 'id' ),{} );
        });
      }
	  
      	//setTimeout(function(){
			//$( '#'+element+'' ).dialog( 'close' ).children( ':eq(0)' ).empty();
		//}, 2000);
		
		
    }
  }"
)); 
*/
?>

<?php
Yii::app()->clientScript->registerScript( 'updateDialog', "

function updateDialog( url,element)//, act 
{
	//alert(url+' +++++ '+element);

  var action = '';
  var form = $( '#'+element+' div.'+element+'-content form' );
  if( url == false )
  {
    //action = '&action=' + act;
	//alert(action);
	//action='';
    url = form.attr( 'action' );
  }
  {".//new block for php code into javascript code
  
  CHtml::ajax( array(
  'url' => "js:url",
  'data' => "js:form.serialize() + action",
  'type' => 'post',
  'dataType' => 'json',
  'beforeSend'=>"function(){
	
	 	//$( '#'+element+'' ).dialog( { show: 'slideDown' });//.dialog( { width: 'auto' })
		$( '#'+element+' div.'+element+'-content' )
		.html( 
		'<div style=\"margin:50px 100px 50px 50px;\"><img src=\"/".Yii::app()->baseUrl."/images/loading.gif\"  /></div>'
		 ).fadeIn(7000);  
	
	}",
  'success' => "function( data )
  {
	  	
	
	//$( '#'+element+'' ).dialog( { show: 'slideDown' });//.dialog( { 'width': 'auto'})
	
	  if( data.status == 'msg' )
    {
		$( '#'+element+' div.'+element+'-content' ).html( data.content );
		$( '#'+element+' div.'+element+'-content form input[type=submit]' )
        .die() // Stop from re-binding event handlers
        .live( 'click', function( e ){ // Send clicked button value
          e.preventDefault();
          updateDialog( data.url,''+element+'');//, $( this ).attr( 'name' ) 
     	});
		
	}else if( data.status == 'failure' )
    {
		$( '#'+element+' div.'+element+'-content' ).html( data.content );
	  
      	$( '#'+element+' div.'+element+'-content form input[type=submit]' )
        .die() // Stop from re-binding event handlers
        .live( 'click', function( e ){ // Send clicked button value
          e.preventDefault();
          updateDialog( data.url,''+element+'');//, $( this ).attr( 'name' ) 
     	});
    }
    else
    {
		
		$( '#'+element+'' ).dialog( 'close' ).children( ':eq(0)' ).empty();
      //$( '#'+element+' div.'+element+'-content' ).html( data.content );
      
	  if( data.status == 'success' ) // Update all grid views on success
      {
		if(data.inputType=='dropDownList'){
		$(data.inputId).after(data.inputData);
		}else if(data.tableorder_id>0){
		
		/*$('#tableno').html(data.tableno);
		$('#check_no').html(data.check_no);
		$('#waiter_id').html(data.waiter_id);
		$('#covers').html(data.cover);
		$('#tableorder_id').val(data.tableorder_id);
		$('#gst_rate').val(data.gst_rate);
		$('#discountrate').val(data.discountrate);
		$('#discount').val(data.discount);*/
		
		loadtabledata(data.tableorder_id);
		
		
		$.ajax({
		url: '".Yii::app()->baseUrl."/tableorder/loadTables',
		type: 'POST',
		success: function( data ){
		//console.log(data);
		var data = $.parseJSON(data);
		var table_data='';
		$.each(data,function(ind,val){
		table_data += '<span style=\"display:block; border-bottom: 1px solid red; margin: 0 5px; float:left\"><a href=\"javascript:void(0)\" class=\"contextmenu\" id=\"tableorder'+val.id+'\">'+val.tableno+'</a></span>';
		});
		//console.log(table_data);
		$('#tables_div').html('');
		$('#tables_div').html(table_data);
		mycontextmenu();
		}
		});
        
		updateTotals();
        }else if(data.hms_id>0){
		
		payments();
		}else if(data.content!=''){
		$('#statusMsg').html('<div id=\'yw5\'><div class=\'alert in alert-block fade alert-success\'><a data-dismiss=\'alert\' class=\'close\' href=\'#\'>×</a><span style=\'color:#ff\'>'+data.content+'</span></div></div>');
		$('html, body').animate({ scrollTop: 0 }, 'slow');  
        $( 'div.grid-view' ).each( function(){ // Change the selector if you use different class or element
          $.fn.yiiGridView.update( $( this ).attr( 'id' ),{} );
        });
		}
      }
	  
      	//setTimeout(function(){
			//$( '#'+element+'' ).dialog( 'close' ).children( ':eq(0)' ).empty();
		//}, 2000);
		
		
    }
  }"
))

."}
}" );

////////////////////////////////////////////////////////////////////////////////////////////////
?>
