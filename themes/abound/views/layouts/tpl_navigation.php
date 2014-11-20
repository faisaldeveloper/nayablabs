<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <!--  <a class="brand" href="#">abound <small>admin theme v1.1</small></a>  -->
          
          <?php 
		  //array('label'=>'OEC', 'url'=>Yii::app()->baseUrl.'/TestMain/admin/1'),
		  $arr_menu_panel = array();  $arr_menu_panel2 = array();
		  $arr_menu_panel_sub = array(); $arr_menu_panel_sub2 = array();
		  $panel_res = Panel::model()->findAll();
		  foreach($panel_res as $row){
			  $url = Yii::app()->baseUrl.'/TestMain/admin/'. $row['id'];
			  $url2 = Yii::app()->baseUrl.'/Test/admin/'. $row['id'];
			  $arr_menu_panel_sub = array('label'=>$row['name'],'url'=>$url);
			  $arr_menu_panel_sub2 = array('label'=>$row['name'],'url'=>$url2);
			  array_push($arr_menu_panel, $arr_menu_panel_sub);
			  array_push($arr_menu_panel2, $arr_menu_panel_sub2);
		  }
		  ?>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav', 'fixed'=>false,),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
					
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Dashboard', 'url'=>array('/site/index')),						
						array('label'=>Yii::t('views','Patient Tests'), 'url'=>array('/PatientTestSummary/admin')),
						//array('label'=>Yii::t('views','Patients'), 'url'=>array('/Patient/admin')),
						
						//array('label'=>Yii::t('views','Panels'), 'url'=>array('/panel/admin')),
						
						//array('label'=>'Panel Tests Heads<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        //'items'=>$arr_menu_panel),
											
						
						//array('label'=>'Panel Tests <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                       // 'items'=>$arr_menu_panel2),
						
						
						array('label'=>Yii::t('views','Referrers'), 'url'=>array('/referrer/admin')),
						array('label'=>Yii::t('views','Reports'), 'url'=>array('/reports/index')),		
						
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
						
                        /* array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'My Messages <span class="badge badge-warning pull-right">26</span>', 'url'=>'#'),
							array('label'=>'My Tasks <span class="badge badge-important pull-right">112</span>', 'url'=>'#'),
							array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
							array('label'=>'Separated link', 'url'=>'#'),
							array('label'=>'One more separated link', 'url'=>'#'),
                        )), */
						
						
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<!--  <div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
   	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           <form class="navbar-search pull-right" action="">
           	 
           <input type="text" class="search-query span2" placeholder="Search">
           
           </form>
    	</div>   
    </div> 
</div> -->  <!-- subnav -->