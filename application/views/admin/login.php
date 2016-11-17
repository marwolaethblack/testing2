
<div id="login_content">
	<div class="login_form col-sm-4 col-sm-offset-4">
		<h1>Admin Login</h1>
		<form action="/admin/login" method="post">
			<input class="col-xs-12" type="text" name="admin_name" placeholder="Username" />
			<input class="col-xs-12" type="password" name="password" placeholder="Password" />
			<input class="col-xs-12 login_btn" type="submit" name="submit" value="LOGIN" />
		</form>
		<?php echo "<p id = 'login_message'>".$this->session->login_message."</p>";?>
	</div>
</div>





   
