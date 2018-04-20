<body>
    <center>
      <form method ="post"class="form-signin" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h2 class="form-signin-heading">Please sign in </h2><br>
        <label for="username" class="sr-only">Email address</label>
        <input type="email" name="username" class="logIn" placeholder="Email address" required autofocus><br>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="logIn" placeholder="Password" required><br></br>
        <div class="checkbox">
          <label>
            <input name = "seller" type="checkbox" value="Submit"> I am a Seller
          </label>
        </div><br>
        <button name="signin" value="Submit" class="btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
      </center> <!-- /container -->
  </body>