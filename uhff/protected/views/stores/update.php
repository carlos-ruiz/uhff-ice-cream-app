<?php
/* @var $this StoresController */
/* @var $model Stores */

$this->breadcrumbs=array(
	'Sucursales'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Nueva sucursal', 'url'=>array('create')),
	array('label'=>'Ver sucursal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar sucursales', 'url'=>array('admin')),
);
?>

<h1>Actualizar sucursal <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>