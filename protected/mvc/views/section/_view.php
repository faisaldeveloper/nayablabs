<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('program')); ?>:</b>
	<?php echo CHtml::encode($data->program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('server_name')); ?>:</b>
	<?php echo CHtml::encode($data->server_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('printer_name')); ?>:</b>
	<?php echo CHtml::encode($data->printer_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outlet_id')); ?>:</b>
	<?php echo CHtml::encode($data->outlet_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('printer_ip')); ?>:</b>
	<?php echo CHtml::encode($data->printer_ip); ?>
	<br />


</div>