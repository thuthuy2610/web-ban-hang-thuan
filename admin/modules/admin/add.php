<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = [
         "name" => postname("namecate"),
         "email"=> postname("email"),
         "phone"=> postname("phone"),
         "address"=> postname("address"),
         "password"=>md5(postname("pass")),
         "level"=> postname("level")
      ];
      $error = [];
      if (postname("namecate") == '') {
         $error['namecate'] = 'Bạn cần nhập tên';
      }

      if (postname("email") == '') {
         $error['email'] = 'Nhập email';
      }else{
         $isset1 = $db->fetchOne("admin","email = '".$data['email']."'");
         if($isset1 != null){
            $error['email'] = 'Email đã tồn tại!';
         }
      }

      if (postname("phone") == '') {
         $error['phone'] = 'Nhập số điện thoại';
      }else{
         $isset2 = $db->fetchOne("admin","phone = '".$data['phone']."'");
         if($isset2 != null){
            $error['phone'] = 'Số điện thoại đã tồn tại!';
         }
      }

      if (!isset($_FILES['avatar'])) {
         $error['avatar'] = 'Bạn cần chọn hình ảnh';
      }

      if (postname("address") == '') {
         $error['address'] = 'Nhập địa chỉ';
      }

      if (postname("pass") == '') {
         $error['pass'] = 'Nhập mật khẩu';
      }

      if (md5(postname("re_pass")) != $data['password']) {
         $error['re_pass'] = 'Mật khẩu không khớp! Nhập lại!';
      }


      if (empty($error)) {
         if(isset($_FILES['avatar'])){
            $file_name = $_FILES['avatar']['name'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $file_type = $_FILES['avatar']['type'];
            $file_erro = $_FILES['avatar']['error'];
            if ($file_erro == 0) {
               $part = ROOT."admin/";
               $data['avatar'] = $file_name;
            }
         }
         
         $isset = $db->fetchOne("admin","name = '".$data['name']."'");

         if(count($isset)>0){

            $_SESSION['errortim']="Tên danh mục đã tồn tại!";

         }else{

            $id = $db->insert('admin',$data);
            if ($id>0) {
               @move_uploaded_file($file_tmp, $part.$file_name);
               $_SESSION['success'] = "Thêm mới thành công";
               redirectAdmin("admin");
            }else{
               $_SESSION['error']="Thêm mới thất bại";
            }
         }
      }
    }
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <h1>Thêm mới người quản trị</h1>
</div>
<div class="col-lg-12">
   <form role="form" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label for="exampleInputEmail1">Name user</label>
         <div class="col-lg-8">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate">
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
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="abc@email.com" name="email">
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
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="014345436" name="phone">
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
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="abc" name="address">
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
            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="abc" name="pass">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['pass'])):?>
               <p class="text-danger"><?php echo $error['pass']; ?></p>
            <?php endif ?>
         </div>
      </div>

      <div class="form-group">
         <label for="exampleInputEmail1">ConfigPassword</label>
         <div class="col-lg-3">
            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="abc" name="re_pass">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['re_pass'])):?>
               <p class="text-danger"><?php echo $error['re_pass']; ?></p>
            <?php endif ?>
         </div>
      </div>

       <div class="form-group">
         <label for="exampleInputEmail1">Level</label>
         <div class="col-lg-3">
            <select class="form-control" name="level">
               <option value="1">CTV</option>
               <option value="2">Admin</option>
            </select>
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

         
      </div>
      <button type="submit" class="btn btn-info ">Save</button>
</form>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>