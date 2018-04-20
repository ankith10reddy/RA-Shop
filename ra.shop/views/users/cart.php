<html>
<div >
<div class="container">
<div class="col-9">
  		<table class="col-9">
          <?php foreach($viewmodel as $item): ?>
          	<tr>
          	<td>
          <img class="myimg" src="<?php echo ROOT_URL.'images/'.$item['name'];?>.jpg" width="170" height="170">
   			</td>
   			<td>
   			<center>
   			<h4>
   			<?php echo $item['name'];?>
   			</h4>
   			</center><br>
		  <STRONG>Description - </STRONG><?php echo $item['description'];?><br>
		  <STRONG>Quanity - </STRONG> <?php echo $item['quantity'];?><br>
		  <?php if ($item['discount']!=0):?>
					  <p id="iprice"><strong>Rs. <?php echo $item['quantity'] * ($item['mrp'] - $item['discount'])?></strong> <span id="idiscount"> <strike> <?php echo $item['quantity']*($item['mrp'])?></strike> </span> </p>	
		   <?php else:?>
						<p id="iprice"><strong>Rs. <?php echo $item['quantity']*($item['mrp'])?></strong></p>
		   <?php endif?>
		   <?php if ($item['shipping_charges']!=0):?>
		   <STRONG>Shipping Charges - </STRONG> <?php echo $item['shipping_charges'];?><br>
		<?php endif; ?>
		  <a class="btn btn-danger" href="<?php echo ROOT_URL;?>users/remove?item=<?php echo $item['prod_id'];?>" type="button">Remove</a>
		  </td>
		  </tr>
		<?php endforeach; ?>
		</table>
		</div>

		<div class="col-3">
		<h2>Total Cost</h2>
		<?php $cost=0; 
		$savings=0;
		foreach($viewmodel as $item){
		$cost=$cost+$item['total_price'];
		$savings=$savings+($item['quantity']*$item['discount']);
		}
		?>

		<p id="price"><strong>Rs. <?php echo $cost?></strong></p>
		<p>Savings - Rs. <?php echo $savings?></p>
		<a class="btn btn-dark" href="<?php echo ROOT_URL?>users/payment" type="button">
		Pay Now </a>
		</div>

		  
	</div>
</div>
</html>