<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Productos'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Nuevo producto', 'url'=>array('create')),
	array('label'=>'Ver detalle de producto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar productos', 'url'=>array('admin')),
);
?>

<h1>Actualizar producto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>