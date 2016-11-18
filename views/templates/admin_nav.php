<div class="content">
    <nav id="admin_nav">
        <ul>
			<?php $uri = $this->uri->uri_string(); ?>
            <li class="<?php if($uri == 'admin' || $uri == 'admin/add_product' || preg_match("/admin\/product_details/",$uri)) echo 'selected'; ?>">
                <a href="<?php echo site_url('admin') ?>">
                    <i class="icon icon-product"></i>
                    Products
                </a>
            </li>
            <li class="<?php if($uri == 'admin/orders') echo 'selected'; ?>">
                <a href="<?php echo site_url('admin/orders') ?>">
                    <i class="icon icon-order"></i>
                    Orders
                </a>
            </li>
            <li class="<?php if($uri == 'admin/customers') echo 'selected'; ?>">
                <a href="<?php echo site_url('admin/customers') ?>">
                    <i class="icon icon-customer"></i>
                    Customers
                </a>
            </li>
            <li class="<?php if($uri == 'admin/admins') echo 'selected'; ?>">
                <a href="<?php echo site_url('admin/admins') ?>" class="<?php if($this->uri->uri_string() == 'admin/admins') echo 'selected'; ?>">
                    <i class="icon icon-admin"></i>
				Admins</a>
            </li>
        </ul>
    </nav>
