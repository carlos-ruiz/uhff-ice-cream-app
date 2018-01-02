<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Nuevo usuario', 'url'=>array('create')),
	array('label'=>'Ver detalles de usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Actualizar usuarios <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>