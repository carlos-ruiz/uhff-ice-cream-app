<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Nuevo producto', 'url'=>array('create')),
	array('label'=>'Editar producto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro de eliminar este producto?')),
	array('label'=>'Administrar productos', 'url'=>array('admin')),
);
?>

<h1>Producto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		array(
			'label'=>$model->getAttributeLabel('measure_units_id'),
			'value'=>$model->measureUnit->name,
		),
	),
)); ?>
<br>
<hr>

<div class="align-center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?= $model->image ?>" width="200" alt="<?= $model->image ?>"></div>
