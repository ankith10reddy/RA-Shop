<div>
<div class="album text-muted">
        <div class="container">
          <div class="row">
          <div class="col-3">
          <ul>
                <li><a href="<?php echo ROOT_URL; ?>products/sort?z=All">All Products</a></li>
			    <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Electronics">Electronics</a></li>
			    <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Office">Office Products</a></li>
			    <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Books">Books</a></li>
			    <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Appliances">Appliances</a></li>
                <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Foods">Foods</a></li>
                <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Men">Men Clothing</a></li>
                <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Women">Women Clothing</a></li>
                <li><a href="<?php echo ROOT_URL; ?>products/sort?z=Kids">Kids Clothing</a></li>

			  </ul>
			</div>

      <?php $n = 3;?>
			<div class="col-9">
        <?php if (isset($_SESSION['sort_cat'])): ?>
            <?php foreach($viewmodel as $item): ?>
            <?php if($item['category']==$_SESSION['sort_cat']): ?>
            	 <div class="col-lg-4">
	               <img src="images/<?php echo $item['name'];?>.jpg" width="250px" height ="220px" alt="Card image cap"> 
	              <a href="<?php echo ROOT_URL;?>products/add?p=<?php echo $item['prod_id'];?>">
	              <h5><?php echo $item['name'];?></h5>
	              <?php if ($item['discount']!=0):?>
					  <p id="iprice"><strong>Rs. <?php echo ($item['mrp']-$item['discount'])?></strong> <span id="idiscount"> <strike> <?php echo $item['mrp']?></strike> </span> </p>	
					<?php else:?>
						<p id="iprice"><strong>Rs. <?php echo $item['mrp']?></strong></p>
					<?php endif?>
	              </a>
	              </div>
            <?php endif; ?>
        	<?php endforeach; ?>
        <?php else :?>
            <?php foreach($viewmodel as $item): ?>
                 <div class="col-lg-4">
                 
                <td>
                   <img src="images/<?php echo $item['name'];?>.jpg" width="250px" height ="220px" alt="Card image cap"> 
                  <a href="<?php echo ROOT_URL;?>products/add?p=<?php echo $item['prod_id'];?>">
                  <h5><?php echo $item['name'];?></h5>
                  <?php if ($item['discount']!=0):?>
                      <p id="iprice"><strong>Rs. <?php echo ($item['mrp']-$item['discount'])?></strong> <span id="idiscount"> <strike> <?php echo $item['mrp']?></strike> </span> </p>  
                    <?php else:?>
                        <p id="iprice"><strong>Rs. <?php echo $item['mrp']?></strong></p>
                    <?php endif?>
                  </a>
                  
                  </div>
            <?php endforeach; ?>
        <?php endif;?>
        	<?php 			
			?>
        	</div>
          </div>
    </div>
</div>


</div>
