<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Pincode</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Import Pincode</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Import Pincode <a href="<?php echo base_url('admin/products/view_pincode');?>" class="btn btn-info btn-sm">View Pincode</a></h3>
              <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('admin/products/upload_pincode');?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="uploadFile">Import Pincode</label>
                      <input type="file" id="uploadFile" name="uploadFile" class="form-control" disabled="disabled">
                      <span id="error_pro_pincode" class="text-danger"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" name="submit" class="btn btn-primary pull-right" id="btnSavePincode" value="Upload Excel" disabled="disabled">
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

