<?php
/* @var $this ProductPriceByStoreController */
/* @var $model ProductPriceByStore */

$this->breadcrumbs=array(
	'Precios'=>array('admin'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Nuevo precio', 'url'=>array('create')),
);
?>

<h1>Administrar precios</h1>
<?php
	$main_store = $stores[0]->id;
	$main_store_name = $stores[0]->name;
?>

<?php  
	foreach ($stores as $store) {
		if ($store->name != 'Todas') { ?>
			<button class="store-btn" id="<?= $store->id ?>"><?= $store->name ?></button>
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
					'id'=>'product-price-by-store-grid-'.$store->id,
					'dataProvider'=>$model->searchAdmin($store->id),
					'filter'=>$model,
					'columns'=>array(
						// 'id',
						// array( 'name'=>'stores_id', 'value'=>'$data->store->name' ),
						array( 'name'=>'product_search', 'value'=>'$data->product->name' ),
						'description',
						'price',
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

<div class="init-btn">
	<button onclick="initPrecios()">Inicializar precios</button>
</div>


<script type="text/javascript">
	var mainStore = '<?php echo $main_store; ?>';
	$(".prices-admin").hide();
	$(".prices-admin-"+mainStore).show();

	$(".store-btn").click(function() {
		$(".prices-admin").hide();
		$(".prices-admin-"+$(this).attr('id')).show();
		$(".store-name").text($(this).text());
	});

	function initPrecios() {
		window.location.replace("/uhff/uhff/productPriceByStore/init");
	}
</script>
