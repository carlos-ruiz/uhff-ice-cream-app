<?php
/* @var $this SalesController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="home-sales">
	<div class="header-sales">
		<h1>UHFF - El sabor de mi antojo</h1>
		<h3>Sucursal: <?php echo $store; ?></h3>
	</div>
	<div class="logout">
		<?php echo $username; ?> - <a href="/uhff/uhff/sales/cashcut" onclick="return confirm('Deseas hacer un corte de caja ahora?');">Corte de caja</a> - <a href="/uhff/uhff/site/logout" onclick="return confirm('Deseas salir sin hacer corte de caja?');">Cerrar sesion</a>
	</div>
	<hr>
	<div class="left-side">
		<div class="product-grid">
			<?php foreach ($products as $product) { ?>
				<div class="product-item" data-id=<?php echo $product->id; ?>>
					<div class="product-image">
						<img src="/uhff/uhff/images/<?php echo $product->image; ?>">
					</div>
					<div class="product-name"><b><?php echo $product->name; ?></b></div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="right-side">
		<div class="ticket-header">
			<h3>Ticket de venta</h3>
		</div>
		<div class="ticket-content">
			<table>
				<tr>
					<th>Cantidad</th>
					<th>Producto</th>
					<th>Precio</th>
					<th>Importe</th>
				</tr>
				<?php $total = 0; ?>
				<?php foreach ($tickets as $ticket) { ?>
				<?php $amount = $ticket->quantity*$ticket->product->price;  ?>
				<?php $total += $amount; ?>
				<tr>
					<td><?php echo $ticket->quantity; ?></td>
					<td><?php echo $ticket->product->product->name." - ".$ticket->product->description; ?></td>
					<td><?php echo "$".number_format($ticket->product->price, 2, '.', ','); ?></td>
					<td><?php echo "$".number_format($ticket->quantity*$ticket->product->price, 2, '.', ','); ?></td>
					<td><input class="remove-button" type="button" name="remove" data-id="<?= $ticket->product->id ?>" value="X"/></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="3">TOTAL</td>
					<td><?php echo "$".number_format($total, 2, '.', ','); ?></td>
				</tr>
				<tr>
					<td colspan="4" class="align-center"><a href='/uhff/uhff/sales/sale' class="btn">Vender</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<div id="ex1" class="modal">
  <p>Thanks for clicking. That felt good.</p>
  <a href="#" rel="modal:close">Close</a>
</div>

<p><a id="show_modal" href="saleDetail/2" rel="modal:open">Open Modal</a></p>

<script type="text/javascript">
	$(document).ready(function(){
		$(".product-item").click(function(){
			// Open modal in AJAX callback
			event.preventDefault();
			$("#show_modal").attr("href", "saleDetail/"+$(this).data('id'));
			$("#show_modal").trigger( "click" );
		});

		$(".remove-button").click(function(){
			event.preventDefault();
			product_id = $(this).data('id');
			$.ajax({
				url:"/uhff/uhff/tickets/remove", //the page containing php script
				type: "post", //request type,
				data: {product_id: product_id},
				success:function(result){
					window.location.replace("/uhff/uhff/sales/index");
				}
			});
		});
	});
</script>
