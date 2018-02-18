<?php
/* @var $this SecondaryMeasureController */
/* @var $model SecondaryMeasure */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'secondary-measure-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portion'); ?>
		<?php echo $form->textField($model,'portion'); ?>
		<?php echo $form->error($model,'portion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'measure_units_id'); ?>
		<?php echo $form->dropDownList($model,'measure_units_id', CHtml::listData(MeasureUnits::model()->findAll(), 'id', 'name'), array('empty'=>'Seleccione la unidad de medida principal')); ?>
		<?php echo $form->error($model,'measure_units_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->