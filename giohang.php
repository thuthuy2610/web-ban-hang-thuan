<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php 
      	$id  = intval(getInput("id"));
      	$product = $db->fetchID("product",$id);

      	if (!isset($_SESSION['card'][$id])) {
      		$_SESSION['card'][$id]['name']=$product['name'];
      		$_SESSION['card'][$id]['price']=((100-$product['sale'])*$product['price'])/100;
      		$_SESSION['card'][$id]['qty'] = 1;
      		$_SESSION['card'][$id]['thunbar']=$product['thunbar'];	
      		$_SESSION['card'][$id]['soluong']=$product['soluong'];
                  $_SESSION['card'][$id]['id']=$product['id'];		
      	} else {
      		$_SESSION['card'][$id]['qty'] += 1;
      	}
      	
      	echo "<script>alert('Thêm sản phẩm thành công!'); location.href='addtocard.php';</script>";
 ?>