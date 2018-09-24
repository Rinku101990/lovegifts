<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Orders</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Orders List </h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($orders)){ ?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Order.No.</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Photo Received</th>
                  <th>Shipping Required</th>
                  <th>Photo Croped</th>
                  <th>Photo Printed</th>
                  <th>Photo Cutting</th>
                  <th>Pasting Done</th>
                  <th>Checked</th>
                  <th>Packed Done</th>
                  <th>Despatched</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
                <?php foreach($orders as $orderslist){ ?>
                <tr>
                  <td><?php echo $orderslist->ord_reference_id;?></td>
                  <td>
                    <?php $date = $orderslist->ord_created;
                          $newDate = date('d-m-Y', strtotime($date));
                          echo $newDate;
                    ?>
                  </td>
                  <td><?php echo $orderslist->pro_title;?></td>
                  <td>
                    <input type="hidden" name="ordid" value="<?php echo $orderslist->ord_id;?>">
                    <?php if(($orderslist->ord_photo_status)=="1"){?>
                      <a href="#" class="photoReceivedYes" id="photoyes<?php echo $orderslist->ord_id;?>" photoyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_status)=="0"){ ?>
                      <a href="#" class="photoReceivedNo" id="photono<?php echo $orderslist->ord_id;?>" photono="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoReceivedYes" id="photoyes<?php echo $orderslist->ord_id;?>" photoyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoReceivedNo" id="photono<?php echo $orderslist->ord_id;?>" photono="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->ord_shipping_required)=="1"){?>
                      <a href="#" class="shippingYes" id="shippingYes<?php echo $orderslist->ord_id;?>" shippingyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_shipping_required)=="0"){ ?>
                      <a href="#" class="shippingNo" id="shipingNo<?php echo $orderslist->ord_id;?>" shippingno="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="shippingYes" id="shippingYes<?php echo $orderslist->ord_id;?>" shippingyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="shippingNo" id="shipingNo<?php echo $orderslist->ord_id;?>" shippingno="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->ord_photo_croped)=="1"){?>
                      <a href="#" class="photoCropYes" id="photoCropYes<?php echo $orderslist->ord_id;?>" photo_crop_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_croped)=="0"){ ?>
                      <a href="#" class="photoCropNo" id="photoCropNo<?php echo $orderslist->ord_id;?>" photo_crop_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoCropYes" id="photoCropYes<?php echo $orderslist->ord_id;?>" photo_crop_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoCropNo" id="photoCropNo<?php echo $orderslist->ord_id;?>" photo_crop_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->ord_photo_printed)=="1"){?>
                      <a href="#" class="photoPrintedYes" id="photoPrintedYes<?php echo $orderslist->ord_id;?>" photo_printed_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_printed)=="0"){ ?>
                      <a href="#" class="photoPrintedNo" id="photoPrintedNo<?php echo $orderslist->ord_id;?>" photo_printed_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoPrintedYes" id="photoPrintedYes<?php echo $orderslist->ord_id;?>" photo_printed_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoPrintedNo" id="photoPrintedNo<?php echo $orderslist->ord_id;?>" photo_printed_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->ord_photo_cutting)=="1"){?>
                      <a href="#" class="photoCuttingYes" id="photoCuttingYes<?php echo $orderslist->ord_id;?>" photo_cutting_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_cutting)=="0"){ ?>
                      <a href="#" class="photoCuttingNo" id="photoCuttingNo<?php echo $orderslist->ord_id;?>" photo_cutting_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoCuttingYes" id="photoCuttingYes<?php echo $orderslist->ord_id;?>" photo_cutting_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoCuttingNo" id="photoCuttingNo<?php echo $orderslist->ord_id;?>" photo_cutting_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->orf_photo_pasting)=="1"){?>
                      <a href="#" class="photoPastingYes" id="photoPastingYes<?php echo $orderslist->ord_id;?>" photo_pasting_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->orf_photo_pasting)=="0"){ ?>
                      <a href="#" class="photoPastingNo" id="photoPastingNo<?php echo $orderslist->ord_id;?>" photo_pasting_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoPastingYes" id="photoPastingYes<?php echo $orderslist->ord_id;?>" photo_pasting_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoPastingNo" id="photoPastingNo<?php echo $orderslist->ord_id;?>" photo_pasting_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->ord_photo_checked)=="1"){?>
                      <a href="#" class="photoCheckedYes" id="photoCheckedYes<?php echo $orderslist->ord_id;?>" photo_checked_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_checked)=="0"){ ?>
                      <a href="#" class="photoCheckedNo" id="photoCheckedNo<?php echo $orderslist->ord_id;?>" photo_checked_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoCheckedYes" id="photoCheckedYes<?php echo $orderslist->ord_id;?>" photo_checked_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoCheckedNo" id="photoCheckedNo<?php echo $orderslist->ord_id;?>" photo_checked_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->ord_photo_packed)=="1"){?>
                      <a href="#" class="photoPackedYes" id="photoPackedYes<?php echo $orderslist->ord_id;?>" photo_packed_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_packed)=="0"){ ?>
                      <a href="#" class="photoPackedNo" id="photoPackedNo<?php echo $orderslist->ord_id;?>" photo_packed_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoPackedYes" id="photoPackedYes<?php echo $orderslist->ord_id;?>" photo_packed_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoPackedNo" id="photoPackedNo<?php echo $orderslist->ord_id;?>" photo_packed_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($orderslist->ord_photo_despatched)=="1"){?>
                      <a href="#" class="photoDespatchedYes" id="photoDespatchedYes<?php echo $orderslist->ord_id;?>" photo_despatched_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_despatched)=="0"){ ?>
                      <a href="#" class="photoDespatchedNo" id="photoDespatchedNo<?php echo $orderslist->ord_id;?>" photo_despatched_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoDespatchedYes" id="photoDespatchedYes<?php echo $orderslist->ord_id;?>" photo_despatched_yes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoDespatchedNo" id="photoDespatchedNo<?php echo $orderslist->ord_id;?>" photo_despatched_no="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>
                  <td>Remark</td>
                  <td>
                    <!-- <a href="#"><span class="badge bg-green"><i class="fa fa-edit"></i></span></a> -->
                    <a href="javascript:(void)"><span class="badge bg-red disable" disable="<?php echo $orderslist->ord_id?>"><i class="fa fa-trash"></i></span></a>
                  </td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
            <?php }else{ ?>
                <p style="text-align: center;margin-top: 20px;font-weight: bold;padding:30px">You haven't added any records yet!</p>
            <?php } ?>
          </div>
          <!-- /.box -->
          <!-- /.modal -->
          <div class="modal fade" id="productReport">
            <div class="modal-dialog" style="margin-top:8%;width:60%">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title" id="productName"></h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="#" id="picture"  class="img-circle img-responsive"> </div>
                        <div class=" col-md-9 col-lg-9 "> 
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <td>Theme</td>
                                <td id="theme"></td>
                              </tr>
                              <tr>
                                <td>Offers</td>
                                <td><span class="badge bg-green"  id="offers"></span></td>
                              </tr>
                              <tr>
                                <td>Availability</td>
                                <td><span class="badge bg-blue"  id="Available"></span></td>
                              </tr>
                              <tr>
                                <td>Videos</td>
                                <td><span class="badge bg-red"  id="videos"></span></td>
                              </tr>
                              <tr>
                                <td>Required Picture</td>
                                <td><span class="badge bg-orange"  id="ReqPic"></span></td>
                              </tr>
                              <tr>
                                <td>Message On Card</td>
                                <td id="msgCard"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="panel-heading">
                      <h3 class="panel-title">Product Price According size</h3>
                    </div>
                    <div class="panel panel-body">
                      <div class="row">
                        <div class=" col-md-9 col-lg-9 "> 
                          <table class="table table-user-information">
                            <thead>
                              <tr>
                                <th>Size</th>
                                <th>Price</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td id="size"></td>
                                <td id="price"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div> -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

