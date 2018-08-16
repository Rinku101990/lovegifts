<!DOCTYPE html>
<html lang="en">
<head>
<title>Tohfa.Gift|Handmade Love</title>
<meta charset="utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>


<!--Bootstrap-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link href="css/full-slider.css" rel="stylesheet">
    


<!--Bootstrap-->

<!--Main Menu File-->
<link rel="stylesheet" type="text/css" media="all" href="css/webslidemenu.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/trackorderformcss.css" />

<!--Main Menu File-->

<!-- font awesome -->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
<!-- font awesome -->
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
 

	
</head>
<body>
<div class="wsmenucontainer clearfix">
  <div class="overlapblackbg"></div>
  <div class="wsmobileheader clearfix"> <a id="wsnavtoggle" class="animated-arrow"><span></span></a> <a class="smallogo"><img src="images/sml-logo.png"  alt="" /></a> <a class="callusicon" href="tel:+91 76683 76683"><span class="fa fa-phone"></span></a> </div>
  <div class="headtoppart clearfix">
    <div class="headerwp">
      <div class="headertopleft">
        <div class="address clearfix"><span><i class="fa fa-map-marker" aria-hidden="true"></i> Free shipping </span> <a href=""><i class="fa fa-phone" aria-hidden="true"></i> +91-76683-76683</a></div>
      </div>
      <div class="headertopright"> <a class="facebookicon" title="Facebook" href="#"><i aria-hidden="true" class="fa fa-facebook"></i> <span class="mobiletext02">Facebook</span></a> <a class="twittericon" title="Twitter" href="#"><i aria-hidden="true" class="fa fa-twitter"></i> <span class="mobiletext02">Twitter</span></a> <a class="linkedinicon" title="Linkedin" href="#"><i aria-hidden="true" class="fa fa-linkedin"></i> <span class="mobiletext02">Linkedin</span></a> <a class="googleicon" title="Google" href="#"><i aria-hidden="true" class="fa fa-google"></i> <span class="mobiletext02">Google</span></a> </div>
    </div>
  </div>
  <div class="headerfull"> 
    <!--Main Menu HTML Code-->
   <?php
             include "menu.php";

   ?>
    <!--Menu HTML Code--></div> 
  </div>
<br>
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
        <div align="center" style="padding-bottom:50px;"><h1>How It Works</h1></div>
    </div>
    <div class="row">
        <div class="progress" id="progress1">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            </div>
            <span class="progress-type">Overall Progress</span>
            <span class="progress-completed">0%</span>
        </div>
    </div>
    <div class="row">
        <div class="row step">
            <div style="padding-top: 4px;" id="div1" class="col-md-2 activestep" onclick="javascript: resetActive(event, 0, 'step-1');">
                <span><img src="http://rahsiaimportchina.com/wp/wp-content/uploads/2015/10/logo-2.png"></span>
                <p>RICH Members Only</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 10, 'step-2');">
                <span class="fa fa-pencil"></span>
                <p>Register Wth Ezicargo</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 20, 'step-3');">
                <span class="fa fa-qrcode"></span>
                <p>Shipping Code</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 30, 'step-4');">
                <span class="fa fa-shopping-bag"></span>
                <p>Purchase</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 40, 'step-5');">
                <span class="fa fa-cube"></span>
                <p>Create Parcel</p>
            </div>
            <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 50, 'step-6');">
                <span class="fa fa-plus-square-o"></span>
                <p>Extra Services</p>
            </div>
        </div>
        <div class="row step">
            <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 60, 'step-7');">
                <span class="fa fa-cubes"></span>
                <p>Create Shipment</p>
            </div>
            <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 80, 'step-8');">
                <span class="fa fa-tag"></span>
                <p>Tracking Number</p>
            </div>
            <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 100, 'step-9');">
                <span class="fa fa-star"></span>
                <p>Done</p>
            </div>
        </div>
    </div>
    <div class="row setup-content step activeStepInfo" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 1</h1>
                <h3 class="underline">Instructions</h3>
                Firstly before you are able to register with our service, your should be a member of closed group Rahsia Import China (RICH).<br>
                If you are not a member yet, please proceed for registration on RICH website by clicking the image below.<br>
                <div style="margin-top:10px;"><a href="http://rahsiaimportchina.com" target="_blank"><img src="http://i67.tinypic.com/10cksk8.jpg" width=640 height=297></a></div>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 2</h1>
                <h3 class="underline">Instructions</h3>
                <span style="color: #FF0000;">Note: Only RICH members are allowed to register with Ezicargo</span><br>
                Members of RICH can proceed to registration at this <a href="/register" target="_self">link</a>. We will check every new registration against RICH registration list.
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 3</h1>
                <h3 class="underline">Instructions</h3>
                User will be given an shipping CODE = Shipping mark identification number.<br>
                Shipping code (Ezi ID) only will be given after registration fee is paid.
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 4</h1>
                <h3 class="underline">Instructions</h3>
                <p>Purchase online/offline from anywhere/anyplace/anyweb in China.<br>
                Make sure give your Ezi ID as your name if you make a purchase or register any China's ecommerce website . Now your name is changed to your Ezi ID.</p>
                <p>Ezicargo warehouse address should be given to seller/supplier as your shipping address either you purchase online or offline from China's seller.</p>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 5</h1>
                <h3 class="underline">Instructions</h3>
                Create your parcel in our system after you made purchases.<br>
                Your parcel will be waiting in the system until the goods are arrived at our warehouse in China.
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-6">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 6</h1>
                <h3 class="underline">Instructions</h3>
                Select From many services provided by Ezicargo to ensure your products are correct and your parcel is in good shape for shipment.
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-7">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 7</h1>
                <h3 class="underline">Instructions</h3>
                Create your shipments individually or combine several parcels together and shipout at once.
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-8">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 8</h1>
                <h3 class="underline">Instructions</h3>
                Receive your tracking number after 1 day and your goods after 4-7days.<br>
                Tracking number only be given for Air Freight service only. Sea Freight has no tracking number, receive your goods after 14-21 days.
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-9">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>STEP 9</h1>
                <h3 class="underline">Instructions</h3>
                Finally sit back and relax, your goods are on its way.
                If your membership is still active, the flow is repeat from step 4 to 9.
            </div>
        </div>
    </div>
</div>
<br>
<br>

	<!-- footer start !-->
	<?php
                include "footer.php";
	?>
    <!--/.footer-bottom--> 
   
    <!--/.footer-bottom--> 
	
	<!-- footer end !-->
    
    
   
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/webslidemenu.js"></script>
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="js/tracker.js"></script>
</body>
</html>
