<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $id  = intval(getInput("id"));
    $editcate = $db->fetchID("category",$id);
    if (empty($editcate)) {
      $_SESSION['erroredit'] = "Khong ton tai du lieu";
      redirectAdmin("category");
    }
    
    $num = $db->delete("category",$id);
    if ($num>0) {
      $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("category");
    }else{
      $_SESSION['error']="Dữ liệu không thay đổi";
      redirectAdmin("category");
    }
 ?>