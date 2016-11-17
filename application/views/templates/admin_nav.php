<div class="content">
    <nav id="admin_nav">
        <ul>
            <li class="<?php if($this->uri->uri_string() == 'admin') echo 'selected'; ?>">
                <a href="./">
                    <i class="icon icon-product"></i>
                    Products
                </a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'admin/orders') echo 'selected'; ?>">
                <a href="./orders">
                    <i class="icon icon-order"></i>
				Orders</a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'admin/admins') echo 'selected'; ?>">
                <a href="./admins" class="<?php if($this->uri->uri_string() == 'admin/admins') echo 'selected'; ?>">
                    <i class="icon icon-admin"></i>
				Admins</a>
            </li>
        </ul>
    </nav>
