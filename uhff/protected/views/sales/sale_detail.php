<?php
/* @var $this SalesController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="sale-detail">
	<div class="ok-button">OK</div>
	<div class="sale-options">
		<?php foreach ($product->productPrices as $price) { 
			if($price->stores_id == $store_id) { ?>
			<div class="sale-option">
				<div class="product-to-buy" data-product="<?php echo $price->id; ?>">0</div>
				<div class="product-price">
					<?php echo $price->price."<br/>".$price->description; ?>
				</div>
				<div class="quantity-selector">
					<div class="selector-up">+</div>
					<div class="current-selected">1</div>
					<div class="selector-down">-</div>
				</div>
			</div>
		<?php }} ?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".selector-up").click(function(){
			current_selected = $(this).closest(".quantity-selector").children(".current-selected");
			value = parseInt(current_selected.text());
			value++;
			current_selected.text(value);
		});

		$(".selector-down").click(function(){
			current_selected = $(this).closest(".quantity-selector").children(".current-selected");
			value = parseInt(current_selected.text());
			value--;
			if (value < 0) { value = 0;}
			current_selected.text(value);
		});

		$(".product-price").click(function(){
			sale_option = $(this).closest(".sale-option");
			product_to_buy = sale_option.children(".product-to-buy");
			current_selected = sale_option.children(".quantity-selector").children(".current-selected");

			value = parseInt(product_to_buy.text());
			increment = parseInt(current_selected.text());
			value += increment;
			product_to_buy.text(value);
		});

		$(".ok-button").click(function(){
			$('.product-to-buy').each(function (){
				quantity = parseInt($(this).text());
				product_id = $(this).data('product');
				console.log(product_id);
				if(quantity > 0) {
					$.ajax({
						url:"<?php echo Yii::app()->request->baseUrl; ?>/tickets/generate", //the page containing php script
						type: "post", //request type,
						data: {product_id: product_id, quantity: quantity},
						success:function(result){
							window.location.replace("<?php echo Yii::app()->request->baseUrl; ?>/sales/index");
						}
					});
				}
			});
		});
	});
</script>
