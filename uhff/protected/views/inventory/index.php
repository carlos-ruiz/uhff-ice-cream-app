<?php
/* @var $this InventoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inventarios',
);

$this->menu=array(
	array('label'=>'Nuevo inventario', 'url'=>array('create')),
	array('label'=>'Administrar inventarios', 'url'=>array('admin')),
);
?>

<h1>Inventario</h1>

<table>
	<tr>
		<th>Producto</th>
		<th>Descripcion</th>
		<th>Cantidad en existencia</th>
		<th>Cantidad mínima</th>
	</tr>
	<?php foreach ($inventoryList as $inventory) { ?>
		<tr>
			<td><?php echo $inventory->productPrice->product->name; ?></td>
			<td><?php echo $inventory->productPrice->description; ?></td>
			<td><?php echo $inventory->quantity; ?></td>
			<td><?php echo $inventory->quantity_min; ?></td>
		</tr>
	<?php } ?>
</table>
