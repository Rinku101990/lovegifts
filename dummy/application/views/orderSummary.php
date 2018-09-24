<?php
	if($this->session->flashdata('msg_error')){
		echo "<div class='alert alert-danger' role='alert'>".$this->session->flashdata('msg_error')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}
	elseif($this->session->flashdata('msg_success')){
		echo "<div class='alert alert-success' role='alert'>".$this->session->flashdata('msg_success')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}
?>
<br>
    <h1 class="text-center textdecorationheader">Order Details</h1>
        <div class="container">
        <?php foreach($orders as $orderDetail){?>
          <div class="row" >
				<div class="col-lg-5 paddingdiv" id="promisepanelred">
				<table class="table">
					<tr>
						<th>Product</th>
						<th style="text-align:right">Total</th>
					</tr>
					<tr>
						<td><?php echo $orderDetail->pro_title;?><br />
						<li>Size-<?php echo $orderDetail->ord_product_size;?></li>
						</td>
						<td style="text-align:right"><span><i class="fa fa-inr"></i></span><?php echo $orderDetail->ord_price;?></td>
					</tr>
					<tr>
						<th>Total Order Qty:</th>
						<td style="text-align:right"><?php echo $orderDetail->ord_qty;?></td>
					</tr>
					
					<?php if(($orderDetail->ord_shipping)=="0"){?>
					<tr>
						<th>Shipping Charges:</th>
						<td style="text-align:right"><span><i class="fa fa-inr"></i></span>0</td>
					</tr>
					<?php }else{?>
					<tr>
						<th>Shipping Charges:</th>
						<td style="text-align:right"><span><i class="fa fa-inr"></i></span><?php echo $orderDetail->ord_shipping;?></td>
					</tr>
					<?php } ?>
					
					
					<?php if(($orderDetail->ord_mode_of_payments)=="0"){?>
					<?php }else{?>
					<tr>
						<th>Discount Amt:</th>
						<td style="text-align:right"><span><i class="fa fa-inr"></i></span><?php echo $orderDetail->pro_offers;?></td>
					</tr>
					<?php } ?>
					
					<tr>
						<th>Total Payable Amount:</th>
						<td style="text-align:right"><span><i class="fa fa-inr"></i></span><?php echo $orderDetail->ord_total_price;?></td>
					</tr>
					<tr>
						<th>Payment Method:</th>
						<td style="text-align:right">
						<?php if(($orderDetail->ord_mode_of_payments)=="0"){?>
						Cash On Delivery
						<?php }else{?>
							Online Payments
						<?php } ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-lg-5 paddingdiv" id="promisepanelred">
			  	<div class="mt-2">
			  		<h2 class="text-center" style="color:#ec5459">Thank you.</h2>
			  		<h5 class="text-center" style="color:#ec5459">Your order has been received.</h5>
			  	</div>
			  	<table class="table">
					<tr>
						<th>Order Number:</th>
						<td style="text-align:right"><?php echo $orderDetail->ord_reference_id;?></td>
					</tr>
					<tr>
						<th>Order Date:</th>
						<td style="text-align:right">
							<?php $DateChange = $orderDetail->ord_created;
								$newDate = date('d-m-Y', strtotime($DateChange));
								echo $newDate;
							?>
						</td>
					</tr>
			<?php } ?>
			  </table>
		            <div class="cta-button col-md-8 container">
                        <a  class="btn btn- btn-block btn-danger" href="https://api.whatsapp.com/send?phone=919988655011&text=Hi%20Love%20Gifts.My%20Name%20is%20customer%20Name.My%20order%20number%20is%204540." id="porder" tabindex="10"><span><i class="fa fa-whatsapp"></i></span>&nbsp Click here to Open Whatsapp</a>
						<a  class="btn btn- btn-block btn-danger" href="mailto:hello@lovegifts.in?Subject=Hi%20Love%20Gifts.My%20Name%20is%20customer%20Name.My%20order%20number%20is%204540." id="porder" tabindex="10"><span><i class="fa fa-envelope"></i></span>&nbsp Click here to Open Mail</a>
				    </div>
                <p style="color:blue" class="text-center"><strong>Your gift will be made after we receive photos.</strong></p>
            </div>
          </div>
        </div>
        <br>
	
