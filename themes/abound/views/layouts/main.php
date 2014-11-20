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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free yii themes, free web application theme">
    <meta name="author" content="Webapplicationthemes.com">
	<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
    <!-- Fav and Touch and touch icons -->
    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/icons/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-57-precomposed.png">
	<?php  
	  $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
	  $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
	  $cs->registerCssFile($baseUrl.'/css/abound.css');
	  
	  $cs->registerCssFile($baseUrl.'/css/form.css');
	  //$cs->registerCssFile($baseUrl.'/css/style-blue.css');
	  ?>
      <!-- styles for style switcher -->
      	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/style-blue.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style2" href="<?php echo $baseUrl;?>/css/style-brown.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style3" href="<?php echo $baseUrl;?>/css/style-green.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style4" href="<?php echo $baseUrl;?>/css/style-grey.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style5" href="<?php echo $baseUrl;?>/css/style-orange.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style6" href="<?php echo $baseUrl;?>/css/style-purple.css" />
        <link rel="alternate stylesheet" type="text/css" media="screen" title="style7" href="<?php echo $baseUrl;?>/css/style-red.css" />
	  <?php
	  $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.sparkline.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.pie.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/charts.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.knob.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.masonry.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/styleswitcher.js');
	?>
    
    <style>
.span1, .span2, .span5{
	width:100% !important;	
}
.breadcrumb {
    margin: 10px 0 20px !important;
}
</style>

<script>
function openPopUp (url) {
    var randomno = Math.floor((Math.random()*100)+1); 
    var printWindow = window.open(url,'PopUpWindow'+randomno,'scrollbars=1,menubar=0,resizable=1,width=850,height=500');
	printWindow.print();
	printWindow.close();
}

function printExternal(url,width,height) {
    var printWindow = window.open(url, 'Print1', 'left=100, top=100, width='+width+', height='+height+', toolbar=0, resizable=0');
   printWindow.addEventListener('load', function(){
       // printWindow.print();
        printWindow.close();
   }, false);
}
function printExternal2(url,width,height) {
    var printWindow = window.open(url, 'Print2', 'left=100, top=100, width='+width+', height='+height+', toolbar=0, resizable=0');
   printWindow.addEventListener('load', function(){
      //  printWindow.print();
        printWindow.close();
   }, true);
}
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
#new_patient,#mynavbar,.pagination,#myslidemenu,#header,#footer,.span3,.search-button,.filters,th.checkbox-column, td.checkbox-column, th.button-column,td.button-column,td.CButtonColumn,#savereportdiv,.salary_paidSelected-button, .deleteSelected-button, #report_header_time_div,.navbar-inner,.search-form
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

<section id="navigation-main">   
<!-- Require the navigation -->
<?php require_once('tpl_navigation.php')?>
</section><!-- /#navigation-main -->
    
<section class="main-body">
    <div class="container-fluid">
            <!-- Include content pages -->
            <?php echo $content; ?>
    </div>
</section>

<!-- Require the footer -->
<?php require_once('tpl_footer.php')?>



  </body>
</html>