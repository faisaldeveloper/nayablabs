<?php /* @var $this Controller */ 
if(Yii::app()->controller->id=='site' && Yii::app()->controller->action->id=='login'){
}else{
	if(!Yii::app()->user->id>0){
	echo "<script>window.location='".Yii::app()->baseUrl."/site/login';</script>";
	//echo 'user id is '.Yii::app()->user->id;
	}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" debug="true">
<head>
    
<?php /*?><script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js#enableTrace=true,overrideConsole=true">
</script><?php */?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/form.css" />
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?> 

<script>
//it solve bootstrap drop down nav problem on mobile devices
jQuery(document).ready(function($) {
	
	$(document).click(function(e){
	$('ul.dropdown-menu').each(function(index, element) {
     var style = $(this).css("display");
	 if(style=='block'){$(this).css("display","none")}
    });
    });
	
$("li.dropdown a").click(function(e){
	$('ul.dropdown-menu').each(function(index, element) {
     var style = $(this).css("display");
	 if(style=='block'){$(this).css("display","none")}
    });
    $(this).next('ul.dropdown-menu').css("display", "block");
    e.stopPropagation();
    });
});
/*jQuery(document).ready(function($) {
$('li.dropdown a').on('click', function(event){
   event.stopPropagation();
});
});*/
</script>

<style>
.grid-view table.items th a {
    padding-right: 16px !important;
    display:inline !important;
}

</style>
<style>
@media print
{
#mynavbar,.pagination,#myslidemenu,#header,#footer,.span3,.search-button,.filters,th.checkbox-column, td.checkbox-column, th.button-column,td.button-column,td.CButtonColumn,#savereportdiv,.salary_paidSelected-button, .deleteSelected-button, #report_header_time_div,.navbar-inner,.search-form
    {
        display: none !important;
    }
 
 #print{
  display: block !important;
 }
 
 a:link:after, a:visited:after {content:"" !important; font-size:90% !important;}
 
 .container{width:760px;}
 .span-19{}
 th{ background:#ccc;}
 tr.odd{ background:#fff;}
 th,td{border:1px dashed #999;}
 #page{border:0px; padding-top:0px;}
 #content{min-heignt:0px;padding:0px;}
}
h1{ font-size:16px;}
</style>



</head>

<body>

<style>
body {
    padding-left: 0px;
    padding-right: 0px;
}
.container{
	padding-left: 10px;
    padding-right: 10px;
}
#page{
	padding-top:0px;
}
.navbar {
 margin-bottom: 10px;	
}
.grid-view {
    padding-top: 5px;
}
form {
    margin: 0 0 10px;
}
.pagination {
    margin: 0; 
	padding: 0;
}
.table {
    margin-bottom: 10px;
}
</style>
<?php

if(isset(Yii::app()->user->mylang) && Yii::app()->user->mylang=='ar'){
$lang = array('label'=>Yii::t('layout','English'), 'url'=>array('#'),'linkOptions' => array(
        'submit' => array('', 'lang'=>'en', ),'confirm' => Yii::t('strings','Are you sure you want to change Language?')));
}else{
$lang = array('label'=>Yii::t('layout','Arabic'), 'url'=>array('#'),'linkOptions' => array(
        'submit' => array('', 'lang'=>'ar', ),'confirm' => Yii::t('strings','Are you sure you want to change Language?')));	
}

$pos_link=Yii::app()->baseUrl;
if($this->id=='reports'){
$pos_link = Yii::app()->baseUrl.'/reports';
}
$this->widget('bootstrap.widgets.TbNavbar', array(
'type'=>null, // null or 'inverse'
'fixed'=>false,
'brand'=>Yii::t('layout',Yii::app()->name),
'brandUrl'=>$pos_link,
'collapse'=>true, // requires bootstrap-responsive.css
'htmlOptions'=>array('id'=>'mynavbar','class'=>'navbar-top'),
'items'=>array(
array(
'class'=>'bootstrap.widgets.TbMenu',

'items'=>array(
array('label'=>Yii::t('layout','Home'), 'url'=>array('/site/index')),
array('label'=>Yii::t('layout','Reports'), 'url'=>array('/reports/index')),
//array('label'=>Yii::t('layout','System Settings'), 'url'=>array('/SystemSettings/create')),
//array('label'=>Yii::t('layout','Contact'), 'url'=>array('/site/contact')),
array('label'=>Yii::t('layout','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
array('label'=>Yii::t('layout','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
),
),



),
));

?>
<div class="container" id="page">
<div id="statusMsg" style="position:absolute">
<?php
$this->widget('bootstrap.widgets.TbAlert', array(
'block'=>true, // display a larger alert block?
'fade'=>true, // use transitions?
'closeText'=>'×', // close link text - if set to false, no close link is displayed
'alerts'=>array( // configurations per alert type
'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
'danger'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
),
));	
?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

</div>

	<?php echo $content; ?>

<div class="clear"></div>
</div><!-- page -->

<div id="footer" style=" text-align:center; background-color: #EEEEEE; padding:10px 1%; width:98%; ">
		Copyright &copy; <?php echo date('Y'); ?> by Maaliksoft.com.
		All Rights Reserved.
	</div><!-- footer -->
    
</body>
</html>

<script>
$(function(){
var height = $(window).height();
footer_pos = height;
//$(body).attr('style','min-height:'+footer_pos+'px;');
});
</script>

<?php
/*echo '<pre>';
print_r(Yii::app()->session['settings']);
echo '</pre>';
echo Yii::app()->session['settings']['taxcontrol'];
echo '<br>';*/
?>

