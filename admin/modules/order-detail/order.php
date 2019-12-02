<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $id  = intval(getInput("id"));
    $editcate = $db->fetchID("userorder",$id);

    $admin = $db->fetchAll("user");

    if (empty($editcate)) {
      $_SESSION['erroredit'] = "Khong ton tai du lieu";
      redirectAdmin("order-detail");
    }

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $data = [
         "status" => '1'
      ];
       $id = $db->update('tastyphp.`userorder`',$data,array("id"=>$id));
     }
    
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <h1>Thêm mới danh mục</h1>
</div>
<div class="col-lg-12">
   <form role="form" action="" method="POST">
      <div class="form-group">
         <label for="exampleInputEmail1">Name user</label>
         <div class="col-lg-5">
            <?php
               foreach ($admin as $value) {
                  if ($value['id'] == $editcate['user_id']) {
                  
               ?>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate" value="<?php echo $value['name'];?>" readonly>

            <?php }
              } ?>
         </div>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Total price</label>
         <div class="col-lg-5">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate" value="<?php echo $editcate['total_price'];?>" readonly>
         </div>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Email</label>
         <div class="col-lg-5">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate" value="<?php echo $editcate['email'];?>" readonly>
         </div>
      </div>

      <div class="form-group">
         <label for="exampleInputEmail1">Address</label>
         <div class="col-lg-5">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate" value="<?php echo $editcate['address'];?>" readonly>
         </div>
      </div>

      <div class="form-group">
         <label for="exampleInputEmail1">Phone</label>
         <div class="col-lg-5">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate" value="<?php echo $editcate['phone'];?>" readonly>
         </div>
      </div>

      <div class="form-group">
         <label for="exampleInputEmail1">Status</label>
         <div class="col-lg-5">
            <?php if($editcate['status'] == 0){ ?>
               <a href='order.php?id= <?php echo $editcate['id'];?>'class='btn btn-success'>Xác nhận</a>
             <?php }else{?>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate" value="<?php echo "Đã xác nhận đơn hàng.";?>" readonly>
             <?php }?>
         </div>
         
      </div>
      <a href='index.php'class='btn btn-success'>Trở về</a>
</form>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>