<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/medical_services.css" type="text/css" rel="stylesheet" />
<?php //Yii::app()->bootstrap->register(); ?>


<style>

/*@media print{*/
	
.photoright,.logo, .logo2{
        display: none !important;
    }
	
/*}*/

#wrapper{ 
width:760px; 
/*height:1089px;*/
/* background: #099; */
color:#000000;
margin-top:5px;
}
#top {
	color:#CCC;
	font-size:13pt;
	font-family: "Times New Roman";
	float:left;
	width:588px;
	margin-top:18px;	
}
	
#top b{	margin-left:327px;	}	
#top2{
	color:#CCC;
	font-size:13pt;
	font-family: "Comic Sans MS";
	float:left;
	width:400px;
	margin-left:189px;
	margin-top:170px;
}
	
#top2 b{	margin-left:56px;	}	

</style>
</head>


<body>

<div>

	<?php  echo $content; ?>
</div><!-- page -->


</body>
</html>
