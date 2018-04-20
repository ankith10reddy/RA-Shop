<body>
<div class="container">
<form method="post" enctype="multipart/form-data">
    <h2 class="form-signin-heading"><?php echo $_SESSION['prod_data']['name']?></h2>
        
        <label for="avail_quan">Available Quantity</label><br>
        <input type="number" name="avail_quan" class="form-control" value="<?php echo $_SESSION['prod_data']['avail_quan']; ?>" required><br>
        <label for="mrp" >MRP</label>
        <input type="number" name="mrp" class="form-control" value="<?php echo $_SESSION['prod_data']['mrp']; ?>" required><br>
        <label for="discount" >Discount</label>
        <input type="number" name="discount" class="form-control" value="<?php echo $_SESSION['prod_data']['discount']; ?>" required><br>
        <label for="shipping_charges" >Shipping Charges</label>
        <input type="number" name="shipping_charges" class="form-control" value="<?php echo $_SESSION['prod_data']['shipping_charges']; ?>" required><br>
        <label for="description">Description</label><br>
        <textarea name="description" cols="40" rows="5" class="form-control"><?php echo $_SESSION['prod_data']['description']; ?></textarea><br>
        <select name="category">
        <option value="Electronics">Electronics</option>
        <?php if($_SESSION['prod_data']['category']=="Books"): ?>
            <option selected value="Books">Books</option>        	
        <?php else: ?>
            <option value="Books">Books</option>
        <?php endif;?>

	    <?php if($_SESSION['prod_data']['category']=="Office Products"): ?>
            <option selected value="Office Products">Office Products</option>
        <?php else: ?>
            <option value="Office Products">Office Products</option>
        <?php endif;?>

        <?php if($_SESSION['prod_data']['category']=="Foods"): ?>
            <option selected value="Foods">Foods</option>
        <?php else: ?>
            <option value="Foods">Foods</option>
        <?php endif;?>

        <?php if($_SESSION['prod_data']['category']=="Appliances"): ?>
            <option selected value="Appliances">Appliances</option>
        <?php else: ?>
            <option value="Appliances">Appliances</option>
        <?php endif;?>

        <?php if($_SESSION['prod_data']['category']=="Men Clothing"): ?>
            <option selected value="Men Clothing">Men Clothing</option>
        <?php else: ?>
            <option value="Men Clothing">Men Clothing</option>
        <?php endif;?>

        <?php if($_SESSION['prod_data']['category']=="Women Clothing"): ?>
            <option selected value="Women Clothing">Women Clothing</option>
        <?php else: ?>
            <option value="Women Clothing">Women Clothing</option>
        <?php endif;?>

        <?php if($_SESSION['prod_data']['category']=="Kids Clothing"): ?>
            <option selected value="Kids Clothing">Kids Clothing</option>
        <?php else: ?>
            <option value="Kids Clothing">Kids Clothing</option>
        <?php endif;?>
	    	
        </select><br><br>
        
        <input name = "submit" class="btn btn-xs btn-primary" type="submit" value="Update"/>
</form>
</div>
</body>