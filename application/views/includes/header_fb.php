<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125554669-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125554669-1');
</script>
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-125554669-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon-32x32.png');?>" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon-16x16.png');?>"" sizes="16x16" />

<meta charset="utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<?php if(!empty($meta_info)){ ?>
<?php foreach($meta_info as $meta){ ?>
<meta name="description" content="<?php echo $meta->meta_description;?>" />
<meta name="keywords" content="<?php echo $meta->meta_keywords;?>" />
<?php } }else{ ?>
<meta name="description" content="lovegifts.in : Online Shopping India - Gift for Husband, Wife, Girlfriend, Boyfriend, hubby, Friend, Best Friend, Teacher, Father, Mother, Sister, Brother, Grand Father, Grand Mother, Uncle and Aunty. Free Shipping &amp; Cash on Delivery Available." />
<meta name="keywords" content="Love Gifts is where we make Personalized Gifts, Free Shipping in India, Cash on Delivery available, Love Explosion Box, Scrapbook, Perfect Gift for Best Friends, Surprise Photo Cube, Birthday Explosion Box, Gift your Loved ones Memories, Name Frame (Small), Love Couple Explosion Box - The Perfect Gift, Free Shipping all over India, Perfect Gift for your Love, Gift with 44 Photos, Gift for her, Gift for him, Surprise Gift, Personalized Gifts, lovegifts.in, Gift for my Love, Best Love gift for my love, Best Love gift for my husband, Best gift for my husband, Best gift for my friend, Best gift for my husband, gift for my best friend, best gift for my best friend, unique gift, occasion gift, gift for husband, gift for friend, gift for girlfriend, gift for boyfriend, best gift for girlfriend, best gift for boyfriend, unique gift for girlfriend, unique gift for boyfriend, gift for mother, best gift for wife, gift for teacher, gift for sister, gift for girls, gift for boys, gift for men, gift box, surprise gift box, love box gift, best gift for sweetheart, best gift for my love, gift for special one, gift for beloved, anniversary gift for wife, anniversary gift for husband, special anniversary gift for husband, special anniversary gift for wife, valentine&#39;s Day speacial gift, gift for valentine&#39;s Day, valentine&#39;s special, valentines day, valentine&#39;s day gift, valentine gifts for husband, valentine day gift for boyfriend, creative valentines day gifts for boyfriend, valentine day gift for girlfriend, creative valentines day gifts for girlfriend, diy gifts that say i love you, valentine&#39;s day gifts for her, valentine&#39;s day gifts for him, valentine gifts for wife, valentine special, gift for lady, gift for dear one, gift for hubby, Best Gift in Vadodara City, Best Gift in Mumbai City, Best Gift in Bengaluru City, Best Gift in Chennai City, Best Gift in Pune City, Best Gift in Hyderabad City, Best Gift in Kolkata City, Best Gift in Ahmedabad City, Best Gift in Jaipur City, Best Gift in Surat City, Best Gift in Delhi City, Best Gift in Chandigarh City, Best Gift in Indore City, Best Gift in Coimbatore City, Best Gift in Bhopal City, Best Gift in Nagpur City, Best Gift in Gurugram City, Best Gift in Kanpur City, Best Gift in Lucknow City, Best Gift in Kochi City, Best Gift in Agra City, Best Gift in Patna City, Best Gift in Madurai City, Best Gift in Thiruvananthapuram City, Best Gift in Bhubaneswar City, Best Gift in Varanasi City, Best Gift in Ludhiana City, Best Gift in Mysore City, Best Gift in Noida City, Best Gift in Mangalore City, Best Gift in Faridabad City, Best Gift in Amritsar City, Best Gift in Raipur City, Best Gift in Allahabad City, Best Gift in Vijayawada City, Best Gift in Aurangabad City, Best Gift in Gwalior City, Best Gift in Ranchi City, Best Gift in Jabalpur City, Best Gift in Meerut City, Best Gift in Jamshedpur City, Best Gift in Tiruchirappalli City, Best Gift in Dehradun City, Best Gift in Asansol City, Best Gift in Thane City, Best Gift in Visakhapatnam City, Best Gift in Ghaziabad City, Best Gift in Nashik City, Best Gift in Rajkot City, Best Gift in Dhanbad City" />
<?php } ?>
<?php if(!empty($productView)){ ?>
<?php foreach($productView as $title){?>
<title><?php echo $title->pro_title;?>- The Perfect Gift | Free Shipping all over India | lovegifts.in</title>
<?php } }else{ ?>
	<title>Lovegifts.in - Suprise Gifts for Husband | Wife | Boyfriend | Girlfriend | Anniversary | Wedding | Birthday and More
</title>
<?php } ?>
<!--Bootstrap-->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" />
<link href="<?php echo base_url('assets/');?>/css/full-slider.css" rel="stylesheet">
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
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url('assets/fontnew/style.css');?>" />

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '306573526599878');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=306573526599878&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<?php if(!empty($title->pro_facebook_pixel)){ ?>
<?php echo $title->pro_facebook_pixel;?>
<?php }else{ ?>
<?php } ?>

<script type="text/javascript"> //<![CDATA[ 
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.comodo.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
</head>
