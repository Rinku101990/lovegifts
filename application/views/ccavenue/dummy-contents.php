<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 

	error_reporting(0);
	
	
	
	 echo $merchant_id='185715'."<br>";  // Merchant id(also User_Id) 
	 echo $amount=$orders->ord_total_price."<br>";            // your script should substitute the amount here                        in the quotes provided here
	 echo $order_id=$orders->ord_id."<br>";
	 echo $order_ref_id=$orders->ord_reference_id."<br>";        //your script should substitute the order   description here in the quotes provided here
	 echo $url="https://www.lovegifts.in/orders/orderSummary/".$order->ord_id."<br>"; //your redirect URL where your customer will be redirected after authorisation from CCAvenue
	 echo $billing_cust_name=$orders->user_name."<br>";
	 echo $billing_cust_address=$orders->user_address1.' '.$orders->user_address2."<br>";
	 echo $billing_cust_state=$orders->user_state."<br>";
	 echo $billing_city=$orders->user_city."<br>";
	 echo $billing_zip=$orders->user_pincode."<br>";
	 echo $billing_cust_tel=$orders->user_mobile_no."<br>";
	 echo $billing_cust_email=$orders->user_email."<br>";
	 echo $delivery_cust_notes=$orders->ord_txt_message."<br>";
		
	
	
	$merchant_data='';
	$working_key='25231D3201094EC2F8EC5A4B8BBF20F1';//Shared by CCAVENUES
	$access_code='AVGZ79FH54AA38ZGAA';//Shared by CCAVENUES
	
	
	
	$checksum=getchecksum($amount,$order_id,$url,$working_key); // Method to generate checksum
	
  $merchant_data='Merchant_Id='.$merchant_id.'&Amount='.$amount.'&Order_Id='.$order_id.'&Redirect_Url='.$url.'&billing_cust_name='.$billing_cust_name.'&billing_cust_address='.$billing_cust_address.'&billing_cust_state='.$billing_cust_state.'&billing_cust_city='.$billing_city.'&billing_zip_code='.$billing_zip.'&billing_cust_tel='.$billing_cust_tel.'&billing_cust_email='.$billing_cust_email.'&delivery_cust_notes='.$delivery_cust_notes.'&Checksum='.$checksum;
	
	
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
	
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>