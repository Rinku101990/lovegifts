<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Incomplete Order list</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Incomplete Order list</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Incomplete Order list</h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($temp_orders)){ ?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">S.No.</th>
                  <th>Customer Name</th>
                  <th>Mobile No</th>
                  <th>Address</th>
                  <th>Product Name</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                <?php foreach($temp_orders as $temp_customer_checkout){ ?>
                <tr>
                  <td><a href="#" data-toggle="modal" data-target="#tempCustoInfo"><span class="badge bg-blue viewtempCustomers" viewTempCusto="<?php echo $temp_customer_checkout->tmp_custo_id;?>"><i class="fa fa-eye"></i></span></a></td>
                  <td><?php echo $temp_customer_checkout->tmp_custo_fname;?></td>
                  <td><?php echo $temp_customer_checkout->tmp_custo_cmob;?></td>
                  <td><?php echo $temp_customer_checkout->tmp_custo_add1.','.$temp_customer_checkout->tmp_custo_landmark.','.$temp_customer_checkout->tmp_custo_add2.'-'.$temp_customer_checkout->tmp_custo_pincode;?></td>
                  <td><?php echo $temp_customer_checkout->pro_title;?></td>
                  <td><?php echo $temp_customer_checkout->tmp_custo_size;?></td>
                  <td><?php echo $temp_customer_checkout->tmp_custo_price;?></td>
                  <td><a href="#" class="deleteTempCustomers" delTempCusto="<?php echo $temp_customer_checkout->tmp_custo_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a></td>
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
          <div class="modal fade" id="tempCustoInfo">
            <div class="modal-dialog" style="margin-top:5%;width:85%">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title" id="productName">Customer Information</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <!-- <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="#" id="picture"  class="img-circle img-responsive"> </div> -->
                        <div class=" col-md-12 col-lg-12 "> 
                          <table class="table table-bordered">
                            <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile No</th>
                              <th>Address</th>
                              <th>City/State</th>
                              <th>Pincode</th>
                              <th>Order Status</th>
                            </tr>
                            <tr>
                              <td><span id="name"></span></td>
                              <td><span id="email"></span></td>
                              <td><span id="mobile"></span></td>
                              <td><span id="address"></span></td>
                              <td><span id="city"></span>/<span id="state"></span></td>
                              <td><span id="pincode"></span></td>
                              <td><span id="status"></span></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="panel-heading">
                      <h3 class="panel-title">Product Information</h3>
                    </div>
                    <div class="panel panel-body">
                      <div class="row">
                        <div class=" col-md-12 col-lg-12 "> 
                          <table class="table table-bordered">
                             <tr>
                              <th>Product Name</th>
                              <th>Product Size</th>
                              <th>Products Price</th>
                            </tr>
                            <tr>
                              <td><span id="pname"></span></td>
                              <td><span id="psize"></span></td>
                              <td><span id="pprice"></span></td>
                            </tr>
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
    <!-- /.content -->
        </div>
      </div>
    </section>
  </div>

