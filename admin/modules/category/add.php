<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = [
         "name" => postname("namecate"),
         "slug" => to_slug(postname("namecate"))
      ];
      $error = [];
      if (postname("namecate") == '') {
         $error['namecate'] = 'Ban can nhap ten hang';
      }

      if (empty($error)) {
         $isset = $db->fetchOne("category","name = '".$data['name']."'");

         if(count($isset)>0){
            $_SESSION['errortim']="Tên danh mục đã tồn tại!";
         }else{
            $id = $db->insert('category',$data);
            if ($id>0) {
               $_SESSION['success'] = "Thêm mới thành công";
               redirectAdmin("category");
            }else{
               $_SESSION['error']="Thêm mới thất bại";
            }
         }
      }
    }
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <h1>Thêm mới danh mục</h1>
</div>
<div class="col-lg-12">
   <form role="form" action="" method="POST">
      <div class="form-group">
         <label for="exampleInputEmail1">Name category</label>
         <div class="col-lg-8">
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="namecate">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['namecate'])):?>
               <p class="text-danger"><?php echo $error['namecate']; ?></p>
            <?php endif ?>
            <?php if (isset($_SESSION['errortim'])):?>
               <p class="text-danger"><?php echo $_SESSION['errortim']; unset($_SESSION['errortim']); ?></p>
            <?php endif ?>
         </div>
         
      </div>
      <button type="submit" class="btn btn-info ">Save</button>
</form>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>