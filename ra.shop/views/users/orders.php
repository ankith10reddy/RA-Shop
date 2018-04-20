<html>
<div class="container">
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
			<STRONG>Seller - </STRONG> <?php echo $item['comp_name'];?><br>
			<STRONG>Time of order - </STRONG> <?php echo $item['order_time'];?><br>	
		  </td>
		  </tr>
		<?php endforeach; ?>
</table>
</div>
</html>