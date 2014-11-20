<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
 <div class="row">
         <div class="span2">
        
            <ul class="nav nav-list">
    <li class="nav-header"><?php
    $this->widget(
    'bootstrap.widgets.TbLabel',
    array(
    'type' => 'inverse',
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Inventory:',
    )
    );

?></li>
    <li class="active"><a href="<?php  echo Yii::app()->baseUrl; ?>/category/admin">Categories</a></li>
    <li><a href="<?php  echo Yii::app()->baseUrl; ?>/inventoryitem/admin">Items</a></li>
    <li><a href="<?php  echo Yii::app()->baseUrl; ?>/suppliers/admin">Suppliers</a></li>
    <li><a href="<?php  echo Yii::app()->baseUrl; ?>/store/admin">Store</a></li>
    <li><a href="<?php  echo Yii::app()->baseUrl; ?>/outlet/admin">Outlets</a></li>
    <li class="nav-header">System and Menu</li>
    <li><a href="<?php  echo Yii::app()->baseUrl; ?>/category/admin">Google</a></li>
    <li><a href="#">Yahoo!</a></li>
    <li><a href="#">Bing</a></li>
    <li><a href="#">Microsoft</a></li>
    <li><a href="#">Gadgetic World</a></li>
</ul>
         </div>
         <div class="span10">
             <?php echo $content; ?>
         </div>
     </div>
     </div><!-- content -->
<?php $this->endContent(); ?>