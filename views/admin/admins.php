
<div id="admin_content" class="col-md-8">
	
	<?php foreach($admins as $admin) {?>
		<ul>
			<li>
<a href="./admins/<?php echo $admin->id; ?>"><?php echo $admin->name;
				if($admin->super_admin == 1) echo "<i class='icon icon-super-admin'></i>";}
?></a></li>
		</ul>
</li>



</div>