<div class="col-md-12">
  <?php if(!empty($orderStatus)){ ?>
  <center><h3 style="margin:20px;color:#ec5459;font-family: Fontdinerdotcom Luvable;">Your Order Status</h3></center>
  <table class="table table-responsive">
    <thead>
      <th style="color:#ec5459;">S.No</th>
      <th style="color:#ec5459;">Order No</th>
      <th style="color:#ec5459;">Name</th>
      <th style="color:#ec5459;">Product Status</th>
      <th style="color:#ec5459;">Packed</th>
      <th style="color:#ec5459;">Despatched</th>
      <th style="color:#ec5459;">Deliverd</th>
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
