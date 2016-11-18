
<div id="admin_content" class="col-md-8">
        <table id="products_table">
        <tr>
            <th class="col-md-1">ID</th>
            <th class="col-md-2">DATE</th>
            <th class="col-md-2">COUNTRY</th>
            <th class="col-md-2">CITY</th>
            <th class="col-md-1">CUSTOMER</th>
        </tr>
		<?php foreach($orders as $order) {?>
        <tr>
            <td><?php echo $order->id; ?></td>
            <td><?php echo $order->order_date ?></td>
            <td><?php echo $order->ship_country; ?></td>
			<td><?php echo $order->ship_city; ?></td>
			<td><a href="./customers/<?php echo $order->customer_id;?>">
				<?php echo $order->customer_id;
			  }?></a>
			</td>
			 
        </tr>
    </table>
</div>
	
</div>