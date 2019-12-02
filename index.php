<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php require_once __DIR__. "/layouts/header.php";?>
      <div class="header_slide">
         <div class="header_bottom_left">
            <div class="categories">
               <ul>
                  <h3>Categories</h3>
                  <?php $cate = $db->fetchAll('category') ?>
                  <?php foreach ($cate as  $value) {?>
                     <li><a href="<?php echo base_url();?>main.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                  <?php } ?>
               </ul>
            </div>
         </div>
         <div class="header_bottom_right">
            <div class="slider">
               <div id="slider">
                  <div id="mover">
                     <div id="slide-1" class="slide">
                        <div class="slider-img">
                           <a href="<?php echo base_url(); ?>productcate.php"><img src="<?php echo base_url() ?>public/frontend/images/slide-1-image.png" alt="learn more" /></a>                              
                        </div>
                        <div class="slider-text">
                           <h1>Clearance<br><span>SALE</span></h1>
                           <h2>UPTo 20% OFF</h2>
                           <div class="features_list">
                              <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
                           </div>
                           <a href="<?php echo base_url(); ?>productcate.php" class="button">Shop Now</a>
                        </div>
                        <div class="clear"></div>
                     </div>
                     <div class="slide">
                        <div class="slider-text">
                           <h1>Clearance<br><span>SALE</span></h1>
                           <h2>UPTo 40% OFF</h2>
                           <div class="features_list">
                              <h4>Get to Know More About Our Memorable Services</h4>
                           </div>
                           <a href="<?php echo base_url(); ?>productcate.php" class="button">Shop Now</a>
                        </div>
                        <div class="slider-img">
                           <a href="<?php echo base_url(); ?>productcate.php"><img src="<?php echo base_url() ?>public/frontend/images/slide-3-image.jpg" alt="learn more" /></a>
                        </div>
                        <div class="clear"></div>
                     </div>
                     <div class="slide">
                        <div class="slider-img">
                           <a href="<?php echo base_url(); ?>productcate.php"><img src="<?php echo base_url() ?>public/frontend/images/slide-2-image.jpg" alt="learn more" /></a>
                        </div>
                        <div class="slider-text">
                           <h1>Clearance<br><span>SALE</span></h1>
                           <h2>UPTo 10% OFF</h2>
                           <div class="features_list">
                              <h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
                           </div>
                           <a href="<?php echo base_url(); ?>productcate.php" class="button">Shop Now</a>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
            </div>
         </div>
         <div class="clear"></div>
      </div>
      </div>
      <div class="main">
         <div class="content">
            <div class="content_top">
               <div class="heading">
                  <h3>New Products</h3>
               </div>
               <div class="see">
                  <p><a href="<?php echo base_url();?>productcate.php">See all Products</a></p>
               </div>
               <div class="clear"></div>
            </div>
            <div class="section group">
               <?php 
                  $sql = "select * from product ORDER BY created_at DESC LIMIT 0 ,4";

                  $pro = $db->fetchsql($sql);
                  foreach ($pro as $pro) {?>
                     <div class="grid_1_of_4 images_1_of_4">
                        <a href="<?php echo base_url(); ?>preview.php?idpro=<?php echo $pro['id']; ?>"><img src="<?php echo base_url() ?>public/uploads/products/<?php echo $pro['thunbar'] ?>" alt="" /></a>
                        <h2><?php echo $pro['name'] ?></h2>
                        <div class="price-details">
                           <div class="price-number">
                              <p><span class="rupees"><?php echo $pro['price'] ?></span></p>
                           </div>
                           <div class="add-cart">
                              <h4><a href="<?php echo base_url(); ?>giohang.php?id=<?php echo $pro['id']; ?>">Add to Cart</a></h4>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                  <?php } ?>
            </div>
            <div class="content_bottom">
               <div class="heading">
                  <h3>Feature Products</h3>
               </div>
               <div class="see">
                  <p><a href="#">See all Products</a></p>
               </div>
               <div class="clear"></div>
            </div>
            <div class="section group">
               <?php 
                  $sql = "select * from product LIMIT 0 ,4";

                  $pro = $db->fetchsql($sql);
                  foreach ($pro as $pro) {?>
                     <div class="grid_1_of_4 images_1_of_4">
                        <a href="<?php echo base_url(); ?>preview.php?idpro=<?php echo $pro['id']; ?>"><img src="<?php echo base_url() ?>public/uploads/products/<?php echo $pro['thunbar'] ?>" alt="" /></a>
                        <h2><?php echo $pro['name'] ?></h2>
                        <div class="price-details">
                           <div class="price-number">
                              <p><span class="rupees"><?php echo $pro['price'] ?></span></p>
                           </div>
                           <div class="add-cart">
                              <h4><a href="<?php echo base_url(); ?>giohang.php?id=<?php echo $pro['id']; ?>">Add to Cart</a></h4>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                  <?php } ?>
            </div>
         </div>
      </div>
   </div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>