<?php
/* @var $this SecondaryMeasureController */
/* @var $model SecondaryMeasure */

$this->breadcrumbs=array(
	'Secondary Measures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SecondaryMeasure', 'url'=>array('index')),
	array('label'=>'Manage SecondaryMeasure', 'url'=>array('admin')),
);
?>

<h1>Create SecondaryMeasure</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>