<?php
/* @var $this ProductPriceByStoreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Precios',
);

$this->menu=array(
	array('label'=>'Nuevo precio', 'url'=>array('create')),
	array('label'=>'Administrar precios', 'url'=>array('admin')),
);
?>

<h1>Lista de precios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
