<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Products</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Products</li>
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
              <h3 class="box-title">Add Product 
                <a href="<?php echo base_url('admin/products/view');?>" class="btn btn-info btn-sm">View Products</a> 
                <a href="<?php echo base_url('admin/products/disabled');?>" class="btn btn-info btn-sm">Inactive Products</a>
                <?php $success= $this->session->flashdata('message'); if(!empty($success)) { ?>
                  <?php echo $this->session->flashdata('message'); ?>
                <?php } ?>
              </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="formProduct" action="<?php echo base_url('admin/products/saveProducts');?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="pro_category">Product Category</label>
                    <select class="form-control" name="pro_category" id="pro_category" required>
                    <option></option>
                    <?php foreach($category as $cate_list){?>
                      <option value="<?php echo $cate_list->cate_id;?>"><?php echo $cate_list->cate_name;?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_title">Product Title</label>
                      <input type="text" class="form-control" id="pro_title" placeholder="Enter Product Title" name="pro_title"required="required" >
                      <span id="error_title" class="text-primary"></span>
                      <span id="error_title1" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_theme">Product Theme</label>
                      <input type="text" class="form-control" id="pro_theme" placeholder="Enter Product Theme" name="pro_theme">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="pro_offers_price">Offers Price</label>
                      <input type="number" class="form-control" id="pro_offers_price" name="pro_offers_price" placeholder="Enter Offers Price">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="pro_offers_desc">Offers Description</label>
                      <input type="text" class="form-control" id="pro_offers_desc" name="pro_offers_desc" placeholder="Enter Offers Description">
                     </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_video">Video Link</label>
                      <input type="text" class="form-control" id="pro_video" placeholder="Enter Product Video" name="pro_video">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_required_pic">Product Required Picture</label>
                      <input type="text" class="form-control" id="pro_required_pic" name="pro_required_pic" required="required">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_message_on_card">Message On Card</label>
                      <input type="text" class="form-control" id="pro_message_on_card" placeholder="Enter message on card" name="pro_message_on_card"  required="required">
                     </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="deliverd_to">Deliver To</label>
                      <input type="number" name="deliverd_to" required id="deliverd_to" class="form-control" placeholder="Delivery Day To"  required="required">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="deliverd_from">Deliver From</label>
                      <input type="number" name="deliverd_from" required id="deliverd_from" class="form-control" placeholder="Delivery Day From"  required="required">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pro_message_on_card">Product Images</label>
                      <input type="file" name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple  required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="free_shipping">Free Shipping</label>
                      <select name="free_shipping" id="free_shipping" class="form-control">
                        <option value="0">Yes</option>
                        <option value="1">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="product_on_cod">Product On COD(Cash On Delivery)</label>
                      <select name="product_on_cod" id="product_on_cod" class="form-control">
                        <option value="0">Yes</option>
                        <option value="1">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="price_with_photo">Price with Photos</label>
                      <select name="price_with_photo" id="price_with_photo" class="form-control">
                        <option value="0">Yes</option>
                        <option value="1">No</option>
                      </select>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pro_desc">Description</label>
                      <textarea class="form-control" rows="5" id="pro_desc" name="pro_desc"></textarea>
                     </div>
                  </div>
                  <div class="col-md-6">
                    <label for="pro_size">Product Size</label>
                    <div class="input_fields_container_size">
                      <input type="text" name="pro_size[]" placeholder="Enter product size" required="required">&nbsp;
                      <input type="text" name="pro_price[]" placeholder="Enter Product price"  required="required">
                      <button class="btn btn-sm btn-primary add_more_button_size">Add Fields</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="pro_size">Add Extra Field</label>
                    <div class="input_fields_container_size_extra">
                      <input type="text" name="extra_field_title[]" placeholder="Enter Field Title">&nbsp;
                      <input type="text" name="extra_field_value[]" placeholder="Enter Field Value">
                      <button class="btn btn-sm btn-primary add_more_button_size_extra">Add Fields</button>
                    </div>
                  </div>
                </div><br />
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" name="meta_title" class="form-control" required id="meta_title" placeholder="Enter Meta Title"  required="required">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="meta_keywords">Meta Keywords</label>
                      <input type="text" name="meta_keywords" class="form-control" required id="meta_keywords" placeholder="Enter Meta Keywords"  required="required">
                     </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="meta_description">Meta Description</label>
                      <textarea name="meta_description" rows="5" class="form-control" required id="meta_description" placeholder="Enter Meta Description"  required="required"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="facebook_pixel">Facebook Pixel</label>
                      <textarea name="facebook_pixel" rows="5" class="form-control" id="facebook_pixel" placeholder="Enter Facebook Pixel Script"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" id="btnSaveProduct">Save Product</button>
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
