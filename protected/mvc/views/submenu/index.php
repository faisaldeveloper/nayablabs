<?php
$this->breadcrumbs=array(
	'Submenus',
);

$this->menu=array(
array('label'=>'Create Submenu','url'=>array('create')),
array('label'=>'Manage Submenu','url'=>array('admin')),
);
?>

<h1>Submenus</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'submenuView'=>'_view',
)); ?>
