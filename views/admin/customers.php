
<div id="admin_content" class="col-md-8">
	<table id="products_table">
		<tr>
			<th class="col-md-1">ID</th>
			<th class="col-md-3">NAME</th>
			<th class="col-md-2">PHONE</th>
			<th class="col-md-2">EMAIL</th>
		</tr>
		<?php foreach($customers as $customer) {?>

		<tr>
			<td>
				<a href="./customers/<?php echo $customer->id; ?>">
					<?php echo $customer->id; ?>
				</a>
			</td>

			<td>
				<?php echo $customer->first_name." ".$customer->last_name; ?>
			</td>
			<td>
				<?php echo $customer->phone_num; ?>
			</td>
			<td>
				<?php echo $customer->email_address;
			  }?>
			</td>
		</tr>

	</table>
</div>