<?php
/* @var $this InventoryController */
/* @var $model Inventory */

$this->breadcrumbs=array(
	'Inventarios'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Nuevo inventario', 'url'=>array('create')),
	array('label'=>'Editar inventario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar inventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro de eliminar este inventario?')),
	array('label'=>'Administrar inventario', 'url'=>array('admin')),
);
?>

<h1>Inventario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'quantity',
		'quantity_min',
		'product_price_by_store_id',
	),
)); ?>
