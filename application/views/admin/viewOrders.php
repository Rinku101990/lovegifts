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
            <?php if(!empty($category)){ ?>
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                <?php foreach($category as $ordlist){ ?>
                  <a href="<?php echo base_url('admin/products/getOrderListByCategoryId');?>/<?php echo $ordlist->cate_id;?>" class="btn btn-success btn-sm"><?php echo $ordlist->cate_name;?></a>
                <?php } ?>
                </div>
              </div><br />
            </div>
            <?php }else{ ?>
                <p style="text-align: center;margin-top: 20px;font-weight: bold;padding:30px">You haven't added any records yet!</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
