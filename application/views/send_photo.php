<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1 text-center">Send Order Photos </h1>
				<h2 class="h2 text-center">After Placing order, you can send photos in 2 ways.<h2>
            </div>
        </div>
    </div>
</div>
 <div class="container-fluid">
	<!-- desktop only -->
	<div class="i-am-centered d-none d-sm-block">
		<div class="row text-center">
			<div class="col-md-4 paddingdiv" id="promisepanelgreen">
			   <a href="#" style="text-decoration: none;" id="anchorRequestBtn"><font face="verdana" color="#4FCE5D"> <h4><strong>By Whatsapp-Click here</strong></h4> </font>
			      <i class="fa fa-whatsapp fa-5x" aria-hidden="true" style="width: auto; text-align: center"></i>
			   </a>
			</div>
			<div class="col-md-4 paddingdiv" id="promisepanelblue">  
				<a href="#" style="text-decoration: none;" id="anchorRequestBtnMail"><font color="#5C9AE5"><h4><strong>By Email-Click here</strong></h4> <i class="fa fa-envelope fa-5x" aria-hidden="true" style="width: auto; text-align: center"></i>
				</font><br></a>
			</div>
		  </div>
	  </div>
	  <!--mobile only -->
	   <div class="row text-center d-md-none">
			<div class="col-md-4 paddingdiv" id="promisepanelgreen">
				<a href="#" style="text-decoration: none;" id="anchorRequestBtnMobile"><font face="verdana" color="#4FCE5D"> <h4><strong>By Whatsapp-Click here</strong></h4> </font>
				<i class="fa fa-whatsapp fa-5x" aria-hidden="true" style="width: auto; text-align: center"></i>
			    </a>
			</div>
			<div class="col-md-4 paddingdiv" id="promisepanelblue">  
				<a href="#" style="text-decoration: none;" id="anchorRequestBtnMoMail"><font face="verdana" color="#5C9AE5"> <h4><strong>By Email-Click here</strong></h4> </font>
				<font color="#5C9AE5"><i class="fa fa-envelope fa-5x" aria-hidden="true" style="width: auto; text-align: center"></i></font><br></a>
			</div>
	  </div>
	  </center>
	<br>
</div> 
<br>
<div class="modal fade" id="verify_request_page" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header" style="text-align: center">
		<h2 class="modal-title" style="font-size:20px">Verify Order For Send Photos</h2>
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	  <div class="panel-body">
		  <link rel="stylesheet" href="<?php echo base_url('assets/css/trackorderformcss.css');?>" />
			<center>
			  <div class="container">
				<div class="col-lg-offset-12 col-lg-12" id="panel">
					<form method="post">
					  <br>
					  <div class="group">
						<input type="text" name="order_no" id="order_no" maxlength="8" autofocus="autofocus" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Order No.</label>
					  </div>
					  <div class="group">
						<input type="text" name="mobile_no" id="mobile_no" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Mobile No</label>
					  </div>
					  <div class="group">
						<div class="col-md-4 cta-button">
						  <button type="button" class="btn btn-lg btn-block btn-danger btnVerifyOrders">Verify</button>
						</div>
						<span id="errorMsg" style="color:#ec5459"></span>
					  </div>
				  </form>
				</div>
				<div id="response" style="display:none">
					<h2 style="font-size:20px;margin-top: 28px;">
						Click on the Button to Send your photo 
						<span id="statusMsg"></span>
					</h2>
				</div>
			  </div>
			</center>
		  <br>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	</div>
  </div>
</div>
<div class="modal fade" id="verify_request_pageMail" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header" style="text-align: center">
		<h2 class="modal-title" style="font-size:20px">Verify Order For Send Photos</h2>
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	  <div class="panel-body"  style="height:275px">
		  <link rel="stylesheet" href="<?php echo base_url('assets/css/trackorderformcss.css');?>" />
			<center>
			  <div class="container">
				<div class="col-lg-offset-12 col-lg-12" id="panelMail">
					<form method="post">
					  <br>
					  <div class="group">
						<input type="text" name="order_no" id="order_nom" maxlength="8" autofocus="autofocus" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Order No.</label>
					  </div>
					  <div class="group">
						<input type="text" name="mobile_no" id="mobile_nom" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Mobile No</label>
					  </div>
					  <div class="group">
						<div class="col-md-4 cta-button">
						  <button type="button" class="btn btn-lg btn-block btn-danger btnVerifyOrdersMail">Verify</button>
						</div>
						<span id="errorMsgMail" style="color:#ec5459"></span>
					  </div>
				  </form>
				</div>
				<div id="responseMail" style="display:none">
					<h2 style="font-size:20px;margin-top: 28px;">
						Click on the Button to Send your photo 
						<a href="mailto:hello@lovegifts.in" class="btn btn-danger">Send Mail</a>
					</h2>
				</div>
			  </div>
			</center>
		  <br>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	</div>
  </div>
</div>

<!-- For Mobile -->
<div class="modal fade" id="verify_request_page_wmobile" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header" style="text-align: center">
		<h2 class="modal-title" style="font-size:20px">Verify Order For Send Photos</h2>
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	  <div class="panel-body">
		  <link rel="stylesheet" href="<?php echo base_url('assets/css/trackorderformcss.css');?>" />
			<center>
			  <div class="container">
				<div class="col-lg-offset-12 col-lg-12" id="panelwm">
					<form method="post">
					  <br>
					  <div class="group">
						<input type="text" name="order_no" id="order_nowm" maxlength="8" autofocus="autofocus" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Order No.</label>
					  </div>
					  <div class="group">
						<input type="text" name="mobile_no" id="mobile_nowm" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Mobile No</label>
					  </div>
					  <div class="group">
						<div class="col-md-4 cta-button">
						  <button type="button" class="btn btn-lg btn-block btn-danger btnVerifyOrderswmobile">Verify</button>
						</div>
						<span id="errorMsgwm" style="color:#ec5459"></span>
					  </div>
				  </form>
				</div>
				<div id="responsewm" style="display:none">
					<h2 style="font-size:20px;margin-top: 28px;">
						Click on the Button to Send your photo 
						<span id="statusMsgwm"></span>
					</h2>
				</div>
			  </div>
			</center>
		  <br>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	</div>
  </div>
</div>

<div class="modal fade" id="verify_request_page_emobile" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header" style="text-align: center">
		<h2 class="modal-title" style="font-size:20px">Verify Order For Send Photos</h2>
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	  <div class="panel-body">
		  <link rel="stylesheet" href="<?php echo base_url('assets/css/trackorderformcss.css');?>" />
			<center>
			  <div class="container">
				<div class="col-lg-offset-12 col-lg-12" id="panelem">
					<form method="post">
					  <br>
					  <div class="group">
						<input type="text" name="order_no" id="order_noem" maxlength="8" autofocus="autofocus" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Order No.</label>
					  </div>
					  <div class="group">
						<input type="text" name="mobile_no" id="mobile_noem" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Mobile No</label>
					  </div>
					  <div class="group">
						<div class="col-md-4 cta-button">
						  <button type="button" class="btn btn-lg btn-block btn-danger btnVerifyOrdersemobile">Verify</button>
						</div>
						<span id="errorMsgem" style="color:#ec5459"></span>
					  </div>
				  </form>
				</div>
				<div id="responseem" style="display:none">
					<h2 style="font-size:20px;margin-top: 28px;">
						Click on the Button to Send your photo 
						<a href="mailto:hello@lovegifts.in" class="btn btn-danger">Send Mail</a>
					</h2>
				</div>
			  </div>
			</center>
		  <br>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="close" data-dismiss="modal">×</button>
	  </div>
	</div>
  </div>
</div>
