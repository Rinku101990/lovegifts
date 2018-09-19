<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php if(!empty($orders)){?>
              <?php foreach($orders as $orderslist){ ?>
                <h3><?php echo $orderslist;?></h3>
              <?php } ?>
            <?php }else{ ?>
              <h3>0</h3>
            <?php } ?>
              <p>All Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php if(!empty($products)){?>
                <?php foreach($products as $productslist){ ?>
                  <h3><?php echo $productslist;?><sup style="font-size: 20px"></sup></h3>
                <?php } ?>
              <?php }else{ ?>
                  <h3>0<sup style="font-size: 20px"></sup></h3>
                <?php } ?>

              <p>All Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php if(!empty($users)){?>
                <?php foreach($users as $userslist){ ?>
                  <h3><?php echo $userslist;?></h3>
                <?php } ?>
              <?php }else{ ?>
                  <h3>0</h3>
              <?php } ?>

              <p>All Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php if(!empty($notification)){?>
                <?php foreach($notification as $notice){ ?>
                  <h3><?php echo $notice;?></h3>
                <?php } ?>
              <?php }else{ ?>
                  <h3>0</h3>
              <?php } ?>

              <p>All Notification</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
