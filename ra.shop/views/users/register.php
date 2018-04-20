<div class="container">

        <form method = "post" class="form-signin" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">Sign Up</h2>
        <label>
        <input type="checkbox" name="seller" value="Submit"> Seller
        </label>
        <label for="username" class="sr-only">Email address</label>
        <input type="email" name="username" class="form-control" placeholder="Email address" required autofocus><br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required><br>
        <label for="first_name" class="sr-only">First Name (or) Company Name</label>
        <input type="text" name="first_name" class="form-control" placeholder="First Name" required><br>
        <label for="last_name" class="sr-only">Last Name</label>
        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required><br>
        <label for="door_no" class="sr-only">Door No.</label>
        <input type="text" name="door_no" class="form-control" placeholder="Door No." required><br>
        <label for="area1" class="sr-only">Area line 1</label>
        <input type="text" name="area1" class="form-control" placeholder="Area Line 1" required><br>
        <label for="area2" class="sr-only">Area line 2</label>
        <input type="text" name="area2" class="form-control" placeholder="Area Line 2"><br>
        <label for="city" class="sr-only">City</label>
        <input type="text" name="city" class="form-control" placeholder="City" required><br>
        <label for="contact" class="sr-only">Contact</label>
        <input type="number" name="contact" class="form-control" placeholder="Contact" required><br>
      
        <button name = "signup" class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Sign Up</button>
        <a class="btn btn-lg btn-danger btn-block" href="<?php echo ROOT_URL;?>register">
        Reset</a>
      </form>

    </div> <!-- /container -->