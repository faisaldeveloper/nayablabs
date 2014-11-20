<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/oec.css" type="text/css" rel="stylesheet" />
<?php //Yii::app()->bootstrap->register(); ?>
</head>


<body>

<div>
	<?php echo $content; ?>
</div><!-- page -->


</body>
</html>
