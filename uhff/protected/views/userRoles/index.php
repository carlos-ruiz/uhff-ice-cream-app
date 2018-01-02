<?php
/* @var $this UserRolesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Roles',
);

$this->menu=array(
	array('label'=>'Nuevo rol de usuario', 'url'=>array('create')),
	array('label'=>'Administrar roles de usuario', 'url'=>array('admin')),
);
?>

<h1>Lista de roles de usuario</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
