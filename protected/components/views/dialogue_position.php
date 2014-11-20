<style>
.ui-dialog{
	<?php /*?>
	z-index:<?php echo $z_index;?> !important;
	width: <?php echo $width;?> !important;
	
	top:<?php echo $top;?> !important;
	background-color:#ffffff;
	
	height: auto !important; 
	<?php */?>
}

</style>
<script>
/*$(function(){
var this_browser_width = $('body').width();
	var page_div = $('#page').width();
	var leftmargin=0;
	if(this_browser_width>page_div){
	leftmargin = (this_browser_width-page_div)/2;
	}
	
	var dialogue_height = $('\.alert').height();
	var this_browser_height = $('body').height();
	var pos = 'fixed';
	if(dialogue_height>this_browser_height){pos='absolute';}

	$('\.ui-dialog').attr('style', 'position:'+pos+'; left: '+leftmargin+'px;');
});*/

/*$(function(){//in center and if width is greater or height is greater than container

	var this_browser_width = $('body').width();
	var page_div = $('\.ui-dialog').width();
	
	var leftmargin=0;
	if(this_browser_width>page_div){
	leftmargin = (this_browser_width-page_div)/2;
	}
	//alert(leftmargin+'=('+this_browser_width+'-'+page_div+')/2');
	var this_browser_height = $('body').height();
	var dialogue_height = $('\.ui-dialog').height();
	
	//alert(dialogue_height+'>'+this_browser_height);
	var pos = 'fixed';
	if(dialogue_height>this_browser_height || page_div>this_browser_width){pos='absolute';}

	//$('.ui-dialog').attr('style', 'position:'+pos+'; left: '+leftmargin+'px;');


});*/

</script>
<?php
/*
Yii::app()->clientScript->registerScript("someId", "
    var this_browser_width = $('body').width();
	var page_div = $('#page').width();
	var leftmargin=0;
	if(this_browser_width>page_div){
	leftmargin = (this_browser_width-page_div)/2;
	}
	
	var dialogue_height = $('\.alert').height();
	var this_browser_height = $('body').height();
	var pos = 'fixed';
	if(dialogue_height>this_browser_height){pos='absolute';}

	$('\.ui-dialog').attr('style', 'overflow:hidden; position:'+pos+'; top: $top; width: auto; height: auto; left: '+leftmargin+'px; z-index: $z_index; background-color:#ffffff');

", CClientScript::POS_READY);
*/
?>
