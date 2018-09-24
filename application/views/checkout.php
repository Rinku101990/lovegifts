<!--checkout form start-->
<?php foreach($productView as $tempCheckout){?>
<?php } ?>

<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '306573526599878');
  fbq('trackCustom', 'Intiatecheckout', {product: '<?php echo $tempCheckout->pro_title;?>',cat_id:<?php echo $tempCheckout->cate_id;?>})
</script>
    <div id="main">
        <div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="d-md-none">
					<h4 style="color:green" class="text-center"><strong>Easy Check out Process</strong></h4></div>
						<div class="card checkoutpanelred">
							<div class="card-title">
								<h3>Shipping Details</h3>
						   </div>
                        <div class="card-body">
                        <form id="formCustomer" method="post">
                            <div class="form-horizontal">
                                <div class="form-row">
                                    <div class="col-md-12 topspace">
                                        <label class="control-label"><strong>Full Name <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="fname" type="text" id="fname" tabindex="1" class="form-control" placeholder="Full Name" required="required" />
                                        <input type="hidden" name="tmp_hidden_custo_id" id="tmp_hidden_custo_id" >
                                        <span id="error_fname" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>Address Line 1<span class="required" style="color: red;">*</span></strong></label>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input name="add1" type="text" id="add1" class="form-control" tabindex="3" placeholder="House No, Society/Appartment" required />
                                        <span id="error_add1" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mt-2">
                                        <label class="control-label"> <strong>Line 2 <span class="required" style="color: red;">*</span> </strong></label>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input name="add2" type="text" id="add2" tabindex="4" class="form-control" placeholder="Area/Road" required />
                                        <span id="error_add2" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>Nearby Landmark <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="landmark" type="text" id="landmark" tabindex="5" class="form-control" placeholder="Nearby/Opp./Behind "  required/>
                                        <span id="error_landmark" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>Pincode / Zipcode <span class="required" style="color: red;">*</span></strong>
                                        </label>
                                        <input name="pincode" id="pincode" type="text" maxlength="6" tabindex="6" class="form-control" required/>
                                        <span id="PinMsg"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>City <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="city" type="text" id="city" class="form-control"  readonly />
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>State <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="state" type="text" id="state"  class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>Calling Mobile No. <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="cmob" type="text" pattern="[0-9]{10}" maxlength="10" id="cmob" tabindex="7" class="form-control" placeholder="Calling Mobile Number" required/>
                                        <span id="error_cmob" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label class="control-label"><strong>WhatsApp Mobile No. <span class="required" style="color: red;">*</span></strong></label>
                                        <input name="wmob" type="text" pattern="[0-9]{10}" maxlength="10" id="wmob" tabindex="8" class="form-control" placeholder="WhatsApp Mobile Number" required/>
                                        <span id="error_wmob" class="text-danger"></span>
                                     </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mt-2">
                                        <label class="control-label"><strong>Email Address (optional)</strong></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input name="email" type="email" id="email" tabindex="9" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="abc@example.com" />
                                        <span id="error_email" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
				<div id="accordion">
				    <div class="card mt-2 checkoutpanelred">
				        <div class="card-header" id="headingOne">
				            <h5 class="mb-0">
				            <h3 class="btn" style="color:#ec5459" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><strong><i class="fa fa-angle-down" aria-hidden="true"></i>
				                Click to Add Free Message</strong>
				            </h3>
				            </h5>
			            </div>
            			<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            				<div class="card-body">
        						<div class="form-row">
                                    <div class="col-md-12">
                                        <label class="control-label"><strong>Message</strong></label>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <textarea name="messagetxt" type="text" id="messagetxt" rows="3" class="form-control" tabindex="10" placeholder="Write Message for gift"> </textarea>
                                    </div>
                                </div>
            				</div>
            			</div>
			        </div>
                </div>
            </div>
               <div class="col-lg-4">
                <?php if(!empty($productView)){ ?>
                <div class="card checkoutpanelred">
                    <div class="card-title">
                        <h3>Order Summary</h3>
                    </div>
                    <?php foreach($productView as $tempCheckout){?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 style="font-family:fontdinerdotcom luvable; color:#ec5459"><?php echo $tempCheckout->pro_title;?></h4>
                                <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $tempCheckout->cate_id;?>">
                                <input type="hidden" name="product" id="product" value="<?php echo $tempCheckout->pro_id;?>"/>
                                <input type="hidden" name="temp_pro_id" id="temp_pro_id" value="<?php echo $tempCheckout->temp_ckout_id;?>">
                            </div>
                        </div>
                        <div class="row">
                            <?php $i = 0; foreach($picture as $pricturelist){ ?>
                                    <?php if(($pricturelist->pro_id)==($tempCheckout->pro_id)){ ?>
                            <div class="col-lg-12">
                                <?php if($i < 1) {?>
                                    <img id=""  class="img-responsive" src="<?php echo base_url();?><?php echo $pricturelist->pic_param;?>" style="border-color:Black;border-width:1px;border-style:Solid;height:180px;width:300px;" />
                                <?php }$i++; ?>
                            </div>
                            <?php } ?>
                        <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table" style="margin-bottom: 5px">
                                    <tr>
                                        <th>Price : </th>
                                        <td>
                                            <span style="margin-left: 30px;"><i class="fa fa-inr"></i></span>
                                            <span proid="<?php echo $tempCheckout->pro_id;?>" class="amount">
                                                <?php 
                                                        $DeductedAmount = $tempCheckout->size_related_price;
                                                         echo $DeductedAmount;
                                                ?>
                                            </span>
                                            <input type="hidden" name="product_size" id="product_size" value="<?php echo $tempCheckout->size_param;?>">
                                            <input type="hidden" name="price" id="price" value="<?php echo $tempCheckout->size_related_price;?>">                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Qty : </th>
                                        <td style="width: 10px">
	                                            <div class="input-group">
                                                    <input type="text" value="1" disabled="disabled" class="form-control text-center qty" style="width:90px;" />
                                                    <input type="hidden" name="qty" id="qty" value="1">
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    <th colspan="2" style="padding-bottom: 15px">
										<label class="control-label">Select Shipping  Method:</label>
										<div data-toggle="buttons">													
											<label class="btn btn-sm btn-danger radio-inline active shipping">
                                                <input type="radio" name="shipping" id="shipping" value="0">Free Shipping
                                            </label>
											<label class="btn btn-sm btn-danger radio-inline shipping">
                                                <input type="radio" name="shipping" id="shipping" value="99">Express Shipping(Rs.99)
                                            </label>
										</div>									
									</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" style="padding-bottom: 15px">
											<label class="control-label">Select Payment Method:</label>
                                            <?php $discount_amount = $tempCheckout->pro_offers;
                                                $discount_amount;
                                            ?>
											<div data-toggle="buttons">	
                                            <?php if(($tempCheckout->pro_cash_on_delivery)=='0'){ ?>											
												<label for="paymentmode" class="btn btn-sm btn-danger radio-inline active paymentmode">
                                                    <input type="radio" name="paymentmode" id="paymentmode" value="0">CASH ON DELIVERY
                                                </label>
                                            <?php }else{ ?>
                                            <?php } ?>
											    <label for="paymentmode" class="btn btn-sm btn-danger radio-inline">
                                                    <input type="radio" name="paymentmode" id="paymentmode" value="<?php echo $discount_amount;?>">PAYONLINE
                                                </label>
										    </div>
										</th>
                                    </tr>
                                   <input type="hidden" name="offerAmount" id="offerAmount" value="<?php echo$discount_amount; ?>">
                                    <tr>
                                        <th>
                                            <label class="control-label price">Total Amount:</label></th>
                                            <td style="text-align: right">
                                            <div class="price">
                                                <span><i class="fa fa-inr"></i> 
                                                    <span id="adjustPrice">
                                                    <?php 
                                                        $DeductedAmount = $tempCheckout->size_related_price;
                                                        $DeductedAmount;
                                                    ?>
                                                    <input type="hidden" name="totalPrice" id="totalPrice" value="<?php echo $DeductedAmount;?>">
                                                    <span id="grandTotal" style="font-weight: bold"><?php echo $DeductedAmount;?></span>
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
                        <button type="submit" class="btn btn-lg btn-block btn-danger" id="btnPlaceOrder" style="background-color:#ec5459;border-color:#ec5459;font-size: 1.2em; width: 300px; font-weight: 600; border-radius: 4px; padding: 7px 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 4px; margin-bottom: 0px; color: white; border-right: none; border-bottom: none;" tabindex="10">Place Order and Finish</button>
                        
                    </div>
                    <div class="text-center">
                    <img src="<?php echo base_url('assets/images/comodosecuresmall.png') ?>" alt="ComodoSecure" align="center">
                    </div>
                </div>
                    </form>
                        <!-- Notification Modal -->
                        <!-- <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content align-items-center">
                              <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLongTitle" style="color:#ec5459">After Ordering</h2>
                              </div>
                              <div class="modal-body">
                               <h3 style="color:#ec5459"> Your WhatsApp will open.<br>Send 
                                <?php echo $tempCheckout->pro_required_picture;?> 
                                Photos to that number.</h3>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Ok,Got it</strong></button>
                              </div>
                            </div>
                          </div>
                        </div> -->
                        <!-- End Of The Notication modal -->
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
<!--checkout form start--><br>

