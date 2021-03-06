<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Products</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Products List <a href="<?php echo base_url('admin/products/add');?>" class="btn btn-info btn-sm">Add Products</a></h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($products)){ ?>
            <div class="box-body" style="overflow-x:scroll;width:100%">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Title</th>
                  <th>Theme</th>
                  <th>Message On Card</th>
                  <th>Offers</th>
                  <th style="width: 30px">Videos</th>
                  <th style="width:90px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($products as $productslist){ ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $productslist->pro_title;?></td>
                  <td><?php echo $productslist->pro_theme;?></td>
                  <td><?php echo $productslist->pro_message_on_card;?></td>
                  <td><span class="badge bg-green"><?php echo $productslist->pro_offers;?></span></td>
                  <td>
                      <?php $thumbnail = $productslist->pro_videos; ?>
                      <?php if($thumbnail!=''){?>
                        <img src="https://img.youtube.com/vi/<?php echo $thumbnail; ?>/hqdefault.jpg" width="50" />
                      <?php }else{ ?>
                        NA
                      <?php } ?>
                  </td>
                  <td>
                    <button class="btn btn-info btn-sm btnProductView" proView="<?php echo $productslist->pro_id;?>" data-toggle="modal" data-target="#productReport"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-primary btn-sm"><a href="<?php echo base_url('admin/products/edit');?>/<?php echo $productslist->pro_id;?>" style="color:#fff"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-danger btn-sm btnProductsDelete" proDelete="<?php echo $productslist->pro_id;?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <?php }else{ ?>
                <p style="text-align: center;margin-top: 20px;font-weight: bold;padding:30px">You haven't added any records yet!</p>
              <?php } ?>
          <!-- /.box -->
          <!-- /.modal -->
          <div class="modal fade" id="productReport">
            <div class="modal-dialog" style="width:60%">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title" id="productName"></h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center" id="proPic"></div>
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
                              <!-- <tr>
                                <td>Availability</td>
                                <td><span class="badge bg-blue"  id="Available"></span></td>
                              </tr> -->
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
                        <div class=" col-md-12 col-lg-12 "> 
                          <table class="table table-user-information">
                            <thead>
                              <tr>
                                <th>Product Size</th>
                                <th>Product Price</th>
                              </tr>
                            </thead>
                            <tbody id="priceData"> 
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

