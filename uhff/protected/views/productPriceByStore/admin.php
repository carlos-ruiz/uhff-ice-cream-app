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
	foreach ($stores as $i => $store) {
		if ($store->name != 'Todas') { ?>
			<button class="store-btn <?php if ($i==0){echo 'active';}?>" id="<?= $store->id ?>"><?= $store->name ?></button>
<?php 
		} 
	}
?>
<br/><br/>
<h2 class="store-name"><?= $main_store_name ?></h2>

<div class="init-btn">
	<?php if (sizeof($productPricesByStore) == 0){ ?><button onclick="initPrecios()">Inicializar precios</button><?php } ?>
</div>

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

<script type="text/javascript">
	var mainStore = '<?php echo $main_store; ?>';
	$(".prices-admin").hide();
	$(".prices-admin-"+mainStore).show();

	$(".store-btn").click(function() {
		$(".prices-admin").hide();
		$(".prices-admin-"+$(this).attr('id')).show();
		$(".store-name").text($(this).text());
		$(".store-btn").removeClass('active');
		$(this).addClass('active');
	});

	function initPrecios() {
		window.location.replace("<?php echo Yii::app()->request->baseUrl; ?>/productPriceByStore/init");
	}
</script>
