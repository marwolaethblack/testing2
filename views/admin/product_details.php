
<div id="admin_content" class="col-xs-9">
	<h1><?php echo $name; ?></h1>
	<h3><?php echo $category; ?></h3>
	<p><?php echo $description; ?></p>
	<table id="product-info-table" class="table-bordered table-responsive table-striped table-hover">
		<tr>
			<td>ID</td>
			<td>
				<?php echo $id; ?>
			</td>
		</tr>
		<tr>
			<td>Price</td>
			<td>
				<?php echo $price; ?>
			</td>
		</tr>
        <tr>
            <td>Sold</td>
            <td>
                <?php echo $amount_sold; ?>
            </td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td>
                <?php echo $quantity; ?>
            </td>
        </tr>
		<tr>
			<td>Rating</td>
			<td>
				<?php echo $avg_rating; ?>
			</td>
		</tr>
		<tr>
			<td>Image</td>
			<td>
				<?php echo $image; ?>
			</td>
		</tr>
	</table>
	<img src="<?php echo base_url('assets/images/uploads/products/'.$id."/".$image); ?>"/>
</div>




