<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "rjQUPktU";

// Merchant Salt as provided by Payu
$SALT = "e5iIg1jwi8";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();

//Generate random transaction id
$txnid = random_string('numeric', 5);

$ord_id = $this->uri->segment(3);
//print_r($ord_id);die;

if(!empty($_POST)) {
		
		$posted['amount'] = $_POST['amount'];
		$posted['phone'] = $_POST['phone'];
		$posted['firstname'] = $_POST['firstname'];
		$posted['email'] = $_POST['email'];
		$posted['key'] = $MERCHANT_KEY;
		$posted['txnid'] = $txnid;
		$posted['productinfo'] = 'This is a Test Product';
		$posted['email'] = $_POST['email'];
		$posted['firstname'] = $_POST['firstname'];
		$posted['phone'] = $_POST['phone'];
		$posted['surl'] = base_url("orders/success/".$ord_id);
		$posted['furl'] = base_url("orders/error/".$ord_id);
		$posted['curl'] = base_url("orders/cancel".$ord_id);
		$posted['service_provider'] = 'payu_paisa';

}

$hash = '';

// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

if(empty($posted['hash']) && sizeof($posted) > 0) {
	if(
			  empty($posted['key'])
			  || empty($posted['txnid'])
			  || empty($posted['amount'])
			  || empty($posted['firstname'])
			  || empty($posted['email'])
			  || empty($posted['phone'])
			  || empty($posted['productinfo'])
			  || empty($posted['surl'])
			  || empty($posted['furl'])
			  || empty($posted['service_provider'])
	  ) {
		//echo "Fail";
		redirect('payumoney/');
	  }
	else{
		
		$hashVarsSeq = explode('|', $hashSequence);
		$hash_string = '';
		foreach($hashVarsSeq as $hash_var){
			  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			  $hash_string .= '|';
		}

		$hash_string .= $SALT;
		$hash = strtolower(hash('sha512', $hash_string));
		$posted['hash'] = $hash;
		$action = $PAYU_BASE_URL . '/_payment';
	}
}
elseif(!empty($posted['hash'])){
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Payumoney Integration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
     if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
 </script>
</head>
<body onload="submitPayuForm()">
<h1 class="text-center">Payment Form</h1>
<div class="container" style="width: 50%;">
	<div class="row">
		<div class="col-sm-12 text-center">

			<?php
				if($this->session->flashdata('msg_error')){
					echo "<div class='alert alert-danger' role='alert'>".$this->session->flashdata('msg_error')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				}
				elseif($this->session->flashdata('msg_success')){
					echo "<div class='alert alert-success' role='alert'>".$this->session->flashdata('msg_success')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
				}
			?>
			<?php foreach($orders as $orderDetail){  ?>
			<form method="post" class="form-horizontal" action="<?php echo $action; ?>" name="payuForm">

				<input type="hidden" name="key" value="<?php echo (!isset($posted['key'])) ? '' : $posted['key'] ?>" />
				<input type="hidden" id="hash" name="hash" value="<?php echo (!isset($posted['hash'])) ? '' : $posted['hash'] ?>"/>
				<input type="hidden" name="txnid" value="<?php echo (!isset($posted['txnid'])) ? '' : $posted['txnid'] ?>" />

				<input type="hidden" name="productinfo" id="productinfo" value="<?php echo (!isset($posted['productinfo'])) ? '' : $posted['productinfo'] ?>">
				<input type="hidden" name="surl" value="<?php echo (!isset($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" />
				<input type="hidden" name="curl" value="<?php echo (!isset($posted['curl'])) ? '' : $posted['curl'] ?>" size="64" />
				<input type="hidden" id="furl" name="furl" value="<?php echo (!isset($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" />
				<input type="hidden" name="service_provider" value="<?php echo (!isset($posted['service_provider'])) ? '' : $posted['service_provider'] ?>" size="64" />

				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Your Name" required value="<?php echo $orderDetail->user_name; ?>">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" value="<?php echo $orderDetail->user_email; ?>" required>
				    </div>
			  	</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Mobile</label>
				    <div class="col-sm-10">
				      <input type="text" name="phone" class="form-control" id="inputPassword3" placeholder="Your Mobile Number" value="<?php echo $orderDetail->user_mobile_no; ?>" required>
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Amount</label>
				    <div class="col-sm-10">
				      <input type="number" name="amount" class="form-control" id="inputPassword3" placeholder="Amount to Pay" value="<?php echo $orderDetail->ord_total_price; ?>" required>
				    </div>
				</div>
			  	<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">Click To Pay</button>
				    </div>
			  	</div>
			</form>
		<?php } ?>
		</div>
	</div>
</div>
</body>
</html>