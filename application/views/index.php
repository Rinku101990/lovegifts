<!-- start slide -->
<!-- Carousel -->
<?php //echo "<pre>"; 
	  //print_r($banners);
?>
<div id="homeCarousel" class="carousel slide" data-ride="carousel" style="width:100%">
	<div class="carousel-inner">
	<?php if(!empty($banners)){ ?>
	<?php $i = 1; foreach($banners as $bannerslist){ ?>
		<?php $item_class1 = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
		<div class="<?php echo $item_class1; ?>">
			<img  src="<?php echo base_url();?>/<?php echo $bannerslist->bann_picture;?>" alt="<?php echo $bannerslist->bann_title;?>" style="width:100%;height:auto;margin:0 auto">
		</div>
		<?php $i++;  ?>
	<?php } }else{ ?>
		<div class="carousel-item active">
			<img  src="<?php echo base_url('assets/images/02.jpg');?>" alt="Love Gift" style="width:100%;height:auto;margin:0 auto">
		</div>
	<?php } ?>
	</div>
	<a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
	<!--	<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
	<span><i class="fa fa-chevron-left" style="font-size:36px;color:#e61a21"></i></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
	<!--	<span class="carousel-control-next-icon" aria-hidden="true" style="color:red;"></span> -->
		<span><i class="fa fa-chevron-right" style="font-size:36px;color:#e61a21"></i></span>
		<span class="sr-only">Next</span>
	</a>
</div>	<!-- /.carousel -->
<!-- end slide here -->
<!-- LoveGifts.in Promise -->
<br>
<h2 class="text-center textdecorationheader">Love Gifts Promise </h2>
<hr>
<div class="container-fluid containerbackgroundcolor">
	<!--desktop only -->
        <div class="i-am-centered d-none d-sm-block">
          	<div class="row text-center">
            	<div class="col-md-2 paddingdiv" id="promisepanelred">
                    <i class="fa fa-camera-retro fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i><br>
                    <p><strong>STUDIO QUALITY<br>PHOTO PRINTING</strong> <p>
				</div>
			  	<div class="col-md-2 paddingdiv" id="promisepanelblue">                     
                    <i class="fa fa-truck fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i><br>
                    <p><strong>FREE SHIPPING <br>ALL OVER INDIA</strong></p>
                </div>
			    <div class="col-md-2 paddingdiv" id="promisepanelyellow">
                    <i class="fa fa-rupee fa-3x" aria-hidden="true"></i><br>
                    <p><strong>CASH ON DELIVERY</strong></p>
                </div>
			    <div class="col-md-2 paddingdiv" id="promisepanelgreen">
                    <i class="fa fa-thumbs-up fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i><br>
                    <p><strong>100% SAFE</strong></p>
                </div>
	        </div>
		</div>
		<!--mobile only -->
		<div class="row text-center d-md-none">
            <div class="col-md-2 paddingdiv" id="promisepanelred">
                <i class="fa fa-camera-retro fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i><br>
                <p><strong>STUDIO QUALITY<br>PHOTO PRINTING</strong> <p>
			</div>
		    <div class="col-md-2 paddingdiv" id="promisepanelblue">                     
                <i class="fa fa-truck fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i><br>
                    <p><strong>FREE SHIPPING <br>ALL OVER INDIA</strong></p>
            </div>
		  	<div class="col-md-2 paddingdiv" id="promisepanelyellow">
                <i class="fa fa-rupee fa-3x" aria-hidden="true"></i><br>
                <p><strong>CASH ON DELIVERY</strong></p>
            </div>
		    <div class="col-md-2 paddingdiv" id="promisepanelgreen">
                <i class="fa fa-thumbs-up fa-3x" aria-hidden="true" style="width: auto; text-align: center"></i><br>
                <p><strong>100% SAFE</strong></p>
          	</div>
	      </div>
		<br>
    </div>      
<!-- end here LoveGifts.in Promise -->
 <br>
<h1 class="text-center textdecorationheader">FEATURED GIFTS</h1>
    <section class="pv-30">
        <div class="container">
          	<div class="row" >
          	<?php if(!empty($products)){ ?>
      		<?php foreach($products as $productslist){ ?>
      		<div class="col-lg-6"  style="margin-bottom: 20px">
				<div class="panel1<?php echo $productslist->pro_id;?>" id="panel1">
					<nav class="nav nav-pills flex-column flex-sm-row myTabs" role="tablist" id="myTabs<?php echo $productslist->pro_id;?>">
						<a class="flex-sm-fill text-sm-center nav-link active" href="#LoveBoxPic<?php echo $productslist->pro_id;?>" role="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbspPhoto</a>
						<?php if(($productslist->pro_videos)!=''){?>
						<a class="flex-sm-fill text-sm-center nav-link" href="#LoveBoxVideo<?php echo $productslist->pro_id;?>" role="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbspVideo</a>
						<?php }else{ ?>
						<?php } ?>
					</nav>
					<div class="tab-content mt-6" id="tabContent">
						<div class="tab-pane active" id="LoveBoxPic<?php echo $productslist->pro_id;?>" role="tabpanel">
							<div id="carouselExampleControls<?php echo $productslist->pro_id;?>" class="carousel slide" data-ride="carousel" style="width:100%">
								<div class="carousel-inner">
									<?php $i = 1; foreach($picture as $picturelist){ ?>
										<?php if(($picturelist->pro_id)==($productslist->pro_id)){ ?>
										<?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
											<div class="<?php echo $item_class ?>" >
												<img class="d-block w-100" src="<?php echo base_url();?>/<?php echo $picturelist->pic_param;?>" alt="<?php echo $productslist->pro_title;?>" style="width:100%;margin:0 auto">
											</div>
										<?php $i++; }  ?>
									<?php } ?>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleControls<?php echo $productslist->pro_id;?>" role="button" data-slide="prev">
								<!--	<span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
								<span><i class="fa fa-chevron-left" style="font-size:24px;color:#e61a21"></i></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls<?php echo $productslist->pro_id;?>" role="button" data-slide="next">
								<!--	<span class="carousel-control-next-icon" aria-hidden="true"></span> -->
								<span><i class="fa fa-chevron-right" style="font-size:24px;color:#e61a21"></i></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<?php if(($productslist->pro_videos)!=''){?>
						<div class="tab-pane" id="LoveBoxVideo<?php echo $productslist->pro_id;?>" role="tabpanel">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe width="460" height="290" src="https://www.youtube.com/embed/<?php echo $productslist->pro_videos;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                           </div>
						</div>
						<?php }else{ ?>
						<?php } ?>
					</div>
					</div>
				</div>
             	<div class="col-lg-6" style="margin-bottom: 20px">
              		<h1 class="mt-4 textdecorationheader"><?php echo $productslist->pro_title;?></h1><hr>
              			<div class="separator-2"></div>
			   				<div class="inner-info">
			   					<?php $i = 0; foreach($price as $pricelist){ ?>
			   						<?php if(($productslist->pro_id)==($pricelist->pro_id)){ ?>
			   							<?php if($i < 1) {?>
                        				<h4><i class="fa fa-rupee"></i><span>&nbsp<?php echo $pricelist->size_related_price?></span></h4><hr>
                        			<?php }$i++; ?>
                        			<?php } ?>
                        		<?php } ?>

								<?php if(($productslist->pro_message_on_card)!='' && ($productslist->pro_required_picture)!=''){ ?>	
                        		<h5><?php $desc = $productslist->pro_message_on_card.' '.$productslist->pro_required_picture; echo substr($desc, 0, 100);?> Photos</h5><hr>
								<?php }else if(($productslist->pro_message_on_card)=='' && ($productslist->pro_required_picture)!=''){ ?>
									<h5><?php $desc = $productslist->pro_required_picture; echo $desc;?></h5><hr>
								<?php }else if(($productslist->pro_pro_message_on_card)!='' && ($productslist->pro_required_picture)==''){ ?>
									<h5><?php $desc = $productslist->pro_pro_message_on_card;echo substr($desc, 0, 100);?> Photos</h5><hr>
								<?php }else{ ?>
								<?php } ?>
								
							   </div><br>
                    		<div class="row">
                        		<div class="col-md-6 cta-button">
                            		<a onclick="ga('send', 'event', 'Home View', '<?php echo $productslist->pro_title;?> Click', 'View Product');" href="<?php echo base_url('products/details');?>/<?php echo $productslist->pro_title_slug;?>" class="btn btn-lg btn-block btn-danger" ><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View Product</a>
                        		</div>
								<div class="col-md-6 cta-button">
									<?php $i = 0; foreach($price as $pricelist){ ?>
			   						<?php if(($productslist->pro_id)==($pricelist->pro_id)){ ?>
			   							<?php if($i < 1) {?>
                        				<a href="javascript:(void)" chkout1="<?php echo $productslist->pro_id;?>" pcate="<?php echo $productslist->cate_id;?>" pslug="<?php echo $productslist->pro_title_slug;?>" psize="<?php echo $pricelist->size_id;?>"  class="btn btn-lg btn-block btn-danger btnProductCheckout1"><span><i class="fa fa-shopping-bag"></i></span>&nbsp; Buy Now</a>
                        			<?php }$i++; ?>
									
                        			<?php } ?>
                        		<?php } ?>
		                        </div>
                     	</div><br>
                </div>
                <div class="clearfix"></div>
                <?php } ?>
          		<?php }else{ ?>
          			<p style="margin-top: 20px;font-weight: bold;padding:30px">You haven't added any records yet!</p>
          		<?php } ?>
          	</div>
       </div><br>
    </section>
<div class="sticky d-md-none">
    <div id="outer">
        <div class="inner"><a href="tel:+91 99886 55011" class="btn btn-lg btn-block btn-primary"><strong><span><i class="fa fa-phone" style="color:#fff;"></i></span>&nbsp&nbsp Call Now</strong></a></div>
        <div class="inner"><a href="https://api.whatsapp.com/send?phone=919988655011&text=Hi%20Love%20Gifts%20%E2%9D%A4%0AI%20want%20to%20Buy%20a%20Gift." class="btn btn-lg btn-block btn-success"><strong><span><i class="fa fa-whatsapp" style="color:#fff;"></i></span>&nbsp&nbsp Live Chat</strong></a></div>
    </div>
</div> 	
