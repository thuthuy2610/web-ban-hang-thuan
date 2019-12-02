<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
      <div class="main">
         <div class="content">
            <div class="section group">
            <?php
               $pro = $db->fetchAll("product");
               foreach ($pro as $pro) {?>
                     <div class="grid_1_of_4 images_1_of_4 col-lo-4">
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
            <?php }?>
         </div>
      </div>
   </div>
</div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>