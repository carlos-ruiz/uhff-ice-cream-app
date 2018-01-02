<?php
/* @var $this ProductPriceByStoreController */
/* @var $model ProductPriceByStore */

$this->breadcrumbs=array(
	'Precios'=>array('admin'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Administrar precios', 'url'=>array('admin')),
);
?>

<h1>Nuevo precio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>