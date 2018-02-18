<?php
/* @var $this SecondaryMeasureController */
/* @var $model SecondaryMeasure */

$this->breadcrumbs=array(
	'Unidades secundarias'=>array('admin'),
	'Administrar',
);
$this->menu=array(
	array('label'=>'Nueva unidad', 'url'=>array('create')),
);
?>

<h1>Administrar unidades secundarias</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'secondary-measure-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'portion',
		'measure_units_id',
		array( 'name'=>'measureUnit_search', 'value'=>'$data->measureUnits->name'),
		array(
			'class'=>'CButtonColumn',
			'template' => '{update}',
		),

	),
)); ?>
