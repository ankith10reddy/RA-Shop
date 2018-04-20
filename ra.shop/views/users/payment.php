<html>

<div class="container">

<h3> Shipping Address </h3>
<p id="p1"><?php echo $viewmodel['0']['door_no'];?>,</p>
<p><?php echo $viewmodel['0']['area'];?>,</p>
<p><?php echo $viewmodel['0']['city'];?>,</p>
<p>Contact - <?php echo $viewmodel['0']['contact'];?></p>


<form class="form-signin" method="payed">
        <h2 class="form-signin-heading">Payment</h2>
        <select id="pay_mode">
        <option value="card">Credit or Debit Card</option>
	      <option value="cod">Cash On Delivery</option>
	    </select><br><p id="mynl"></p>
	 
        <label for="card" class="sr-only">Card</label>
        <input type="number" id="card" class="form-control"  placeholder="Card Number" required><p id="mynl"></p>

        <label for="exp_date" class="sr-only">Expiry Date </label>
        <input type="text" pattern="(?:0[1-9]|1[0-2])/(?:1[7-9]|[2-9][0-9])" id="exp_date" class="form-control"  placeholder="Date of Expiry in MM/YY" required><p id="mynl"></p>

        <label for="cvv" class="sr-only">CVV</label>
        <input type="text" pattern="([0-9]{3})" maxlength="3" id="cvv" class="form-control"  placeholder="CVV" required><p id="mynl"></p>

        <label for="name_on_card" class="sr-only">Name on Card</label>
        <input type="text" id="name_on_card" class="form-control"  placeholder="Name on Card" required><p id="mynl"></p>

        <button id="paydone" class="btn btn-lg btn-dark" type="button" value="Submit">Pay</button>

</form>

</div>

<script>
$("#pay_mode").change(function(){
var x = document.getElementById("pay_mode").selectedIndex;
var y = document.getElementsByTagName("option")[x].value;
//alert(y);
if (y=="card") 
{
	$("#card").show(1000);
	$("#exp_date").show(1000);
	$("#cvv").show(1000);
	$("#name_on_card").show(1000);
	$("mynl").html("<br>")
}
else
{
	$("#card").hide(1000);
	$("#exp_date").hide(1000);
	$("#cvv").hide(1000);
	$("#name_on_card").hide(1000);
}
}).trigger('change');

$("#paydone").click(function(){
	var x = document.getElementById("pay_mode").selectedIndex;
	var y = document.getElementsByTagName("option")[x].value;
	    window.location.href = "<?php echo ROOT_URL?>users/thanks?paymode=".concat("",y);});

</script>



</html>