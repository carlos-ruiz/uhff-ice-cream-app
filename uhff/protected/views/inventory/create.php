<?php
/* @var $this InventoryController */
/* @var $model Inventory */

$this->breadcrumbs=array(
	'Inventarios'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Administrar inventraios', 'url'=>array('admin')),
);
?>

<h1>Nuevo Inventario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>