<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Pincode</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pincode List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pincode List <a href="<?php echo base_url('admin/products/pincode');?>" class="btn btn-info btn-sm">Add Pincode</a></h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($pincode)){ ?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">S.No.</th>
                  <th>Pincode</th>
                  <th>Courier Name</th>
                  <th>State</th>
                  <th>State Code</th>
                  <th>City</th>
                  <th>Pick Up Code</th>
                </tr>
                <?php $i=1; foreach($pincode as $pincodelist){ ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $pincodelist->pin_code;?></td>
                  <td><?php echo $pincodelist->pin_courier_name;?></td>
                  <td><?php echo $pincodelist->pin_state_name;?></td>
                  <td><?php echo $pincodelist->pin_state_code;?></td>
                  <td><?php echo $pincodelist->pin_city_name;?></td>
                  <td><?php echo $pincodelist->pin_pick_up;?></td>
                  <!-- <td>
                    <button class="btn btn-info btn-sm btnProductView" proView="<?php echo $productslist->pro_id;?>" data-toggle="modal" data-target="#productReport"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm btnProductsDelete" proDelete="<?php echo $productslist->pro_id;?>"><i class="fa fa-trash"></i></button>
                  </td> -->
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

