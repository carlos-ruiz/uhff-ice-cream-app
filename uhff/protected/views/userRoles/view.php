<?php
/* @var $this UserRolesController */
/* @var $model UserRoles */

$this->breadcrumbs=array(
	'User Roles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista de roles de usuario', 'url'=>array('index')),
	array('label'=>'Nuevo rol de usuario', 'url'=>array('create')),
	array('label'=>'Actualizar rol de usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar rol de usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro que quieres eliminar este rol de usuario?')),
	array('label'=>'Administrar roles de usuario', 'url'=>array('admin')),
);
?>

<h1>Rol de usuario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'role',
	),
)); ?>
