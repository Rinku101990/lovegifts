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
              <h3 class="box-title">Products List <a href="<?php echo base_url('admin/products/add');?>" class="btn btn-info btn-sm">Add Products</a> <a href="<?php echo base_url('admin/products/view');?>" class="btn btn-info btn-sm">active Products</a></h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($disabled)){ ?>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">S.No.</th>
                  <th>Title</th>
                  <th>Theme</th>
                  <th>Message On Card</th>
                  <th>Availability</th>
                  <th>Offers</th>
                  <th style="width: 40px">Videos</th>
                  <th>Action</th>
                </tr>
                <?php $i=1; foreach($disabled as $productslist){ ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $productslist->pro_title;?></td>
                  <td><?php echo $productslist->pro_theme;?></td>
                  <td><?php echo $productslist->pro_message_on_card;?></td>
                  <td>
                    <span class="badge bg-green"><?php echo $productslist->pro_required_picture;?></span>
                  </td>
                  <td><span class="badge bg-red"><?php echo $productslist->pro_offers;?></span></td>
                  <td><span class="badge bg-orange"><?php echo $productslist->pro_videos;?></span></td>
                  <td>
                    <button class="btn btn-primary btn-sm btnProductsEnable" proEnable="<?php echo $productslist->pro_id;?>"><i class="fa fa-eye"></i></button>
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

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

