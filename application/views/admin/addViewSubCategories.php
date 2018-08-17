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
              <h3 class="box-title">Add Sub Category</h3>
              <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formSubCategory" method="post">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_category">Category</label>
                      <select name="pro_category" id="pro_category" class="form-control">
                        <option>Please select</option>
                        <?php foreach($category as $cat_list){?>
                        <option value="<?php echo $cat_list->cate_id;?>"><?php echo $cat_list->cate_name;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_sub_category">Sub Category Name</label>
                       <input type="text" class="form-control" id="pro_sub_category" placeholder="Enter Sub Category Name" name="pro_sub_category" required="required">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_category_status"> Sub Category Status</label>
                      <select name="pro_category_status" id="pro_category_status" class="form-control">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url('admin/products/category');?>" class="btn btn-primary pull-left">Add Category</a>
                <button type="submit" class="btn btn-primary pull-right" id="btnSaveSubCategory">Save Sub Category</button>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sub Category List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <?php if(!empty($subcategory)){?>
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Sub Category Name</th>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($subcategory as $subcat_list){?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $subcat_list->scate_name;?></td>
                  <td><?php echo $subcat_list->cate_name;?></td>
                  <td>
                    <?php if($subcat_list->scate_status=='0'){?>
                      <span class="badge bg-green">Active</span>
                    <?php }else{ ?>
                      <span class="badge bg-red">Inactive</span>
                    <?php } ?>
                  </td>
                  <td>
                    <button class="btn btn-info btn-sm viewScate" eyeScate="<?php echo $subcat_list->scate_id;?>" data-toggle="modal" data-target="#ScatReport"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-primary btn-sm"><a href="<?php echo base_url('admin/products/edit_scate');?>/<?php echo $subcat_list->scate_id;?>" style="color:#fff"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-danger btn-sm removeScate" deleteScate="<?php echo $subcat_list->scate_id;?>"><i class="fa fa-trash"></i></button>
                  </td>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            <?php }else{ ?>
              <center><p><b>No Category Found!</b></p></center>
            <?php } ?>
            </div>
          </div>
          <!-- /.modal -->
          <div class="modal fade" id="ScatReport">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">Sub Category Information</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class=" col-md-12 col-lg-12"> 
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <th>Sub Cateory</th>
                                <td>Category Name</td>
                                <td>Status</td>
                                <td>Created</td>
                              </tr>
                              <tr>
                                <td id="scate_name"></td>
                                <td id="cate_name"></td>
                                <td id="scate_status"></td>
                                <td id="screated"></td>
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
          <!-- /.box -->
        </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

