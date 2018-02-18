<?php
/* @var $this SecondaryMeasureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Secondary Measures',
);

$this->menu=array(
	array('label'=>'Create SecondaryMeasure', 'url'=>array('create')),
	array('label'=>'Manage SecondaryMeasure', 'url'=>array('admin')),
);
?>

<h1>Secondary Measures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
