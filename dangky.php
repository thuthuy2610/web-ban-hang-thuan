<?php require_once __DIR__. "/autoload/autoload.php"; 

	if (isset($_SESSION['name_user'])) {
		echo "<script>alert('Đã đăng nhập không thể sử dụng tính năng này!'); location.href='index.php';</script>";
	}
	if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = [
         "name" => postname("name"),
         "email"=> postname("email"),
         "phone"=> postname("phone"),
         "address"=> postname("address"),
         "password"=>md5(postname("pass"))
      ];
      $error = [];
      if (postname("name") == '') {
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
         
         $isset = $db->fetchOne("user","name = '".$data['name']."'");

         if(count($isset)>0){

            $_SESSION['errortim']="Tên danh mục đã tồn tại!";

         }else{

            $id = $db->insert('user',$data);
            if ($id>0) {
               @move_uploaded_file($file_tmp, $part.$file_name);
               $_SESSION['success'] = "Thêm mới thành công";
               redirect("dangnhap.php");
            }else{
               $_SESSION['error']="Thêm mới thất bại";
            }
         }
      }
    }
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>

	<div class="main1">
    <!-- Sign up form -->
    <section class="singup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
				    <?php if(isset($_SESSION['error'])){ ?>
				      <div class="alert alert-danger col-lg-8">
				         <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
				      </div>
				    <?php } ?>
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>

                            <div class="col-lg-8">
				            <?php if (isset($error['namecate'])):?>
				               <p class="text-danger"><?php echo $error['namecate']; ?></p>
				            <?php endif ?>
				         </div>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>

                            <div class="col-lg-8">
					            <?php if (isset($error['email'])):?>
					               <p class="text-danger"><?php echo $error['email']; ?></p>
					            <?php endif ?>
					         </div>
                        </div>

                        <div class="form-group">
                            <label for="address"><i class="zmdi zmdi-assignment-account"></i></label>
                            <input type="text" name="address" id="address" placeholder="Address"/>
							
							<div class="col-lg-8">
				            <?php if (isset($error['address'])):?>
				               <p class="text-danger"><?php echo $error['address']; ?></p>
				            <?php endif ?>
				         </div>
                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="zmdi zmdi-account-box-phone"></i></label>
                            <input type="text" name="phone" id="phone" placeholder="0975795038"/>

                            <div class="col-lg-8">
				            <?php if (isset($error['phone'])):?>
				               <p class="text-danger"><?php echo $error['phone']; ?></p>
				            <?php endif ?>
				         </div>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>

                            <div class="col-lg-8">
				            <?php if (isset($error['pass'])):?>
				               <p class="text-danger"><?php echo $error['pass']; ?></p>
				            <?php endif ?>
				         </div>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>

                            <div class="col-lg-8">
				            <?php if (isset($error['re-pass'])):?>
				               <p class="text-danger"><?php echo $error['re-pass']; ?></p>
				            <?php endif ?>
				         </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?php echo base_url();?>public/frontend/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>