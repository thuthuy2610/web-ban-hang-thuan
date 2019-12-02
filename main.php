<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
   <?php if(isset($_SESSION['success'])){ ?>
      <div class="alert alert-success col-lg-8">
         <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
      </div>
    <?php } ?>
    <?php if(isset($_SESSION['error'])){ ?>
      <div class="alert alert-danger col-lg-8">
         <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php } ?>
      <div class="main">
         <div class="content">
            <div class="content_top">
               <div class="heading">
                  <h3>Products</h3>
               </div>
               <div class="see">
                  <p><a href="<?php echo base_url();?>productcate.php">See all Products</a></p>
               </div>
               <div class="clear"></div>
            </div>
            <div class="section group">
            <?php 
               if(isset($_GET['id'])){
                  $id  = intval(getInput("id"));
                  $editcate = $db->fetchID("category",$id);
                  if (empty($editcate)) {
                     $_SESSION['error'] = "Khong ton tai du lieu";
                     redirect("index.php");
                  }else{
                     $sql = "select * from `product` where `category_id`= $id";

                     $pro = $db->fetchsql($sql);
                     foreach ($pro as $pro) {?>
                           <div class="grid_1_of_4 images_1_of_4">
                              <a href="<?php echo base_url(); ?>preview.php?idpro=<?php echo $pro['id']; ?>"><img src="<?php echo base_url(); ?>public/uploads/products/<?php echo $pro['thunbar']; ?>" alt="" /></a>
                              <h2><?php echo $pro['name']; ?></h2>
                              <div class="price-details">
                                 <div class="price-number">
                                    <p><span class="rupees"><?php echo $pro['price'];?></span></p>
                                 </div>
                                 <div class="add-cart">
                                    <h4><a href="<?php echo base_url(); ?>giohang.php?id=<?php echo $pro['id']; ?>">Add to Cart</a></h4>
                                 </div>
                              </div>
                           </div>
                  <?php }
            } }?>


            <?php 
               if (isset($_GET['search'])) {
                  $search = $_GET['search'];
                  $sql = "select * from `product` where `name`like '%$search%'";

                  $pro = $db->fetchsql($sql);
                  if (!empty($pro)){
                     foreach ($pro as $pro) {?>
                           <div class="grid_1_of_4 images_1_of_4">
                              <a href="preview.html"><img src="<?php echo base_url(); ?>public/uploads/products/<?php echo $pro['thunbar']; ?>" alt="" /></a>
                              <h2><?php echo $pro['name']; ?></h2>
                              <div class="price-details">
                                 <div class="price-number">
                                    <p><span class="rupees"><?php echo $pro['price'];?></span></p>
                                 </div>
                                 <div class="add-cart">
                                    <h4><a href="<?php echo base_url(); ?>preview.php?idpro=<?php echo $pro['id']; ?>">Add to Cart</a></h4>
                                 </div>
                              </div>
                           </div>
               <?php }
            }
         }?>
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>