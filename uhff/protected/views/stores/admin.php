<?php
/* @var $this StoresController */
/* @var $model Stores */

$this->breadcrumbs=array(
	'Sucursales'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Nueva sucursal', 'url'=>array('create')),
);

?>

<h1>Administrar sucursales</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'stores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'address',
		'phone',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
