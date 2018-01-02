<?php
/* @var $this StoresController */
/* @var $model Stores */

$this->breadcrumbs=array(
	'Sucursales'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Nueva sucursal', 'url'=>array('create')),
	array('label'=>'Actualizar sucursal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar sucursal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro de eliminar esta sucursal?')),
	array('label'=>'Administrar sucursales', 'url'=>array('admin')),
);
?>

<h1>Sucursal #<?php echo $model->id.' - '.$model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'phone',
	),
)); ?>
