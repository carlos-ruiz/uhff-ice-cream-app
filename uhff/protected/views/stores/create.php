<?php
/* @var $this StoresController */
/* @var $model Stores */

$this->breadcrumbs=array(
	'Sucursales'=>array('admin'),
	'Nueva',
);

$this->menu=array(
	array('label'=>'Administrar sucursales', 'url'=>array('admin')),
);
?>

<h1>Nueva sucursal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>