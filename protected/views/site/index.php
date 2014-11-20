<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1> <i>Dashboard</i></h1>

<style>

a{
	font-family:"Arial Black", Gadget, sans-serif;
	font-weight:600;
	color:#900;
	
}
</style>

<div class="span-23 showgrid">
<div class="dashboardIcons span-16" style="width:100%">

   
     <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Test/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-chemistry.png" alt="Test" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Test/admin"><?php echo Yii::t('views','Lab Tests'); ?></a></div>
    </div>
    
     <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/TestMain/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-picker.png" alt="Test" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/TestMain/admin"><?php echo Yii::t('views','Test Heads'); ?></a></div>
    </div>    
   
    
     <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Patient/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-pacman.png" alt="Patient" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Patient/admin"><?php echo Yii::t('views','Patients'); ?></a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/PatientTestSummary/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-clipboard.png" alt="PatientTestSummary" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/PatientTestSummary/admin"><?php echo Yii::t('views','Patient Tests'); ?></a></div>
    </div>   
        
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/ExaminationType/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-chart.png" alt="ExaminationType" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/ExaminationType/admin"><?php echo Yii::t('views','Exam Types'); ?></a></div>
    </div>     
    
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Panel/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-dribble2.png" alt="Panel" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Panel/admin"><?php echo Yii::t('views','Manage Panels'); ?></a></div>
    </div>    
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Referrer/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-target.png" alt="Referrer" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Referrer/admin"><?php echo Yii::t('views','Manage Referrer'); ?></a></div>
    </div>
    
     <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Country/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-earth.png" alt="countries" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Country/admin"><?php echo Yii::t('views','Manage Countries'); ?></a></div>
    </div>
    
  <?php /*?>  <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/PatientType/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-equaliser.png" alt="PatientType" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/PatientType/admin"><?php echo Yii::t('views','Patient Types'); ?></a></div>
    </div><?php */?>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/User/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/user.png" alt="User" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/User/admin"><?php echo Yii::t('views','Manage Users'); ?></a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Reports/index"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-book3.png" alt="Reports" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Reports/index"><?php echo Yii::t('views','Reports'); ?></a></div>
    </div>
    
    <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Sms/smsinputs"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-cellphone2.png" alt="Panel" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Sms/smsinputs"><?php echo Yii::t('views','Send SMS'); ?></a></div>
    </div>   
    
   <div class="dashIcon span-3">
        <a href="<?php echo Yii::app()->baseUrl; ?>/Settings/admin"><img src="<?php echo Yii::app()->baseUrl; ?>/images/big_icons/icon-gears.png" alt="settings" /></a>
        <div class="dashIconText"><a href="<?php echo Yii::app()->baseUrl; ?>/Settings/admin"  target="_blank"><?php echo Yii::t('views','Settings'); ?></a></div>
    </div>
    



    
</div><!-- END OF .dashIcons -->

</div>

