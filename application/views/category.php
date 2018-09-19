<br>
<h1 class="text-center textdecorationheader"><?php echo $cate->cate_name;?></h1>
    <section class="pv-30">
        <div class="container">
          	<div class="row" >
          	<?php if(!empty($catelist)){ ?>
      		<?php foreach($catelist as $catelist){ ?>
      		<div class="col-lg-6"  style="margin-bottom: 20px">
				<div class="panel1<?php echo $catelist->pro_id;?>" id="panel1">
					<nav class="nav nav-pills flex-column flex-sm-row myTabs" role="tablist" id="myTabs<?php echo $catelist->pro_id;?>">
						<a class="flex-sm-fill text-sm-center nav-link active" href="#LoveBoxPic<?php echo $catelist->pro_id;?>" role="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbspPhoto</a>
						<?php if(($catelist->pro_videos)!=''){?>
						<a class="flex-sm-fill text-sm-center nav-link" href="#LoveBoxVideo<?php echo $catelist->pro_id;?>" role="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbspVideo</a>
						<?php }else{ ?>
						<?php } ?>
					</nav>
					<div class="tab-content mt-6" id="tabContent">
						<div class="tab-pane active" id="LoveBoxPic<?php echo $catelist->pro_id;?>" role="tabpanel">
							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width:100%">
								<div class="carousel-inner">
									<?php $i = 1; foreach($picture as $picturelist){ ?>
										<?php if(($picturelist->pro_id)==($catelist->pro_id)){ ?>
										<?php $item_class = ($i == 1) ? 'carousel-item active' : 'carousel-item'; ?>
											<div class="<?php echo $item_class ?>" >
												<img class="d-block w-100" src="<?php echo base_url();?>/<?php echo $picturelist->pic_param;?>" alt="<?php echo $catelist->pro_title;?>" style="width:100%;margin:0 auto">
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
						<?php if(($catelist->pro_videos)!=''){?>
						<div class="tab-pane" id="LoveBoxVideo<?php echo $catelist->pro_id;?>" role="tabpanel">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe width="460" height="290" src="https://www.youtube.com/embed/<?php echo $catelist->pro_videos;?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                           </div>
						</div>
						<?php }else{ ?>
						<?php } ?>
					</div>
					</div>
				</div>
             	<div class="col-lg-6" style="margin-bottom: 20px">
					<input type="hidden" name="pro_category" id="pro_category" value="<?php echo $catelist->cate_id;?>">
              		<h1 class="mt-4 textdecorationheader"><?php echo $catelist->pro_title;?></h1><hr>
              			<div class="separator-2"></div>
			   				<div class="inner-info">
			   					<?php $i = 0; foreach($price as $pricelist){ ?>
			   						<?php if(($catelist->pro_id)==($pricelist->pro_id)){ ?>
			   							<?php if($i < 1) {?>
										<input type="hidden" name="productSize" id="productSize" value="<?php echo $pricelist->size_id;?>">
                        				<h4><i class="fa fa-rupee"></i><span>&nbsp<?php echo $pricelist->size_related_price?></span></h4><hr>
                        			<?php }$i++; ?>
                        			<?php } ?>
                        		<?php } ?>

								<?php if(($catelist->pro_description)!='' && ($catelist->pro_required_picture)!=''){ ?>	
                        		<h5><?php $desc = $catelist->pro_description.' '.$catelist->pro_required_picture; echo substr($desc, 0, 57);?></h5><hr>
								<?php }else if(($catelist->pro_description)=='' && ($catelist->pro_required_picture)!=''){ ?>
									<h5><?php $desc = $catelist->pro_required_picture; echo $desc;?></h5><hr>
								<?php }else if(($catelist->pro_description)!='' && ($catelist->pro_required_picture)==''){ ?>
									<h5><?php $desc = $catelist->pro_description; echo substr($desc, 0, 57);?></h5><hr>
								<?php }else{ ?>
								<?php } ?>
								
							   </div><br>
                    		<div class="row">
                        		<div class="col-md-6 cta-button">
                        			<input type="hidden" name="productid" id="productid" value="<?php echo $catelist->pro_id?>">
                            		<a href="<?php echo base_url('products/details');?>/<?php echo $catelist->pro_title_slug;?>" class="btn btn-lg btn-block btn-danger"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;View Product</a>
                        		</div>
								<div class="col-md-6 cta-button">
									<input type="hidden" name="product_slug" id="product_slug" value="<?php echo $catelist->pro_title_slug;?>">
									<a href="javascript:(void);" chkout1="<?php echo $catelist->pro_id;?>" class="btn btn-lg btn-block btn-danger btnProductCheckout1"><span><i class="fa fa-shopping-bag"></i></span>&nbsp; Buy Now</a>
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
	
