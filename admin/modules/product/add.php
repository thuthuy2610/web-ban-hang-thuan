<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $category = $db->fetchAll("category");
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = [
         "name" => postname("namecate"),
         "slg" => to_slug(postname("namecate")),
         "price"=> postname("price"),
         "sale"=> postname("sale"),
         "soluong"=> postname("soluong"),
         "category_id"=>postname("category_id"),
         "content"=>postname("content")
      ];
      $error = [];
      if (postname("namecate") == '') {
         $error['namecate'] = 'Bạn cần nhập tên sản phẩm';
      }

      if (postname("price") == '') {
         $error['price'] = 'Bạn cần nhập giá sản phẩm';
      }
      if (postname("sale") == '') {
         $error['sale'] = 'Bạn cần nhập phần trăm sale';
      }

      if (!isset($_FILES['thunbar'])) {
         $error['thunbar'] = 'Bạn cần chọn hình ảnh';
      }

      if (postname("category_id") == '') {
         $error['category'] = 'Bạn chọn danh mục sản phẩm';
      }

      if (postname("content") == '') {
         $error['content'] = 'Bạn chọn danh mục sản phẩm';
      }

      if (postname("soluong") == '') {
         $error['soluong'] = 'Bạn nhập số lượng sản phẩm.';
      }

      if (empty($error)) {
         if(isset($_FILES['thunbar'])){
            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];
            if ($file_erro == 0) {
               $part = ROOT."products/";
               $data['thunbar'] = $file_name;
            }
         }
         
         $isset = $db->fetchOne("product","name = '".$data['name']."'");

         if(count($isset)>0){

            $_SESSION['errortim']="Tên danh mục đã tồn tại!";

         }else{

            $id = $db->insert('product',$data);
            if ($id>0) {
               @move_uploaded_file($file_tmp, $part.$file_name);
               $_SESSION['successproduct'] = "Thêm mới thành công";
               redirectAdmin("product");
            }else{
               $_SESSION['errorproduct']="Thêm mới thất bại";
            }
         }
      }
    }
 ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <h1>Thêm mới sản phẩm</h1>
</div>
<div class="col-lg-12">
   <form role="form" action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
         <label for="exampleInputEmail1">Name product</label>
         <div class="col-lg-8">
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
      <div class="form-group">
         <label for="exampleInputEmail1">Price product</label>
         <div class="col-lg-3">
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="9.000.000" name="price">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['price'])):?>
               <p class="text-danger"><?php echo $error['price']; ?></p>
            <?php endif ?>
         </div>
         
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Amount product</label>
         <div class="col-lg-3">
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="100" name="soluong">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['soluong'])):?>
               <p class="text-danger"><?php echo $error['soluong']; ?></p>
            <?php endif ?>
         </div>
         
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Sale</label>
         <div class="col-lg-3">
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="00" name="sale">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['sale'])):?>
               <p class="text-danger"><?php echo $error['sale']; ?></p>
            <?php endif ?>
         </div>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Thunbar</label>
         <div class="col-lg-5">
            <input type="file" class="form-control" id="exampleInputEmail1" placeholder="00" name="thunbar">
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['thunbar'])):?>
               <p class="text-danger"><?php echo $error['thunbar']; ?></p>
            <?php endif ?>
         </div>
         
      </div>
       <div class="form-group">
         <label for="exampleInputEmail1">Category</label>
         <div class="col-lg-3">
            <select name="category_id" id="" class="col-lg-8 form-control ">
               <option value="">--Mời bạn chọn--</option>
               <?php foreach ($category as $items) {?>
                  <option value="<?php echo $items['id'] ?>"><?php echo $items['name'] ?></option>
               <?php } ?>
            </select> 
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['category'])):?>
               <p class="text-danger"><?php echo $error['category']; ?></p>
            <?php endif ?>
         </div>
         
      </div>

      <div class="form-group">
         <label for="exampleInputEmail1">Content</label>
         <div class="col-lg-8">
            <textarea class="form-control" name="content" rows="4"></textarea>
         </div>
         <div class="col-lg-8">
            <?php if (isset($error['content'])):?>
               <p class="text-danger"><?php echo $error['content']; ?></p>
            <?php endif ?>
         </div>
         
      </div>
      <button type="submit" class="btn btn-info ">Save</button>
</form>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>