<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Products</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Product <a href="<?php echo base_url('admin/products/view');?>" class="btn btn-info btn-sm">View Products</a> <a href="<?php echo base_url('admin/products/disabled');?>" class="btn btn-info btn-sm">Inactive Products</a></h3>
              <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formUpdateProduct" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <?php foreach($edit_info as $products){ ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_title">Product Title</label>
                      <input type="hidden" name="productid" id="productid" value="<?php echo $products->pro_id;?>">
                      <input type="text" class="form-control" id="pro_title" placeholder="Enter Product Title" name="pro_title" autofocus="autofocus" value="<?php echo $products->pro_title;?>">
                      <span id="error_pro_title" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_theme">Product Theme</label>
                      <input type="text" class="form-control" id="pro_theme" placeholder="Enter Product Theme" name="pro_theme" value="<?php echo $products->pro_theme;?>">
                      <span id="error_pro_theme" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_offers">Product Offers</label>
                      <input type="text" class="form-control" id="pro_offers" name="pro_offers" placeholder="Enter Product Offers" required="required" value="<?php echo $products->pro_offers;?>">
                      <span id="error_pro_offers" class="text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_video">Product Video Link</label>
                      <input type="text" class="form-control" id="pro_video" placeholder="Enter Product Video" name="pro_video" required="required" value="<?php echo $products->pro_videos;?>">
                      <span id="error_pro_video" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_required_pic">Product Required Picture</label>
                      <input type="text" class="form-control" id="pro_required_pic" placeholder="Enter no of required picture" name="pro_required_pic" value="<?php echo $products->pro_required_picture;?>">
                      <span id="error_pro_required_pic" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_message_on_card">Message On Card</label>
                      <input type="text" class="form-control" id="pro_message_on_card" placeholder="Enter message on card" name="pro_message_on_card" value="<?php echo $products->pro_message_on_card;?>">
                      <span id="error_pro_message_on_card" class="text-danger"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="deliverd_to">Product Deliver To</label>
                      <input type="number" name="deliverd_to" required id="deliverd_to" class="form-control" placeholder="Delivery Day To" value="<?php echo $products->pro_delivery_days_to;?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="deliverd_from">Product Deliver From</label>
                      <input type="number" name="deliverd_from" required id="deliverd_from" class="form-control" placeholder="Delivery Day From" value="<?php echo $products->pro_delivery_days_from;?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_desc">Product Description</label>
                      <textarea class="form-control" rows="5" id="pro_desc" name="pro_desc"><?php echo $products->pro_description;?></textarea>
                      <span id="error_pro_desc" class="text-danger"></span>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_message_on_card">Product Images</label>
                      <input type="file" name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <?php foreach($edit_pic as $pictures){ ?>
                      <img src="<?php echo base_url();?>/<?php echo $pictures->pic_param;?>" style="width:70px;height:70px;border:1px solid">
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="pro_size">Product Size</label>
                    <div class="input_fields_container_size">
                      <?php foreach($edit_size as $sizes){ ?>
                      <input type="text" name="pro_size[]" placeholder="Enter product size" value="<?php echo $sizes->size_param;?>">&nbsp;
                      <input type="text" name="pro_price[]" placeholder="Enter Product price" value="<?php echo $sizes->size_related_price;?>">
                      <?php } ?>
                      <button class="btn btn-sm btn-primary add_more_button_size">Add Fields</button>
                    </div>
                  </div>
                </div><br />
                <div class="row">
                  <?php foreach($edit_meta as $meta){ ?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" name="meta_title" class="form-control" required id="meta_title" placeholder="Enter Meta Title" value="<?php echo $meta->meta_title;?>">
                      <span id="error_meta_title" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <input type="text" name="meta_keywords" class="form-control" required id="meta_keywords" placeholder="Enter Meta Keywords" value="<?php echo $meta->meta_keywords;?>">
                      <span id="error_meta_keywords" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <textarea name="meta_description" rows="5" class="form-control" required id="meta_description" placeholder="Enter Meta Description"><?php echo $meta->meta_description;?></textarea>
                      <span id="error_meta_description" class="text-danger"></span>
                    </div>
                  </div>
                 <?php } ?>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="btnUpdateProduct">Update Product</button>
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