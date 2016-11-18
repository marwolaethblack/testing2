
<div id="admin_content" class="col-xs-8 col-xs-offset-2">
	<?php echo $this->session->add_product_msg; $this->session->unset_userdata('add_product_msg'); ?>
    <?php echo form_open_multipart('admin/add_product',['id'=>'add_product_form','role'=>'form']);?>
    <div  class="col-xs-8" >
        <label for="name">Product Name</label>
        <input type="text" name="name"/>
    </div>
    <div class="col-xs-8">
        <label for="category">Category</label>
        <select name="category">
            <option value="sport">Sport</option>
            <option value="practical">Practical</option>
        </select>
    </div>
    <div class="col-xs-8">
        <label for="price">Price</label>
        <input type="text" name="price" />
    </div>
    <div class="col-xs-8">
        <label for="quantity">Amount</label>
        <input type="number" name="quantity" />
    </div>
    <div class="col-xs-8">
        <label for="image">Image</label>
        <input type="file" name="image" />
    </div>
    <div class="col-xs-8">
        <p>Description</p>
        <textarea name="description"></textarea>
    </div>
    <div class="col-xs-8" >
        <input type="submit" value="+ Add" />
    </div>
</form>
</div>