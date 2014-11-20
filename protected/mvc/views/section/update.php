<?php
if(Yii::app()->user->hasState('store'))
{
	$store_id=Yii::app()->user->getState('store');
	

}
if(Yii::app()->user->hasState('outlet'))
{
	$outlet_id=Yii::app()->user->getState('outlet');
	

}
?>
<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Section','url'=>array('index')),
	array('label'=>'Create Section','url'=>array('create')),
	array('label'=>'View Section','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Section','url'=>array('admin')),
	);
	?>

	<h1>Update Section <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('section'=>$section,'outlet_id'=>$outlet_id)); ?>