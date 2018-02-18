<?php
/* @var $this SecondaryMeasureController */
/* @var $data SecondaryMeasure */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portion')); ?>:</b>
	<?php echo CHtml::encode($data->portion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('measure_units_id')); ?>:</b>
	<?php echo CHtml::encode($data->measure_units_id); ?>
	<br />


</div>