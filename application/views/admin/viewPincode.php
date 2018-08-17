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
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">S.No.</th>
                  <th>Pincode</th>
                  <th>Courier Name</th>
                  <th>State</th>
                  <th>State Code</th>
                  <th>City</th>
                  <th>Pick Up Code</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($pincode as $pincodelist){ ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $pincodelist->pin_code;?></td>
                  <td><?php echo $pincodelist->pin_courier_name;?></td>
                  <td><?php echo $pincodelist->pin_state_name;?></td>
                  <td><?php echo $pincodelist->pin_state_code;?></td>
                  <td><?php echo $pincodelist->pin_city_name;?></td>
                  <td><?php echo $pincodelist->pin_pick_up;?></td>
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

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

