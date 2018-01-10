<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Nuevo producto', 'url'=>array('create')),
);
?>

<h1>Administrar productos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'description',
		'measurement_unit',
		'image',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
