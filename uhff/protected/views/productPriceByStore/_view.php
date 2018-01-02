<?php
/* @var $this ProductPriceByStoreController */
/* @var $data ProductPriceByStore */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stores_id')); ?>:</b>
	<?php echo CHtml::encode($data->store->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_id')); ?>:</b>
	<?php echo CHtml::encode($data->product->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>