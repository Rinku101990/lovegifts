<section class="pv-30">
    <div class="container">
		<!-- for Desktop -->
        <div class="row" >
        <?php if(!empty($productView)) { ?>
        	<?php foreach($productView as $productDetails){ ?>
			<div class="col-lg-5 d-none d-sm-block">
				<div class="panel1<?php echo $productDetails->pro_id;?>" id="panel1">
					<nav class="nav nav-pills flex-column flex-sm-row myTabs" role="tablist" id="myTabs">
							<a class="flex-sm-fill text-sm-center nav-link active" href="#LoveBoxPic" role="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbspPhoto</a>
							<?php if(($productDetails->pro_videos)!=''){?>
							<a class="flex-sm-fill text-sm-center nav-link" href="#LoveBoxVideo" role="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbspVideo</a>
							<?php }else{ ?>
							<?php } ?>
						</nav>
						<div class="tab-content mt-6" id="tabContent">
							<div class="tab-pane active" id="LoveBoxPic" role="tabpanel">
								<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:100%">
									<div class="carousel-inner">
									<?php $i = 1; foreach($picture as $picturelist){ ?>
										<?php if(($picturelist->pro_id)==($productDetails->pro_id)){ ?>
										<?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
										<div class="<?php echo $item_class ?>" >
											<img class="d-block w-100" src="<?php echo base_url();?><?php echo $picturelist->pic_param;?>" alt="<?php echo $productDetails->pro_title;?>" class="img-responsive"  style="width:100%;height:440px;margin:0 auto">
										</div>
										<?php $i++; }  ?>
									<?php } ?>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
							<div class="tab-pane" id="LoveBoxVideo" role="tabpanel">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe width="460" height="290" src="https://www.youtube.com/embed/<?php echo $productDetails->pro_videos;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                               </div>
							</div>
						</div>
						</div>
					</div>
             		<div class="col-lg-7 d-none d-sm-block">
		              <h2 class="mt-4" style="color:#ec5459"><?php echo $productDetails->pro_title;?></h2>
					    <span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
						<span class="fa fa-star checked"></span>
					  <p><?php echo $productDetails->pro_message_on_card;?> It contains <?php echo $productDetails->pro_required_picture;?> Photos.</p>
			   			<div class="inner-info">
			             	<table>
							 	<tr>
						 			<td>
						 				<h3 style="color:#ec5459">
						 					<i class="fa fa-rupee"></i>
						 					<span id="productPrice"><?php foreach($selectedPrice as $leastPrice){ echo $leastPrice->size_related_price;}?></span>
						 			   </h3></td>
								<td>
                            <!-- <a href="checkout.php" class="btn btn-md-3 btn-block btn-primary"><span><i class="fa fa-shopping-bag"></i></span>&nbsp Buy Now</a> -->
                           </td>
						</tr>
						</table>

						<h5 class="mt-4" style="color:#5c9ae5" >
						<?php if(($productDetails->pro_offers)!='' && ($productDetails->pro_offer_desc)!=''){ ?>
							<span style="color:black">OFFER:</span>&nbsp;<i class="fa fa-rupee"></i> <?php echo $productDetails->pro_offers.' '.$productDetails->pro_offer_desc;?>
						<?php }else if(($productDetails->pro_offers)!='' && ($productDetails->pro_offer_desc)==''){ ?>
							<span style="color:black">OFFER:</span>&nbsp;<i class="fa fa-rupee"></i> <?php echo $productDetails->pro_offers;?>
						<?php }else if(($productDetails->pro_offers)=='' && ($productDetails->pro_offer_desc)!=''){ ?>
							<span style="color:black">OFFER:</span>&nbsp;<?php echo $productDetails->pro_offer_desc;?>
						<?php }else{ ?>
						<?php } ?>
						</h5>

						<div class="row align-items-center">

						<?php if(($productDetails->pro_free_shipping)=='0'){ ?>
							<div class="col-md-3 paddingdiv2" id="promisepanelred">
	                           <p><strong>Free Shipping</strong> &nbsp <i class="fa fa-check" aria-hidden="true"></i></p>	
	                       </div>
					    <?php }else{ ?>
					    <?php } ?>

					    <?php if(($productDetails->pro_cash_on_delivery)=='0'){ ?>
							<div class="col-md-4 paddingdiv2" id="promisepanelred">
		                        <p><strong>Cash On Delivery</strong>&nbsp <i class="fa fa-check" aria-hidden="true"></i></p>
		                    </div>
					    <?php }else{ ?>
					    <?php } ?>

					    <?php if(($productDetails->pro_price_with_photo)=='0'){ ?>
							<div class="col-md-4 paddingdiv2" id="promisepanelred">
		                        <p><strong>Price with Photos</strong> &nbsp <i class="fa fa-check" aria-hidden="true"></i></p>
		                    </div>
					    <?php }else{ ?>
					    <?php } ?>

						</div>
               		</div>			   
			   		<div class="row">
						<table class="table">

							<?php if(($productDetails->pro_required_picture)!=''){?>
							<tr>
							  <th style="width:26%">Required Pictures</th>
							  <td><?php echo $productDetails->pro_required_picture;?> Photos (Send on WhatsApp or e-mail)</td>
							</tr>
							<?php }else{ ?>
							<?php } ?>

							<tr>
							    <th scope="row">Cash On Delivery</th>
							    <td>
							  	<?php if(($productDetails->pro_cash_on_delivery)=='0'){?>
							  		<p class="text-success"><b>Yes, Cash On Delivery is Available.</b>  
							  			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#checkOutPincode">Check Pincode</button>
							  		</p> 
							  		<p id="codMsg"></p>
							  	<?php }else{ ?>
							  		<p class="text-danger"><b>Cash On Delivery is Not Available</b></p>
							  	<?php } ?>
							    </td>
							  <!-- <td>
							  	<div class="col-md-6">
							  		<input type="text" name="cod" id="cod" maxlength="6" class="form-control" placeholder="Enter Area Code" required="required">
							  	</div>
							  </td>
							  <td>
							  	<p id="codMsg" style="margin-left:-150px;"></p>
							  </td> -->
							</tr>
							<tr>
							    <th scope="row">Delivery Time</th>
							    <td colspan="3"><?php echo $productDetails->pro_delivery_days_to;?> to <?php echo $productDetails->pro_delivery_days_from;?> days (after receiving your photos)</td>
							</tr>

							<?php if(($productDetails->pro_theme)!=''){?>
							<tr>
							    <th scope="row">Theme</th>
							    <td colspan="3"><?php echo $productDetails->pro_theme;?></td>
							</tr>
							<?php }else{ ?>
							<?php }?>
							
							<?php if(($productDetails->pro_description)!=''){ ?>
							<tr>
							    <th scope="row">Specifications</th>
							    <td colspan="3"><p style="text-align:justify"><?php echo $productDetails->pro_description;?></p><td>
							</tr>
							<?php }else{ ?>
							<?php } ?>
							
							<tr>
							    <th scope="row">Size</th>
							    <td colspan="3">
								  	<div class="col-md-12">
								  		<select class="form-control" name="productSize" id="productSize" style="margin-left:-17px">
								  			<?php foreach($sizePrice as $size_price_list){ ?>
									  			<option value="<?php echo $size_price_list->size_id;?>"><?php echo $size_price_list->size_param;?></option>
									  		<?php } ?>
									  	</select>
								  	</div>
							    <td>
							</tr>

							<?php foreach($extra_field as $fieldlist){ ?>
							<?php if(($fieldlist->pro_id)==($productDetails->pro_id)){ ?>
							<tr>
								<th><?php echo $fieldlist->extra_field_keys;?></th>
								<td><?php echo $fieldlist->extra_field_value;?></td>
							</tr>
							<?php } ?>
							<?php } ?>
						</table>
						<div class="col-lg-12 cta-button">
							<input type="hidden" name="pro_category" id="pro_category" value="<?php echo $productDetails->cate_id;?>">
							<input type="hidden" name="product_slug" id="product_slug" value="<?php echo $productDetails->pro_title_slug;?>">
                            <a href="javascript:(void);" chkout="<?php echo $productDetails->pro_id;?>" class="btn btn-lg btn-block btn-danger btnProductCheckout"><span><i class="fa fa-shopping-bag"></i></span>&nbsp Click here to Buy this Gift</a>
                        </div>
				   </div>
	            </div>
        	<?php } ?>
        <?php } ?>
          </div>
		  <!-- for mobile -->
		  <div class="row d-block d-sm-none" >
			<?php if(!empty($productView)) { ?>
        	<?php foreach($productView as $productDetails){ ?>
			<div class="col-lg-7 paddingdiv2">
              <h2 class="mt-4" style="color:#ec5459"><?php echo $productDetails->pro_title;?></h2>
			    <span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
			  <p><?php echo $productDetails->pro_message_on_card;?> It contains <?php echo $productDetails->pro_required_picture;?> Photos.</p>
			   <div class="inner-info">
			             <table>
						 <tr>
                        
						  <td>  <h3 style="color:#ec5459"><i class="fa fa-rupee"></i><span id="productPrice1">&nbsp<?php foreach($selectedPrice as $leastPrice){ echo $leastPrice->size_related_price;}?> </span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3></td>
							<td>
                            <!-- <a href="checkout.php" class="btn btn-md-3 btn-block btn-primary"><span><i class="fa fa-shopping-bag"></i></span>&nbsp Buy Now</a> -->
                           </td>
						</tr>
						</table>
						<div class="row align-items-center">

						<?php if(($productDetails->pro_free_shipping)=='0'){ ?>
							<div class="col-md-3 paddingdiv2" id="promisepanelred">
	                           <p><strong>Free Shipping</strong> &nbsp <i class="fa fa-check" aria-hidden="true"></i></p>	
	                        </div>
					    <?php }else{ ?>
					    <?php } ?>

					    <?php if(($productDetails->pro_cash_on_delivery)=='0'){ ?>
							<div class="col-md-4 paddingdiv2" id="promisepanelred">
		                        <p><strong>Cash On Delivery</strong>&nbsp <i class="fa fa-check" aria-hidden="true"></i></p>
		                    </div>
					    <?php }else{ ?>
					    <?php } ?>

					    <?php if(($productDetails->pro_price_with_photo)=='0'){ ?>
							<div class="col-md-4 paddingdiv2" id="promisepanelred">
		                        <p><strong>Price with Photos</strong> &nbsp <i class="fa fa-check" aria-hidden="true"></i></p>
		                    </div>
					    <?php }else{ ?>
					    <?php } ?>

						</div>
               </div>	
			  </div>
              <div class="col-lg-7 mt-2 paddingdiv2">
				<div class="panel1<?php echo $productDetails->pro_id;?>" id="panel1">
						<nav class="nav nav-pills flex-column flex-sm-row myTabs" role="tablist" id="myTabs">
							<a class="flex-sm-fill text-sm-center nav-link active" href="#LoveBoxPicv" role="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbspPhoto</a>
							<?php if(($productDetails->pro_videos)!=''){?>
							<a class="flex-sm-fill text-sm-center nav-link" href="#LoveBoxVideov" role="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbspVideo</a>
							<?php }else{ ?>
							<?php } ?>
						</nav>
						<div class="tab-content mt-6" id="tabContent">
							<div class="tab-pane active" id="LoveBoxPicv" role="tabpanel">
								<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:100%">
									<div class="carousel-inner" style="width:290px;height:290px;margin:0 auto">
									<?php $i = 1; foreach($picture as $picturelist){ ?>
									  <?php if(($picturelist->pro_id)==($productDetails->pro_id)){ ?>
										<?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
										<div class="<?php echo $item_class ?>" style="height: 290px;">
											<img class="d-block w-100" src="<?php echo base_url();?><?php echo $picturelist->pic_param;?>" alt="<?php echo $productDetails->pro_title;?>" class="img-responsive" style="height:250px;width:280px">
										</div>
										<?php $i++; }  ?>
									<?php } ?>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
							<div class="tab-pane" id="LoveBoxVideov" role="tabpanel">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $productDetails->pro_videos;?>" frameborder="0" allowfullscreen></iframe>
                               </div>
							</div>
						</div>
					</div>
			  </div>			   
			   <div class="row col-lg-7 mt-2">
						<table class="table" style="margin-left: 5px;">
							
							<tr>
							  <th style="width:157px">Required Pictures</th>
							  <td colspan="2"><?php echo $productDetails->pro_required_picture;?></td>
							</tr>

							<!-- <tr>
							  <th scope="row">Cash On Delivery</th>
							  <td colspan="3"><input type="text" name="cod" id="cod1" maxlength="6" class="form-control" placeholder="Enter Area Code" required="required"></td>
							</tr>
							<tr>
								<td colspan="3">
								<p id="codMsg1" ></p>
								</td>
							</tr> -->
							<?php if(($productDetails->pro_cash_on_delivery)=='0'){?>
							<tr>
							    <th scope="row">Cash On Delivery</th>
							    <td>
								  	<p class="text-success"><b>Yes, Cash On Delivery is Available.</b>  
								  		<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#checkOutPincodeMini">Check Pincode</button>
								  	</p>
							    </td>
							</tr>
							<tr>
								<td colspan="3"><p id="codMsg1"></p></td>
							</tr>
						    <?php }else{ ?>
						  	    <tr>
						  	    	<th scope="row">Cash On Delivery</th>
						  	    	<td><p class="text-danger"><b>Cash On Delivery is Not Available</b></p></td>
						  	    </tr>
						    <?php } ?>
							  <!-- <td>
							  	<div class="col-md-6">
							  		<input type="text" name="cod" id="cod" maxlength="6" class="form-control" placeholder="Enter Area Code" required="required">
							  	</div>
							  </td>
							  <td>
							  	<p id="codMsg" style="margin-left:-150px;"></p>
							  </td> -->
							</tr>

							<tr>
							  <th scope="row">Delivery Time</th>
							  <td colspan="3"><?php echo $productDetails->pro_delivery_days_to;?> to <?php echo $productDetails->pro_delivery_days_from;?></td>
							</tr>

							<?php if(($productDetails->pro_theme)!=''){?>
							<tr>
							    <th scope="row">Theme</th>
							    <td colspan="3"><?php echo $productDetails->pro_theme;?></td>
							</tr>
							<?php }else{ ?>
							<?php }?>

							<!-- <tr>
							  <th scope="row">Theme</th>
							  <td colspan="3"><?php echo $productDetails->pro_theme;?></td>
							</tr> -->
							
							<tr>
							  <th scope="row">Specifications</th>
							  <td colspan="3"><p style="text-align:justify"><?php echo $productDetails->pro_description;?></p><td>
							</tr>
							<tr>
							  <th scope="row">Size</th>
							  <td colspan="3">
							  	<div class="col-md-12">
							  		<select class="form-control" name="productSize" id="productSize1" style="margin-left:-16px">
							  			<?php foreach($sizePrice as $size_price_list){ ?>
								  			<option value="<?php echo $size_price_list->size_id;?>"><?php echo $size_price_list->size_param;?></option>
								  		<?php } ?>
								  	</select>
							  	</div>
							  <td>
							</tr>
							<?php foreach($extra_field as $fieldlist){ ?>
							<?php if(($fieldlist->pro_id)==($productDetails->pro_id)){ ?>
							<tr>
								<th><?php echo $fieldlist->extra_field_keys;?></th>
								<td><?php echo $fieldlist->extra_field_value;?></td>
							</tr>
							<?php } ?>
							<?php } ?>
						</table>
						<center>
						<div class="col-lg-12 cta-button">
							<input type="hidden" name="pro_category" id="pro_category" value="<?php echo $productDetails->cate_id;?>">
                            <input type="hidden" name="product_slug" id="product_slug" value="<?php echo $productDetails->pro_title_slug;?>">
                            <a href="javascript:(void);" chkout1="<?php echo $productDetails->pro_id;?>" class="btn btn-lg btn-block btn-danger btnProductCheckout1"><span><i class="fa fa-shopping-bag"></i></span>&nbsp Click here to Buy this Gift</a>
                        </div>
						<!--<div class="col-lg-12 paddingdiv cta-button">
                            <a href="checkout.php" class="btn btn-lg btn-block btn-success"><i class="fa fa-gift"></i>&nbspSave Gift</a>
                        </div>
						-->
						<div class="text-center">
						<h4> <strong> OFFER:</strong></h4>
						<h5 class="mt-2 paddingdiv" style="color:#5c9ae5" >Choose Online Payment to get Rs.150 discount</h5>
						</div>
					
			   </div>
				<?php } ?>
			<?php } ?>
          </div>
        </div>
        <br>
	
		<h2 class="text-center textdecorationheader">How To Order </h2>
  <hr>	

  
		 <div class="container-fluid containerbackgroundcolor">
		 <!-- desktop only -->
          <div class="i-am-centered d-none d-sm-block">
        <div class="row text-center">
            <div class="col-md-3 paddingdiv " id="promisepanelred">
                        <h4>Step 1</h4><i class="fa fa-globe fa-3x" aria-hidden="true"></i>
                    <br>
                        <p><strong>Order On<br>Website</strong> <p>
						
						
            </div>
			  <div class="col-md-3 paddingdiv" id="promisepanelred">                     
                        <h4>Step 2</h4><i class="fa fa-whatsapp fa-3x" aria-hidden="true"></i>
                    <br>
                        <p><strong>Send Photos <br>On WhatsApp</strong></p>
                    
               
               </div>
			  <div class="col-md-3 paddingdiv" id="promisepanelred">
                      <h4>Step 3</h4>  <i class="fa fa-rupee fa-3x" aria-hidden="true"></i>
                        <br>
                        <p><strong>Pay Cash<br>On Delivery</strong></p>
                    
			  </div>
	      </div>
		  </div>
		   <!-- mobile only -->
		   <div class="row text-center d-md-none">
            <div class="col-md-3 paddingdiv" id="promisepanelred">
                        <h4>Step 1</h4><i class="fa fa-globe fa-3x" aria-hidden="true"></i>
                    <br>
                        <p><strong>Order On<br>Website</strong> <p>
						
						
            </div>
			  <div class="col-md-3 paddingdiv" id="promisepanelred">                     
                        <h4>Step 2</h4><i class="fa fa-whatsapp fa-3x" aria-hidden="true"></i>
                    <br>
                        <p><strong>Send Photos <br>On WhatsApp</strong></p>
                    
               
               </div>
			  <div class="col-md-3 paddingdiv" id="promisepanelred">
                      <h4>Step 3</h4>  <i class="fa fa-rupee fa-3x" aria-hidden="true"></i>
                        <br>
                        <p><strong>Pay Cash<br>On Delivery</strong></p>
                   
			  </div>
	      </div>
		  
		  
		<br>
      </div>
		
		 <!-- start experiment !-->
			<h2 class="text-center textdecorationheader">Love Gifts Promise </h2>
  <hr>	

  
		 <div class="container-fluid">
		 <!-- desktop only -->
          <div class="i-am-centered d-none d-sm-block">
        <div class="row text-center">
            <div class="col-md-2 paddingdiv" id="promisepanelred">
                        <i class="fa fa-camera-retro fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i>
                    <br>
                        <p><strong>STUDIO QUALITY<br>PHOTO PRINTING</strong> <p>
						
						
            </div>
			  <div class="col-md-2 paddingdiv" id="promisepanelblue">                     
                        <i class="fa fa-truck fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i>
                    <br>
                        <p><strong>FREE SHIPPING <br>ALL OVER INDIA</strong></p>
                    
               
               </div>
			  <div class="col-md-2 paddingdiv" id="promisepanelyellow">
                        <i class="fa fa-rupee fa-3x" aria-hidden="true"></i>
                        <br>
                        <p><strong>CASH ON DELIVERY</strong></p>
                    
			  </div>
			   
			   <div class="col-md-2 paddingdiv" id="promisepanelgreen">
                        <i class="fa fa-thumbs-up fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i>
						<br>
                        <p><strong>100% SAFE</strong></p>
              </div>
	      </div>
		  </div>
		  <!--mobile only -->
		   <div class="row text-center d-md-none">
            <div class="col-md-2 paddingdiv" id="promisepanelred">
                        <i class="fa fa-camera-retro fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i>
                    <br>
                        <p><strong>STUDIO QUALITY<br>PHOTO PRINTING</strong> <p>
						
						
            </div>
			  <div class="col-md-2 paddingdiv" id="promisepanelblue">                     
                        <i class="fa fa-truck fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i>
                    <br>
                        <p><strong>FREE SHIPPING <br>ALL OVER INDIA</strong></p>
                    
               
               </div>
			  <div class="col-md-2 paddingdiv" id="promisepanelyellow">
                        <i class="fa fa-rupee fa-3x" aria-hidden="true"></i>
                        <br>
                        <p><strong>CASH ON DELIVERY</strong></p>
                    
			  </div>
			   
			   <div class="col-md-2 paddingdiv" id="promisepanelgreen">
                        <i class="fa fa-thumbs-up fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i>
						<br>
                        <p><strong>100% SAFE</strong></p>
              </div>
	      </div>
		  </center>
		<br>
      </div> 	
	<!-- Pincode Check Out Pop Up Modal -->	
    <div id="checkOutPincode" class="modal fade" role="dialog" style="margin-top:12%">
		<div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		      	<h4 class="modal-title">Check Shipping Pincode</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
				  	<div class="col-md-9">
				  		<input type="text" name="cod" id="cod" maxlength="6" class="form-control" placeholder="Enter Area Pin Code" required="required">
				  	</div>
				  	<div class="col-md-3">
				  		<button class="btn btn-info" id="checkPinCode">Check</button>
				  	</div>
			  	</div>
			  	<p id="codMsg"></p>
		    </div>
		    </div>
		</div>
	</div>
	<div id="checkOutPincodeMini" class="modal fade" role="dialog" style="margin-top:40%">
		<div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		      	<h4 class="modal-title">Check Shipping Pincode</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		    <div class="modal-body">
		    	<div class="row">
				  	<div class="col-md-9">
				  		<input type="text" name="cod" id="cod1" maxlength="6" class="form-control" placeholder="Enter Area Pin Code" required="required">
				  	</div>
				  	<div class="col-md-3">
				  		<button class="btn btn-info" id="checkPinCodeMini">Check</button>
				  	</div>
			  	</div>
			  	<p id="codMsg"></p>
		    </div>
		    </div>
		</div>
	</div>
	<!--End of the Pincode Check Out Pop Up Modal -->
</section>