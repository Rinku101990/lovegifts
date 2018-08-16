<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<?php if(!empty($meta_info)){ ?>
<?php foreach($meta_info as $meta){ ?>
<meta name="description" content="<?php echo $meta->meta_description;?>" />
<meta name="keywords" content="<?php echo $meta->meta_keywords;?>" />
<?php } }else{ ?>
<meta name="description" content="Surprice gifts" />
<meta name="keywords" content="Surprice gifts" />
<?php } ?>
<?php if(!empty($productView)){ ?>
<?php foreach($productView as $title){?>
<title>Love Gifts | <?php echo $title->pro_title;?></title>
<?php } }else{ ?>
	<title>Love Gifts | Surprice gifts</title>
<?php } ?>
<!--Bootstrap-->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" />
<link href="<?php echo base_url('assets/');?>css/full-slider.css" rel="stylesheet">
<!--Bootstrap-->
<!--Main Menu File-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('assets/css/webslidemenu.css');?>" />
<!--Main Menu File-->
<!-- font awesome -->
<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" />
<!-- font awesome -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('assets/css/style.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css');?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('assets/css/style.css');?>" />
<?php if(!empty($title->pro_facebook_pixel)){ ?>
<?php echo $title->pro_facebook_pixel;?>
<?php }else{ ?>
<?php } ?>
</head>