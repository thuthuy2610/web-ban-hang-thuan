<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php 
      	$key  = intval(getInput("key"));
      	
      	unset($_SESSION['card'][$key]);
      	
      	$_SESSION['success'] = "Xóa sản phẩm thành công";

      	header("location:addtocard.php");
 ?>