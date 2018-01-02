<?php
/* @var $this InventoryController */
/* @var $model Inventory */

$this->breadcrumbs=array(
	'Inventarios'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Nuevo inventario', 'url'=>array('create')),
);

?>

<h1>Administrar inventario</h1>

<?php
	$main_store = $stores[0]->id;
	$main_store_name = $stores[0]->name;
?>

<?php  
	foreach ($stores as $i => $store) {
		if ($store->name != 'Todas') { ?>
			<button class="store-btn <?php if ($i==0){echo 'selected';}?>" id="<?= $store->id ?>"><?= $store->name ?></button>
<?php 
		} 
	}
?>
<br/><br/>
<h2 class="store-name"><?= $main_store_name ?></h2>

<?php  
	foreach ($stores as $store) {
		if ($store->name != 'Todas') { ?>
			<div class="prices-admin prices-admin-<?= $store->id ?>">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'inventory-grid-'.$store->id,
					'dataProvider'=>$model->searchAdmin($store->id),
					'filter'=>$model,
					'columns'=>array(
						array( 'name'=>'product_search', 'value'=>'$data->productPrice->product->name'),
						array( 'name'=>'product_description_search', 'value'=>'$data->productPrice->description'),
						'quantity',
						'quantity_min',
						array(
							'class'=>'CButtonColumn',
						),
					),
				)); ?>
			</div>
<?php 
		} 
	}
?>

<script type="text/javascript">
	var mainStore = '<?php echo $main_store; ?>';
	$(".prices-admin").hide();
	$(".prices-admin-"+mainStore).show();

	$(".store-btn").click(function() {
		$(".prices-admin").hide();
		$(".prices-admin-"+$(this).attr('id')).show();
		$(".store-name").text($(this).text());
	});
</script>
