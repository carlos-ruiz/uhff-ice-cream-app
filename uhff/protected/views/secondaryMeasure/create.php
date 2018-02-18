<?php
/* @var $this SecondaryMeasureController */
/* @var $model SecondaryMeasure */

$this->breadcrumbs=array(
	'Unidades secundarias'=>array('admin'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Administrar unidades secundarias', 'url'=>array('admin')),
);
?>

<h1>Nueva unidad secudnaria</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>