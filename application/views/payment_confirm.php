<br />
<div id="main">
        <div class="container">
			<div class="row">
			  <div class="col-lg-8">
			     <div class="d-md-none">
				<h4 style="color:green" class="text-center"><strong>Easy Check out Process</strong></h4></div>
				  <div class="card checkoutpanelred">
				    <div class="card-title">
					<h3>Payment Confirmation</h3>
				    </div>
                        <div class="card-body">
                        <form method="post" name="customerData" action="<?php echo base_url('ccavenue/ccavRequestHandler');?>">
                            <div class="form-horizontal">
                                <div class="form-row">
                                    <div class="col-md-12 topspace">
                                         <input type="hidden" name="merchant_id" value="185715"/>
                                        <label class="control-label"><strong>Full Name <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="billing_name" type="text" tabindex="1" class="form-control" value="<?php echo $orders->user_name;?>" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mt-2">
                                        <input type="hidden" name="order_id" value="<?php echo $orders->ord_id;?>"/>
                                        <label class="control-label"><strong>Address Line 1<span class="required" style="color: red;">*</span></strong></label>
                                        <input name="billing_address" type="text" id="add1" class="form-control" tabindex="3" value="<?php echo $orders->user_address1.' '.$orders->user_address2.','.$orders->user_nearby_landmark;;?>" />
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col-md-4 mt-2">
                                        <input type="hidden" name="billing_country" value="India"/>
                                        <label class="control-label"><strong>State <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="billing_state" type="text" class="form-control" value="<?php echo $orders->user_state;?>"/>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label"><strong>City <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="billing_city" type="text" class="form-control"  value="<?php echo $orders->user_city;?>"/>
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label"><strong>Pincode / Zipcode <span class="required" style="color: red;">*</span></strong>
                                        </label>
                                        <input name="billing_zip" type="text" maxlength="6" tabindex="6" class="form-control" value="<?php echo $orders->user_pincode;?>"/>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>Email Address</strong></label>
                                        <input name="billing_email" type="text" tabindex="9" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $orders->user_email;?>" />
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>Calling Mobile No. <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="billing_tel" type="text" pattern="[0-9]{10}" maxlength="10" id="cmob" tabindex="7" class="form-control" value="<?php echo $orders->user_mobile_no;?>"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mt-2">
                                        <label class="control-label"><strong>Delivery customer notes</strong></label>
                                        <textarea class="form-control" cols="10" rows="5"><?php echo $orders->ord_txt_message;?></textarea>
                                        <input type="hidden" name="redirect_url" value="https://www.lovegifts.in/orders/orderSummary/<?php echo $orders->ord_reference_id;?>"/>
                                        <input type="hidden" name="cancel_url" value="https://www.lovegifts.in/orders/cancel/<?php echo $orders->ord_reference_id;?>"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
				
            </div>
               <div class="col-lg-4">
                <div class="card checkoutpanelred" style="height:100%">
                    <div class="card-title">
                        <h3>Order Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 style="font-family:fontdinerdotcom luvable; color:#ec5459"><?php echo $orders->pro_title;?></h4>
                                <span>(<?php echo $orders->ord_product_size;?>)</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table" style="margin-bottom: 5px">
                                    <tr>
                                        <th>Total Price: </th>
                                        <td>
                                            <input type="hidden" name="amount" value="<?php echo $orders->ord_total_price;?>"/>
                                            <input type="hidden" name="currency" value="INR"/>
                                            <span style="margin-left: 30px;"><i class="fa fa-inr"></i></span></span>
                                            <?php echo $orders->ord_total_price;?>                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Qty :</th>
                                        <td style="width: 10px">
                                            <div class="input-group">
                                            <input type="text" value="1" disabled="disabled" class="form-control text-center qty" style="width:90px;" />
                                            <input type="hidden" name="qty" id="qty" value="<?php echo $orders->ord_qty;?>">
                                        </div>
                                        </td>
                                    </tr>
                                   <input type="hidden" name="offerAmount" id="offerAmount" value="">
                                    <tr>
                                        <th>
                                            <label class="control-label price">Total Amount:</label></th>
                                            <td style="text-align: right">
                                            <div class="price">
                                                <span><i class="fa fa-inr"></i> 
                                                    <input type="hidden" name="totalPrice" id="totalPrice" value="">
                                                    <span id="grandTotal" style="font-weight: bold"><?php echo $orders->ord_total_price;?></span>
                                                </span>
                                                <span id=""></span>
                                            </div>
                                        </td>
                                    </tr>
				</div>
			    </div>
                        </table>
                    </div>
                </div>
            <div style="border: 2px solid black;"></div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-8 col-lg-12 cta-button">
                        <button type="submit" class="btn btn-lg btn-block btn-danger" tabindex="10">Make Payment</button>
                    </div>
                </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
<!--checkout form start--><br>