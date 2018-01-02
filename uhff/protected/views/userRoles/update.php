<?php
/* @var $this UserRolesController */
/* @var $model UserRoles */

$this->breadcrumbs=array(
	'User Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de roles de usuario', 'url'=>array('index')),
	array('label'=>'Nuevo rol de usuario', 'url'=>array('create')),
	array('label'=>'Ver detalle de rol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar roles de usuario', 'url'=>array('admin')),
);
?>

<h1>Actualizar rol de usuario <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>