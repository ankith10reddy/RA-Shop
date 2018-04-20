<html>
<head>
<title> Products </title>
<link href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
<link href="starter-template.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
      <a class="navbar-brand" href="#">RA SHOP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>products">Products</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <?php if(isset($_SESSION['is_logged_in'])) :?>
            <li class="nav-item">
            <a class="nav-link active" href="">Welcome <?php echo $_SESSION['user_data']['first name'];?></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/orders">My Orders</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/cart">Cart</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a>
            </li>
            <?php elseif(isset($_SESSION['sel_is_logged_in'])) :?>
            <li class="nav-item">
            <a class="nav-link active" href="">Welcome <?php echo $_SESSION['sel_data']['comp name'];?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/addprod">Add a Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/logout">Logout</a>
            </li>

           <?php else : ?> 
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ROOT_URL; ?>users/register">Register</a>
          </li>
        <?php endif; ?>
        </ul>

      </div>
    </nav>
    <center>
    <?php Messages::display(); ?>
    </center>
      <div class="container">
        <p class="lead"><?php require($view); ?></p>
      </div><!-- /.container -->



</body>
</html>
