<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $id  = intval(getInput("id"));
    $editcate = $db->fetchID("product",$id);
    if (empty($editcate)) {
      $_SESSION['erroredit'] = "Khong ton tai du lieu";
      redirectAdmin("product");
    }
    
    $num = $db->delete("product",$id);
    if ($num>0) {
      $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("product");
    }else{
      $_SESSION['error']="Dữ liệu không thay đổi";
      redirectAdmin("product");
    }
 ?>