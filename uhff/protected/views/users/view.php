<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Nuevo usuario', 'url'=>array('create')),
	array('label'=>'Editar usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estás seguro de eliminar este usuario?')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Usuario #<?php echo $model->id; ?> - <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'name',
		'last_name',
		array(
			'label'=>$model->getAttributeLabel('user_roles_id'),
			'value'=>$model->userRole->role,
		),
		array(
			'label'=>$model->getAttributeLabel('stores_id'),
			'value'=>$model->store->name,
		),
	),
)); ?>
