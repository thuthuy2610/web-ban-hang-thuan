<!DOCTYPE HTML>
<head>
   <title>Free Home Shoppe Website Template | Home :: w3layouts</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <base href="/">
   <link href="<?php echo base_url() ?>public/frontend/css/style.css" rel="stylesheet" type="text/css" media="all"/>
   <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/fonts/material-icon/css/material-design-iconic-font.min.css">
    <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/js/easing.js"></script>
    <script src="<?php echo base_url() ?>public/frontend/js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/js/startstop-slider.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/js/jquery.accordion.js"></script>
    <link href="<?php echo base_url() ?>public/frontend/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/global.css">
    <link href="<?php echo base_url() ?>public/frontend/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="<?php echo base_url() ?>public/frontend/js/slides.min.jquery.js"></script>
    <script src="<?php echo base_url() ?>public/frontend/js/main.js"></script>
    <script src="<?php echo base_url() ?>public/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>public/frontend/js/main.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script>
          $(function(){
              $('#products').slides({
                  preload: true,
                  preloadImage: 'img/loading.gif',
                  effect: 'slide, fade',
                  crossfade: true,
                  slideSpeed: 350,
                  fadeSpeed: 500,
                  generateNextPrev: true,
                  generatePagination: false
              });
          });
      </script>
      <script type="text/javascript">
          $(document).ready(function() {
            $("#posts").accordion({ 
              header: "div.tab", 
              alwaysOpen: false,
              autoheight: false
            });
          });
      </script>
</head>
<body>
   <div class="wrap">
      <div class="header">
         <div class="headertop_desc">
            <div class="call">
               <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
            </div>
            <div class="account_desc">
               <ul>
                  <?php 
                      if (isset($_SESSION['name_user'])) {?>
                        <li style="color: red">Xin chào <?php echo $_SESSION['name_user']; ?>!</li>
                        <li><a href="<?php echo base_url(); ?>myaccount.php">My Account</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="<?php echo base_url();?>/thoat.php">Checkout</a></li>
                        
                  <?php }else{?>
                      <li><a href="<?php echo base_url(); ?>dangky.php">Register</a></li>
                      <li><a href="<?php echo base_url(); ?>dangnhap.php">Login</a></li>
                      <li><a href="<?php echo base_url(); ?>login/index.php">Login Admin</a></li>
                  <?php }?>
                  
               </ul>
            </div>
            <div class="clear"></div>
         </div>
         <div class="header_top">
            <div class="logo">
               <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/public/frontend/images/logo.png"></a>
            </div>
            <div class="cart">
               <p>Welcome to our Online Store! <span><a href="<?php echo base_url();?>addtocard.php" style="text-decoration: none;color: red;">Cart:</a></span>
               <div id="dd" class="wrapper-dropdown-2">
                  <?php $i=0; $sum=0;
                  if (isset($_SESSION['card'])) {
                    foreach ($_SESSION['card'] as $key => $value) {
                      $i+=$value['qty'];
                      $sum+=$value['qty']*$value['price'];
                    }
                    ?> <?php echo $i; ?>item(s) - $ <?php echo $sum; ?>
                  <?php }else{?>

                     0 item(s) - $0.00 <?php } ?>
                  <ul class="dropdown">
                     <li>
                     </li>
                  </ul>
               </div>
               </p>
            </div>
            <script type="text/javascript">
               function DropDown(el) {
                  this.dd = el;
                  this.initEvents();
               }
               DropDown.prototype = {
                  initEvents : function() {
                     var obj = this;
               
                     obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        event.stopPropagation();
                     });   
                  }
               }
               
               $(function() {
               
                  var dd = new DropDown( $('#dd') );
               
                  $(document).click(function() {
                     // all dropdowns
                     $('.wrapper-dropdown-2').removeClass('active');
                  });
               
               });  
            </script>
            <div class="clear"></div>
         </div>
         <div class="header_bottom">
            <div class="menu">
               <ul>
                  <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
                  <li><a href="<?php echo base_url();?>productcate.php">Categories</a>
                    <ul class="sub-menu">
                      <?php $cate = $db->fetchAll('category') ?>
                      <?php foreach ($cate as  $value) {?>
                         <li><a href="<?php echo base_url();?>main.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                      <?php } ?>
                        
                     </ul> 
                  </li>
                  <li><a href="<?php echo base_url();?>about.php">About</a></li>
                  <li><a href="<?php echo base_url();?>delivery.php">Delivery</a></li>
                  <li><a href="<?php echo base_url();?>news.php">News</a></li>
                  <li><a href="<?php echo base_url();?>contact.php">Contact</a></li>
                  <div class="clear"></div>
               </ul>
            </div>
            <div class="search_box">
               <form action="<?php echo base_url();?>main.php" method="get">
                  <input type="text" placeholder="Search" name="search"><input type="submit" value="">
               </form>
            </div>
            <div class="clear"></div>
         </div>
         