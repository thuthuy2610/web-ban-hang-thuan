<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $id  = intval(getInput("id"));
    $editcate = $db->fetchID("user",$id);
    if (empty($editcate)) {
      $_SESSION['error'] = "Khong ton tai du lieu";
      redirectAdmin("user");
    }
    
    $num = $db->delete("user",$id);
    if ($num>0) {
      $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("user");
    }else{
      $_SESSION['error']="Dữ liệu không thay đổi";
      redirectAdmin("user");
    }
 ?>