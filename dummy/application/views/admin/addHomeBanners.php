<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Slider 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home Banners</li>
      </ol>
      <div class="row">
        <!-- left column -->
        <div class="col-md-5">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Home Slider</h3>
              <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/products/save_home_slider');?>" id="formHomeSlider" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="home_slider_title">Slider Title</label>
                  <input type="text" class="form-control" id="home_slider_title" name="home_slider_title" placeholder="Enter Home Slider Name" required="required">
                </div>
                <div class="form-group">
                  <label for="userfile">Slider Images</label>
                  <input type="file" name="userfile" id="userfile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="home_slider_desc">Slider Description</label>
                  <textarea class="form-control" id="home_slider_desc" name="home_slider_desc" placeholder="Enter Home Slider Description"></textarea>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
          <div class="col-md-7">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Home Slider List</h3>
            </div>
            <div class="box-body">
            <?php if(!empty($banners)){ ?>
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">S.N.</th>
                  <th>Title</th>
                  <th>Banner</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($banners as $list){ ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $list->bann_title;?></td>
                  <td><img src="<?php echo base_url();?>/<?php echo $list->bann_picture;?>" style="width:60px;height:40px" class="img-thumbnail"></td>
                  <td>
                    <?php if(($list->bann_status)=='0'){?>
                      <span class="badge bg-green">Active</span>
                    <?php }else{ ?>
                      <span class="badge bg-red">Inactive</span>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if(($list->bann_status)=='1'){ ?>
                    <button type="button" class="btn btn-success btn-sm bannerStatusEnable" bannStatuseE="<?php echo $list->bann_id;?>"><i class="fa fa-check"></i></button>
                    <?php }else{ ?>
                    <button type="button" class="btn btn-sm bannerStatusDisable" bannStatusD="<?php echo $list->bann_id;?>"><i class="fa fa-close" style="color:red"></i></button>
                    <?php } ?>
                    <button type="button" class="btn btn-danger btn-sm bannerDelete" banDel="<?php echo $list->bann_id;?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
            <?php }else{ ?>
              <center><p>No Banner List Found.</p></center>
            <?php } ?>
            </div>
          </div>
          <!-- /.box -->
          </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->