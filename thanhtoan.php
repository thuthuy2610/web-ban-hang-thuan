<?php require_once __DIR__. "/autoload/autoload.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = [
         "fullname" => postname("namecate"),
         "email"=> postname("email"),
         "phone"=> postname("phone"),
         "address"=> postname("address")
      ];

      if (isset($_SESSION['name_id'])) {
      	$data['user_id']=$_SESSION['name_id'];
      }else{
      	$data['user_id']=0;
      }

      $data['total_price']=$_SESSION['tongtien'];


      $error = [];
      if (postname("namecate") == '') {
         $error['namecate'] = 'Bạn cần nhập tên';
      }

      if (postname("email") == '') {
         $error['email'] = 'Nhập email';
      }

      if (postname("phone") == '') {
         $error['phone'] = 'Nhập số điện thoại';
      }


      if (postname("address") == '') {
         $error['address'] = 'Nhập địa chỉ';
      }

      if (empty($error)) {

            $id = $db->insert('userorder',$data);
            if ($id>0) {
              $i=0;
               foreach ($_SESSION['card'] as $key => $value) {
	            	$pro['pro'] = [
	            		"`order-id`" => $id,
	            		"`product-id`"=> $value['id'],
	            		"`price`"=>$value['price'],
	            		"`quantity`"=>$value['qty']
	            	];
                $sql = "UPDATE `product` SET soluong = soluong - ".$value['qty']." WHERE id = '".$value['id']."'";
	            	$ud = $db->insert('`order-detail`',$pro['pro']);
                $p[] = $db->fetchsql($sql);
	            }

            }
            unset($_SESSION['card']);
      		  unset($_SESSION['tongtien']);
            header("location:index.php");
      }

      
    }
?>
<?php require_once __DIR__. "/layouts/header.php";?> </div>
    <h1>Thanh toán</h1>
<div class="col-lg-12" style="margin-top: 30px; margin-left: 200px">
   <form role="form" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group" style="overflow: unset;">
         <label for="exampleInputEmail1">Name user</label>
         <div class="col-lg-4">
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
      <div class="form-group" style="overflow: unset;">
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
      <div class="form-group" style="overflow: unset;">
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
      <div class="form-group" style="overflow: unset;">
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
         
      </div>
      <button type="submit" class="btn btn-info " style="margin-top: 20px; margin-left: 200px">Thanh toán</button>
</form>
</div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>