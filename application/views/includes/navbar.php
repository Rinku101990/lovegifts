<div class="wsmain" >
  <div class="smllogo">
    <a href="<?php echo base_url();?>">
      <img src="<?php echo base_url('assets/images/logored.png');?>" alt="" style="margin-left: -25px"/>
    </a>
  </div>
    <nav class="wsmenu clearfix" >
      <ul class="mobile-sub wsmenu-list" style="font-weight:500"> 
        <li><a href="<?php echo base_url('');?>">Home</a></li>
        <li><a href="#" >Our Products</a>
          <ul class="wsmenu-submenu" >
            <?php if(!empty($category)){?>
            <?php foreach($category as $category_list){?>
            <li ><a href="<?php echo base_url();?>"><?php echo $category_list->cate_name;?></a></li>
            <?php } } ?>
          </ul>
        </li>
        <li><a href="<?php echo base_url('send_photo');?>">How To Send Photos</a></li>
        <li><a href="<?php echo base_url('track');?>">Track your order</a></li>
        <li><a href="<?php echo base_url('contacts');?>">Contact us</a></li>
      </ul>
    </nav>
  </div>
</div> 
</div>
<!--Menu HTML Code-->