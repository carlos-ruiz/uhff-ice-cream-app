<?php
/* @var $this CashCutController */
/* @var $model CashCut */

$this->breadcrumbs=array(
	'Cortes de caja'=>array('admin'),
	'Administrar',
);
?>

<h1>Administrar cortes de caja</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cash-cut-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(      
            'name'=>'datetime',
            'value'=>'date("d/m/Y h:m:s a", strtotime($data->datetime))',
        ),
		'amount',
		array( 'name'=>'user_search', 'value'=>'$data->user->name'),
		array( 'name'=>'store_search', 'value'=>'$data->user->store->name'),
	),
)); ?>
