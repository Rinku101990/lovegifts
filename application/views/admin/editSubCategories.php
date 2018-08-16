<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Sub Category</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Sub Category</li>
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
              <h3 class="box-title">Update Sub Category</h3>
              <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formUpdateSubCategory" method="post">
              <div class="box-body">
                <?php foreach($sub_edit_info as $sub_cat){ ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_category">Category</label>
                      <select name="pro_category" id="pro_category" class="form-control">
                        <option>Please select</option>
                        <?php foreach($category as $cat_list){?>
                        <option value="<?php echo $cat_list->cate_id;?>" <?php echo $cat_list->cate_name==$sub_cat->cate_name?'selected':''?>><?php echo $cat_list->cate_name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_sub_category">Sub Category Name</label>
                      <input type="hidden" name="sub_cat_id" id="sub_cat_id" value="<?php echo $sub_cat->scate_id;?>">
                      <input type="text" class="form-control" id="pro_sub_category" placeholder="Enter Sub Category Name" name="pro_sub_category" value="<?php echo $sub_cat->scate_name;?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_sub_category_status"> Sub Category Status</label>
                      <select name="pro_sub_category_status" id="pro_sub_category_status" class="form-control">
                        <option value="0" <?php echo $sub_cat->scate_status=='0'?'selected':''?>>Active</option>
                        <option value="1" <?php echo $sub_cat->scate_status=='1'?'selected':''?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="btnUpdateSubCategory">Save Sub Category</button>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

