<?php
/* @var $this UserRolesController */
/* @var $model UserRoles */

$this->breadcrumbs=array(
	'User Roles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista de roles de usuarios', 'url'=>array('index')),
	array('label'=>'Nuevo rol de usuario', 'url'=>array('create')),
);
?>

<h1>Administrar roles de usuarios</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-roles-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'role',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
