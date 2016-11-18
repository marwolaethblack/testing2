
<div id="admin_content" class="col-xs-9">
	<a href="<?php echo site_url('admin/add_product'); ?>">
		<button>+ Add Product</button>
	</a>

	<table id="products_table" class="admin-table table-bordered table-responsive table-striped table-hover">
		<thead>
			<tr>
				<th class="col-xs-1">ID</th>
				<th class="col-xs-3">NAME</th>
				<th class="col-xs-1">CATEGORY</th>
				<th class="col-xs-1">QUANTITY</th>
				<th class="col-xs-2">PRICE</th>
				<th class="col-xs-1">RATING</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($products as $product) {?>
			<tr>

				<td>
					<a href="<?php echo site_url('admin/product_details/') ?><?php echo $product->id; ?>">
						<?php echo $product->id; ?>
					</a>
				</td>

				<td>
					<?php echo $product->name; ?>
				</td>
				<td>
					<?php echo $product->category; ?>
				</td>
				<td>
					<?php echo $product->quantity; ?>
				</td>
				<td>
					<?php echo $product->price; ?>
				</td>
				<td>
					<?php echo $product->avg_rating;
				  } ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>




