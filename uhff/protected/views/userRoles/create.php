<?php
/* @var $this UserRolesController */
/* @var $model UserRoles */

$this->breadcrumbs=array(
	'User Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de roles de usuario', 'url'=>array('index')),
	array('label'=>'Administrar roles de usuario', 'url'=>array('admin')),
);
?>

<h1>Nuevo rol de usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>