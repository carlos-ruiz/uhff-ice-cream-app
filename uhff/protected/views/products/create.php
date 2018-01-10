<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Administrar Productos', 'url'=>array('admin')),
);
?>

<h1>Nuevo producto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>