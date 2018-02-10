<?php
/* @var $this ProductPriceByStoreController */
/* @var $model ProductPriceByStore */

$this->breadcrumbs=array(
	'Precios'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Nuevo precio', 'url'=>array('create')),
	array('label'=>'Editar precio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar precio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este precio?')),
	array('label'=>'Administrar precios', 'url'=>array('admin')),
);
?>

<h1>Precio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'label'=>$model->getAttributeLabel('stores_id'),
			'value'=>$model->store->name,
		),
		array(
			'label'=>$model->getAttributeLabel('products_id'),
			'value'=>$model->product->name,
		),
		'price',
		'description',
		array(
			'label'=>$model->getAttributeLabel('product.measure_units_id'),
			'value'=>$model->product->measureUnit->name,
		),
		array(
			'label'=>$model->getAttributeLabel('secondary_measure_id'),
			'value'=>$model->secondaryMeasure==null ? "N/A" : $model->secondaryMeasure->name,
		),
		'sold_portions',
	),
)); ?>
