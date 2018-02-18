<?php
/* @var $this InventoryController */
/* @var $model Inventory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventory-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php $data = ProductPriceByStore::model()->findAll(array('order'=>'stores_id, products_id'));
		foreach ($data as $value) {
			$value->description = $value->product->name.' - '.$value->description.' - '.$value->store->name; 
		}
		?>
		<?php echo $form->labelEx($model,'product_price_by_store_id'); ?>
		<?php echo $form->dropDownList($model,'product_price_by_store_id', CHtml::listData($data, 'id', 'description'), array('empty'=>'Seleccione el producto')); ?>
		<?php echo $form->error($model,'product_price_by_store_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity_min'); ?>
		<?php echo $form->textField($model,'quantity_min'); ?>
		<?php echo $form->error($model,'quantity_min'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->