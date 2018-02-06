<?php
/* @var $this ProductPriceByStoreController */
/* @var $model ProductPriceByStore */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-price-by-store-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'stores_id'); ?>
		<?php echo $form->dropDownList($model,'stores_id', CHtml::listData(Stores::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione la sucursal')); ?>
		<?php echo $form->error($model,'stores_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_id'); ?>
		<?php
			$htmlOptions = array(
				"ajax"=>array(
				"url"=>$this->createUrl("/products/loadSecondaryMeasureUnit"),
				"type"=>"POST",
				"update"=>"#ProductPriceByStore_secondary_measure_id"
				),
				"empty"=>"Seleccione el producto",
			);
		?>
		<?php echo $form->dropDownList($model,'products_id', CHtml::listData(Products::model()->findAll(), 'id', 'name'), $htmlOptions); ?>
		<?php echo $form->error($model,'products_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'secondary_measure_id'); ?>
		<?php echo $form->dropDownList($model,'secondary_measure_id',$model->getSecondaryMeasureUnits(isset($model->products_id)?$model->products_id:0), array("empty"=>"Seleccione unidad secundaria")); ?>
							
		<?php // echo $form->dropDownList($model,'secondary_measure_id', array(), array('empty'=>'Seleccione unidad secundaria')); ?>
		<?php echo $form->error($model,'secondary_measure_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sold_portions'); ?>
		<?php echo $form->textField($model,'sold_portions',array('size'=>45,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sold_portions'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->