<?php 
    require_once __DIR__. "/../../autoload/autoload.php";

    if (isset($_GET['id'])) {
      $id      = intval(getInput("id"));
      $edituser = $db->fetchID("user",$id);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = [
         "name" => postname("namecate"),
         "email"=> postname("email"),
         "phone"=> postname("phone"),
         "address"=> postname("address"),
         "password"=>postname("pass")
      ];
      $error = [];
      if (postname("namecate") == '') {
         $error['namecate'] = 'Bạn cần nhập tên sản phẩm';
      }

      if (postname("email") == '') {
         $error['email'] = 'Bạn cần nhập giá sản phẩm';
      }
      if (postname("phone") == '') {
         $error['phone'] = 'Bạn cần nhập phần trăm sale';
      }

      if (!isset($_FILES['avatar'])) {
         $error['avatar'] = 'Bạn cần chọn hình ảnh';
      }

      if (postname("address") == '') {
         $error['address'] = 'Bạn chọn danh mục sản phẩm';
      }

      if (postname("pass") == '') {
         $error['pass'] = 'Bạn chọn danh mục sản phẩm';
      }

      if (empty($edituser)) {
         if (empty($error)) {
            if(isset($_FILES['avatar'])){
               $file_name = $_FILES['avatar']['name'];
               $file_tmp = $_FILES['avatar']['tmp_name'];
               $file_type = $_FILES['avatar']['type'];
               $file_erro = $_FILES['avatar']['error'];
               if ($file_erro == 0) {
                  $part = ROOT."user/";
                  $data['avatar'] = $file_name;
               }
            }
            
            $isset = $db->fetchOne("user","name = '".$data['name']."'");

            if(count($isset)>0){

               $_SESSION['errortim']="Tên danh mục đã tồn tại!";

            }else{

               $id = $db->update('user',$data,array("id"=>$id));
               if ($id>0) {
                  @move_uploaded_file($file_tmp, $part.$file_name);
                  $_SESSION['success'] = "Thêm mới thành công";
                  redirectAdmin("user");
               }else{
                  $_SESSION['error']="Thêm mới thất bại";
               }
            }
         }

      } else {
         if(isset($_FILES['avatar'])){
            $file_name = $_FILES['avatar']['name'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $file_type = $_FILES['avatar']['type'];
            $file_erro = $_FILES['avatar']['error'];
            if ($file_erro == 0) {
               $part = ROOT."user/";
               $data['avatar'] = $file_name;
            }
         }
         $id = $db->update('user',$data,array("id"=>$id));
         if ($id>0) {
            @move_uploaded_file($file_tmp, $part.$file_name);
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdmin("user");
         }else{
            $_SESSION['error']="Thông tin không thay đổi";
            redirectAdmin("user");
         }
      }
      
      
    }
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <h1>Sửa người dùng</h1>
</div>
<div class="col-lg-12">
   <form role="form" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label for="exampleInputEmail1">Name user</label>
         <div class="col-lg-8">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate" value="<?php echo $edituser['name'];?>">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['namecate'])):?>
               <p class="text-danger"><?php echo $error['namecate']; ?></p>
            <?php endif ?>
            <?php if (isset($_SESSION['errortim'])):?>
               <p class="text-danger"><?php echo $_SESSION['errortim']; unset($_SESSION['errortim']);?></p>
            <?php endif ?>
         </div>
         
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Email</label>
         <div class="col-lg-3">
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="abc@email.com" name="email" value="<?php echo $edituser['email'];?>">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['email'])):?>
               <p class="text-danger"><?php echo $error['email']; ?></p>
            <?php endif ?>
         </div>
         
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Phone</label>
         <div class="col-lg-3">
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="014345436" name="phone" value="<?php echo $edituser['phone'];?>">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['phone'])):?>
               <p class="text-danger"><?php echo $error['phone']; ?></p>
            <?php endif ?>
         </div>
         
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Address</label>
         <div class="col-lg-3">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="abc" name="address" value="<?php echo $edituser['address'];?>">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['address'])):?>
               <p class="text-danger"><?php echo $error['address']; ?></p>
            <?php endif ?>
         </div>
      </div>

      <div class="form-group">
         <label for="exampleInputEmail1">Password</label>
         <div class="col-lg-3">
            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="abc" name="pass" value="<?php echo $edituser['password'];?>">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['pass'])):?>
               <p class="text-danger"><?php echo $error['pass']; ?></p>
            <?php endif ?>
         </div>
      </div>

      <div class="form-group">
         <label for="exampleInputEmail1">Avatar</label>
         <div class="col-lg-5">
            <input type="file" class="form-control" id="exampleInputEmail1" placeholder="00" name="avatar">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['avatar'])):?>
               <p class="text-danger"><?php echo $error['avatar']; ?></p>
            <?php endif ?>
         </div>

         <img src="<?php echo uploads() ?>user/<?php echo $edituser['avatar'] ?>" width="50px" height="50px">
         
      </div>
      <button type="submit" class="btn btn-info ">Save</button>
</form>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>