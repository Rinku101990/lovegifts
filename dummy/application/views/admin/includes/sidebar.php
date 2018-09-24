<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/admin_assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Lovegifts.in</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-flag"></i> <span>Manage Banners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/products/banners');?>"><i class="fa fa-circle-o"></i>Add Home Banners</a></li></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Manage Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/products/category');?>"><i class="fa fa-circle-o"></i>Add/View Category</a></li>
            <li><a href="<?php echo base_url('admin/products/sub_category');?>"><i class="fa fa-circle-o"></i>Add/View Sub Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Manage Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/products/add');?>"><i class="fa fa-circle-o"></i> Add Products</a></li>
            <li><a href="<?php echo base_url('admin/products/view');?>"><i class="fa fa-circle-o"></i> View Products</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Manage Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/products/pincode');?>"><i class="fa fa-circle-o"></i>Pincode</a></li>
            <li><a href="<?php echo base_url('admin/products/temp_orders');?>"><i class="fa fa-circle-o"></i>Incomplete Order</a></li>
            <li><a href="<?php echo base_url('admin/products/orders');?>"><i class="fa fa-circle-o"></i>Orders</a></li>
          </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>