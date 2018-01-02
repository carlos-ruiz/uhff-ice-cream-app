<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Nuevo usuario', 'url'=>array('create')),
);

?>

<h1>Administrar usuarios</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
		'name',
		'last_name',
		array( 'name'=>'user_roles_id', 'value'=>'$data->userRole->role' ),
		array( 'name'=>'stores_id', 'value'=>'$data->store->name' ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
