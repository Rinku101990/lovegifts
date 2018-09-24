<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='25231D3201094EC2F8EC5A4B8BBF20F1';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
		echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		
	}
	else if($order_status==="Aborted")
	{
		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	
		$information=explode('=',$decryptValues);
	    	echo '<tr><td>'.$information->tracking_id .'</td><td>'.$information.'</td></tr>';
	

	echo "</table><br>";
	echo "</center>";
?>
<script>
setTimeout(function () {
   window.location.href= 'https://www.lovegifts.in/'; // the redirect goes here

},5000);
</script>
</script>
    <!--Menu HTML Code--></div> 
  </div>
<br>
<center>
 <div class="container">
   <img src="<?php echo base_url('assets/images/failed-icon.jpg');?>"><br>
    <h2>Payment Transaction failed.</h2>
    <p>You will be automatically redirected in <span id="count">6</span> seconds...</p>
    <script type="text/javascript">
	window.onload = function(){
	
	(function(){
	  var counter = 6;
	  setInterval(function() {
	    counter--;
	    if (counter >= 0) {
	      span = document.getElementById("count");
	      span.innerHTML = counter;
	    }
	    // Display 'counter' wherever you want to display it.
	    if (counter === 0) {
	    //    alert('this is where it happens');
	        clearInterval(counter);
	    }
	  }, 600);
	
	})();
	}
</script>	
</div>
<div class="col-lg-6 title">
  <h3>YOUR ORDER HAS BEEN CANCELLED</h3>
</div>
</center>
<br>
<br>
