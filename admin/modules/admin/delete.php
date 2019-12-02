<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $id  = intval(getInput("id"));
    $editcate = $db->fetchID("admin",$id);
    if (empty($editcate)) {
      $_SESSION['error'] = "Khong ton tai du lieu";
      redirectAdmin("admin");
    }
    
    $level = $db->fetchOne("admin","id='".$id."'");
    if($level['level'] == 1 ){
      $num = $db->delete("admin",$id);
      if ($num>0) {
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("admin");
      }else{
        $_SESSION['error']="Dữ liệu không thay đổi";
        redirectAdmin("admin");
      }
    }
 ?>