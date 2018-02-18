<?php
/* @var $this SecondaryMeasureController */
/* @var $model SecondaryMeasure */

$this->breadcrumbs=array(
	'Secondary Measures'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SecondaryMeasure', 'url'=>array('index')),
	array('label'=>'Create SecondaryMeasure', 'url'=>array('create')),
	array('label'=>'View SecondaryMeasure', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SecondaryMeasure', 'url'=>array('admin')),
);
?>

<h1>Update SecondaryMeasure <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>