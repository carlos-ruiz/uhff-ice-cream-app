<?php
/* @var $this StoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stores',
);

$this->menu=array(
	array('label'=>'Nueva sucursal', 'url'=>array('create')),
	array('label'=>'Administrar sucursales', 'url'=>array('admin')),
);
?>

<h1>Lista de sucursales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
