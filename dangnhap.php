<?php require_once __DIR__. "/autoload/autoload.php"; 
	if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = [
         "email"=> postname("email"),
         "password"=>md5(postname("pass"))
      ];
      $error = [];
      if (postname("email") == '') {
         $error['email'] = 'Nhập email';
      }

      if (postname("pass") == '') {
         $error['pass'] = 'Nhập mật khẩu';
      }


      if (empty($error)) {
         
         $isset = $db->fetchOne("user","email = '".$data['email']."' AND password ='".$data['password']."'");

         if(count($isset)>0){

            $_SESSION['name_user'] = $isset['name'];
            $_SESSION['name_id']   = $isset['id'];

            echo "<script>alert('Đăng nhập thành công!'); location.href='index.php';</script>";

         }else{
            $_SESSION['error']="Đăng nhập thất bại";
         }
      }
    }

?>
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

<div class="main1">
	
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
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
                <div class="signin-image">
                    <figure><img src="<?php echo base_url();?>public/frontend/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">Create an account</a>
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="ohs767515@gmail.com"/>

                            <div class="col-lg-8">
					            <?php if (isset($error['email'])):?>
					               <p class="text-danger"><?php echo $error['email']; ?></p>
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
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" style="float: left;" />
                            <p style="float: left; padding-left: 30px"><a href="<?php echo base_url(); ?>index.php" id="signin" class="form-submit">Back</a></p>
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>