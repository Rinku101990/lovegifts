<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Category</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Category</li>
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
              <h3 class="box-title">Edit Category</h3>
              <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formUpdateCategory" method="post">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_category">Category Name</label>
                      <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $edit_info->cate_id;?>">
                      <input type="text" class="form-control" id="pro_category" placeholder="Enter Category Name" name="pro_category" value="<?php echo $edit_info->cate_name;?>">
                      <span id="error_title" class="text-danger"></span>
                       <span id="error_title1" class="text-primary"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_category_status">Category Status</label>
                      <select name="pro_category_status" id="pro_category_status" class="form-control">
                        <option value="0" <?php echo $edit_info->cate_status=='0'?'selected':''?>>Active</option>
                        <option value="1" <?php echo $edit_info->cate_status=='1'?'selected':''?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="btnUpdateCategory">Update Category</button>
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

