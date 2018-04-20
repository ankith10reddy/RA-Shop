<html>
<div >
<?php
{

  $pos= strrpos($_SERVER['REQUEST_URI'],"?p=");
  $p = substr($_SERVER['REQUEST_URI'],$pos);
  $prod_id = trim($p,"?p=");
  foreach($viewmodel as $item)
  {
  	//only one seller remove break and add one dimension to selitem later
  	if ($item['prod_id']==$prod_id)
  	{
  		$selitem = $item;
  		break;
  	}
  }
}
?>
<div class="container">
          <div class="row">
          <div class="col-4">
          <div id="logo"><img src="<?php echo ROOT_URL.'images/'.$selitem['name'];?>.jpg" width="250px" height ="220px" alt="Card image cap"></div><br></br>
          <form action="<?php echo ROOT_URL?>products/added" method="get">
			<?php if(isset($_SESSION['is_logged_in'])) :?>
				Quantity <input type="number" name="quantity" value='1'><br></br>
			 	<button name="addprod" class="btn btn-dark"type="submit" value="Submit">Add to Cart</button>
			<?php $_SESSION['prod_data']=$selitem; ?>
			<?php endif; ?>
			</form>
			<form action="<?php echo ROOT_URL?>users/updprod" method="get">
				<?php if(isset($_SESSION['sel_is_logged_in'])) :?>
					<?php if(($_SESSION['sel_data']['sel_id'])==$selitem['sel_id']) :?>
					 	<button name="updprod" class="btn btn-dark"type="submit" value="Submit">Update to Cart</button>
						<?php $_SESSION['prod_data']=$selitem; ?>
					<?php endif; ?>
				<?php endif; ?>
			</form>

		  </div>
		  <div class="col-8">
		  <center>
		  <h1><?php echo $selitem['name'];?></h1>
		  </center>
		  <li>Description</li>
		  <p><?php echo $selitem['description'];?></p>


		  <?php if ($selitem['avail_quan']<=10) : ?>
		  	<h3 class="filling"> Hurry Up! Limited Stock </h3>
		  <p>Available quantity = 
		  <?php echo $selitem['avail_quan'];?>
		  </p>
		<?php endif?>


		  <?php if ($selitem['discount']!=0):?>
		  <h3>Special Discount just for you
		  </h3>
		  <p id="price"><strong>Rs. <?php echo ($selitem['mrp']-$selitem['discount'])?></strong> <span id="discount"> <strike> <?php echo $selitem['mrp']?></strike> </span> </p>	
		<?php else:?>
			<p id="price"><strong>Rs. <?php echo $selitem['mrp']?></strong></p>
		<?php endif?>
		  </div>
</div>
</div>
</div>




</html>