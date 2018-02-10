<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Nuevo usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>