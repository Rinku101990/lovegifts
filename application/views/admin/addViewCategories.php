<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Category</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Category</li>
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
              <h3 class="box-title">Add Category</h3>
              <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formCategory" method="post">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_category">Category Name</label>
                      <input type="text" class="form-control" id="pro_category" placeholder="Enter Category Name" name="pro_category" required="required">
                      <span id="error_title" class="text-danger"></span>
                       <span id="error_title1" class="text-primary"></span>
                    </div>
                  </div>
                  <div class="input_fields_container_cate_ord_track">
                    <div class="col-md-8">
                      <label for="pro_cate_ord_track">Order Tracking Stage</label>
                        <input type="text" name="pro_cate_ord_track[]" placeholder="Enter Field Title" class="form-control" style="width:111%"  required="required">&nbsp;
                     </div>
                    <div class="col-md-3" style="margin-top:7%">
                      <button class="btn btn-primary input_fields_container_cate_ord_track_button">Add Fields</button>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_category_status">Category Status</label>
                      <select name="pro_category_status" id="pro_category_status" class="form-control">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url('admin/products/sub_category');?>" class="btn btn-primary pull-left">Add Sub Category</a>
                <button type="submit" class="btn btn-primary pull-right" id="btnSaveCategory">Save Category</button>
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
              <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <?php if(!empty($category)){?>
              <table class="table table-bordered">
                <tr>
                  <th>S.N.</th>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php $i=1; foreach($category as $cat_list){?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $cat_list->cate_name;?></td>
                  <td>
                    <?php if($cat_list->cate_status=='0'){?>
                      <span class="badge bg-green">Active</span>
                    <?php }else{ ?>
                      <span class="badge bg-red">Inactive</span>
                    <?php } ?>
                  </td>
                  <td>
                    <button class="btn btn-info btn-sm viewCate" eyeCate="<?php echo $cat_list->cate_id;?>" data-toggle="modal" data-target="#cateReport"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-primary btn-sm"><a href="<?php echo base_url('admin/products/edit_cate');?>/<?php echo $cat_list->cate_id;?>" style="color:#fff"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-danger btn-sm removeCate" deleteCate="<?php echo $cat_list->cate_id;?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <?php } ?>
              </table>
            <?php }else{ ?>
              <center><p><b>No Category Found!</b></p></center>
            <?php } ?>
            </div>
          </div>
           <!-- /.modal -->
          <div class="modal fade" id="cateReport">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title">Category Information</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class=" col-md-12 col-lg-12"> 
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <td>Category Name</td>
                                <td>Status</td>
                                <td>Created</td>
                              </tr>
                              <tr>
                                <td id="cate_name"></td>
                                <td id="cate_status"></td>
                                <td id="created"></td>
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
      </div>
    </section>
    <!-- /.content -->
  </div>
