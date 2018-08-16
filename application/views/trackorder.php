<link rel="stylesheet" href="<?php echo base_url('assets/css/trackorderformcss.css');?>" />
<center>
  <div class="container">
    <div class="col-lg-offset-6 col-lg-6" id="panel">
      <h2>Track Order</h2>
        <form action="<?php echo base_url('track/status');?>" method="post">
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
              <input type="submit" class="btn btn-lg btn-block btn-danger"><span><i class="fa fa-map-marker"></i></span>&nbspTrack</a>
            </div>
          </div>
      </form>
    </div>
  </div>
</center>
<br>
