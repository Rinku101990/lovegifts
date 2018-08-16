<div class="col-md-12">
  <?php if(!empty($orderStatus)){ ?>
  <center><h3 style="margin:20px">Your Order Status</h3></center>
  <table class="table table-responsive">
    <thead>
      <th>S.No</th>
      <th>Order No</th>
      <th>Name</th>
      <th>Product Status</th>
      <th>Packed</th>
      <th>Despatched</th>
      <th>Deliverd</th>
    </thead>
    <tbody>
    <?php $i=1; foreach($orderStatus as $status){?>
      <td><?php echo $i++;?></td>
      <td><?php echo $status->ord_reference_id;?></td>
      <td><?php echo $status->pro_title;?></td>
      
      <?php if(($status->ord_photo_checked)=='1'){?>
         <td style="color:green;font-weight:bold"><i class="fa fa-check-circle"></i></td>
      <?php }else if(($status->ord_photo_checked)=='0'){ ?>
        <td style="color:red;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php }else{ ?>
          <td style="color:gray;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php } ?>
      
      <?php if(($status->ord_photo_checked)=='1'){?>
         <td style="color:green;font-weight:bold"><i class="fa fa-check-circle"></i></td>
      <?php }else if(($status->ord_photo_checked)=='0'){ ?>
        <td style="color:red;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php }else{ ?>
          <td style="color:gray;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php } ?>
      
      <?php if(($status->ord_photo_packed)=='1'){?>
         <td style="color:green;font-weight:bold"><i class="fa fa-check-circle"></i></td>
      <?php }else if(($status->ord_photo_packed)=='0'){ ?>
        <td style="color:red;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php }else{ ?>
          <td style="color:gray;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php } ?>
      
      <?php if(($status->ord_photo_despatched)=='1'){?>
         <td style="color:green;font-weight:bold"><i class="fa fa-check-circle"></i></td>
      <?php }else if(($status->ord_photo_despatched)=='0'){ ?>
        <td style="color:red;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php }else{ ?>
          <td style="color:gray;font-weight:bold"><i class="fa fa-times-circle-o"></i></td>
      <?php } ?>
      
    <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?>
    <p style="margin-top:60px"><center><b>Records Not Found.  <a href="<?php echo base_url('track');?>" style="color:green">Go Back</a></b></center></p>
  <?php } ?>
</div>
<br>
<br>
