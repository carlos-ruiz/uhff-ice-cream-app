<?php
/* @var $this ProductPriceByStoreController */
/* @var $model ProductPriceByStore */

$this->breadcrumbs=array(
	'Precios'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Nuevo precio', 'url'=>array('create')),
	array('label'=>'Ver detalles de precio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar precios', 'url'=>array('admin')),
);
?>

<h1>Actualizar precio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>