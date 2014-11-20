<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/western_global.css" type="text/css" rel="stylesheet" />
<?php //Yii::app()->bootstrap->register(); ?>
<style>

/*@media print{*/
	
.photoright,.logo, .logo2,.foot{
        display: none !important;
    }
	
/*}*/

#wrapper{ 
width:760px; 
/*height:1089px;*/
/*background: #099;*/
color:#000000;
margin-top:5px;
}

h3{
font-family:"Times New Roman";
font-size:13pt;
text-decoration:underline;
padding-bottom:0px;
margin-bottom:1px;
margin-top:0px;}
p{
	margin-top:2px;
	margin-bottom:0px;
}
span{
font-size:11pt;
font-family:"Times New Roman";}

#top {
	font-size:9pt;
	font-family:"Times New Roman";
	font-style:italic;
	float:left;
	width:100%;
	margin:0 auto;
	text-align:center;}	

#top2{
	font-size:18pt;
	font-family: "Times New Roman";
	float:left;
	width:100%;
	margin-top:10px;
	text-align:center;}
	
#top2 b{
text-decoration: underline; 
}		
#top3{
	float:left;
	width:100%;
	}

</style>
</head>


<body>

<div>
	<?php echo $content; ?>
</div><!-- page -->


</body>
</html>
