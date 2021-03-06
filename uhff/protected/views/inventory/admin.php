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
			<button class="store-btn <?php if ($i==0){echo 'active';}?>" id="<?= $store->id ?>"><?= $store->name ?></button>
<?php 
		} 
	}
?>
<br/><br/>
<h2 class="store-name"><?= $main_store_name ?></h2>

<div class="init-btn">
	<?php if (sizeof($inventoryList) == 0){ ?><button onclick="initIventarios()">Inicializar inventarios</button><?php } ?>
	<button class="btn-show-add-fields">Agregar inventarios</button>
	<button class="btn-save" onclick="addIventarios()">Guardar</button>
	<button class="btn-cancel" onclick="hideAddFields()">Cancelar</button>
</div>

<?php  
	foreach ($stores as $store) {
		if ($store->name != 'Todas') { ?>
			<div class="prices-admin prices-admin-<?= $store->id ?>">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'inventory-grid-'.$store->id,
					'dataProvider'=>$model->searchAdmin($store->id),
					'filter'=>$model,
					'columns'=>array(
						'id',
						array( 'name'=>'product_search', 'value'=>'$data->productPrice->product->name'),
						array( 'name'=>'product_description_search', 'value'=>'isset($data->product)?"N/A":$data->productPrice->description'),
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
	var currentStore = '<?php echo $main_store; ?>';
	$(".prices-admin").hide();
	$(".btn-save").hide();
	$(".btn-cancel").hide();
	$(".prices-admin-"+currentStore).show();

	$(".store-btn").click(function() {
		currentStore = $(this).attr('id');
		$(".prices-admin").hide();
		$(".prices-admin-"+currentStore).show();
		$(".store-name").text($(this).text());
		$(".store-btn").removeClass('active');
		$(this).addClass('active');
		markUnderStack();
	});

	$(".btn-show-add-fields").click(function (){
		$(this).hide();
		$(".btn-save").show();
		$(".btn-cancel").show();
		showAddFields();
	});

	markUnderStack();

	function initIventarios()
	{
		window.location.replace("<?php echo Yii::app()->request->baseUrl; ?>/inventory/init");
	}

	function addIventarios()
	{
		arrayData = [];
		$("#inventory-grid-"+currentStore+">table.items>tbody>tr").each(function(){
			num = $(this).children("td:first").text();
			quantity = $(this).children("td:last").children("input").val();
			arrayData[num] = quantity;
		});
		$.ajax({
			url:"<?php echo Yii::app()->request->baseUrl; ?>/inventory/add", //the page containing php script
			type: "post", //request type,
			data: {arrayData: arrayData},
			success:function(result){
				window.location.replace("<?php echo Yii::app()->request->baseUrl; ?>/inventory/admin");
			}
		});
	}

	function showAddFields()
	{
		$("#inventory-grid-"+currentStore+">table.items>thead>tr:first").append('<th id="inventory-grid-7_c5"><a class="sort-link inventory-col" href="#">Cantidad a agregar</a></th>');
		$("#inventory-grid-"+currentStore+">table.items>tbody>tr").append("<td class='add-field inventory-col'><input type='number' step='any' value='0'></td>");
	}

	function hideAddFields()
	{
		$(".inventory-col").hide();
		$(".btn-save").hide();
		$(".btn-cancel").hide();
		$(".btn-show-add-fields").show();
	}

	function markUnderStack ()
	{
		$("#inventory-grid-"+currentStore+">table.items>tbody>tr").each(function(){
			quantity = parseInt($(this).children("td:eq(2)").text());
			quantityMin = parseInt($(this).children("td:eq(3)").text());
			if (quantity < quantityMin) {
				$(this).css('color', 'red');
			}
		});
	}
</script>
