
<body>
<div class="container">
<form method="post" enctype="multipart/form-data">
    <h2 class="form-signin-heading">Sign Up</h2>
        <label for="name" class="sr-only">Product Name</label>
        <input type="text" name="name" class="form-control" placeholder="Product Name" required autofocus><br>
        <label for="avail_quan" class="sr-only">Available Quantity</label>
        <input type="number" name="avail_quan" class="form-control" placeholder="Available Quantity" required><br>
        <label for="mrp" class="sr-only">MRP</label>
        <input type="number" name="mrp" class="form-control" placeholder="MRP" required><br>
        <label for="discount" class="sr-only">Discount</label>
        <input type="number" name="discount" class="form-control" placeholder="Discount" required><br>
        <label for="shipping_charges" class="sr-only">Shipping Charges</label>
        <input type="number" name="shipping_charges" class="form-control" placeholder="Shipping Charges" required><br>
        <textarea name="description" cols="40" rows="5" class="form-control" placeholder="Description"></textarea><br>
        <select name="category">
        	<option value="Electronics">Electronics</option>
	    	<option value="Books">Books</option>
	    	<option value="Office Products">Office Products</option>
	    	<option value="Foods">Foods</option>
	    	<option value="Appliances">Appliances</option>
	    	<option value="Men Clothing">Men Clothing</option>
	    	<option value="Women Clothing">Women Clothing</option>
	    	<option value="Kids Clothing">Kids Clothing</option>
        </select><br><br>
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input name = "submit" class="btn btn-xs btn-primary" type="submit" value="Add Product"/>
</form>
</div>
</body>