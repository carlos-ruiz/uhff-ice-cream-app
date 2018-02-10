<?php
/* @var $this InventoryController */
/* @var $model Inventory */

$this->breadcrumbs=array(
	'Inventarios'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Nuevo inventario', 'url'=>array('create')),
	array('label'=>'Editar inventario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar inventario', 'url'=>array('admin')),
);
?>

<h1>Editar inventario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>