<?php
/* @var $this InventoryController */
/* @var $data Inventory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity_min')); ?>:</b>
	<?php echo CHtml::encode($data->quantity_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_price_by_store_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_price_by_store_id); ?>
	<br />


</div>