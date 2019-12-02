<?php require_once __DIR__. "/autoload/autoload.php"; 
	if (!isset($_SESSION['card']) || count($_SESSION['card'])==0) {
		echo "<script>alert('Không có sản phẩm trong giỏ hàng!'); location.href='index.php';</script>";
	}
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
	<?php if(isset($_SESSION['success'])){ ?>
      <div class="alert alert-success col-lg-8">
         <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
      </div>
    <?php } ?>
	<div class="table-responsive-xl" style="padding-top: 20px">
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Image</th>
		      <th scope="col">Mount</th>
		      <th scope="col">Price</th>
		      <th scope="col">Sum</th>
		      <th scope="col">Act</th>
		    </tr>
		  </thead>
		  <tbody id="tbody">

		  	<?php if (isset($_SESSION['card'])) {
		  		$sum=0; $i=1; 
		  		foreach ($_SESSION['card'] as $key => $value): ?>
		  		<tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $value['name']; ?></td>
			      <td><img src="<?php echo uploads() ?>products/<?php echo $value['thunbar'] ?>" width="80px" height="80px" alt=""></td>
                  <td><input type="number" name="qty" id="qty" style="width: 70px" min="1" max="<?php if(isset($value['soluong'])){echo $value['soluong'];}?>" value="<?php echo $value['qty']; ?>" class='form-control' /></td>
			      <td><?php echo $value['price']; ?></td>
			      <td><?php $sum+=$value['price']*$value['qty']; echo $value['price']*$value['qty']; ?></td>
			      <td>
			      	<a class="btn btn-xs btn-info updatecart" href="" data-key= <?php echo $key ?>><i class="fa fa-refresh" aria-hidden="true"></i>Update</a>
                    <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>remove.php?key=<?php echo $key; ?>"><i class="fa fa-remove"></i>Delete</a>
                   </td>
			    </tr>
		  	<?php endforeach ?>
		    <?php $_SESSION['tongtien'] = $sum; } ?>
		  </tbody>
		</table>

		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item">
					<span class="badge" style="font-size: 20px; color: red">Tổng tiền: <?php if(isset( $_SESSION['tongtien'])){echo $_SESSION['tongtien'];} ?>đ</span></li>
				</ul>

				<li class="list-group-item">
					<span>
						<a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>thanhtoan.php"></i>Thanh toán</a>
						<a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>index.php">Tiếp tục mua hàng</a>
					</span>
				</li>
		</div>
	</div>

	<script type="text/javascript">
		$(function(){
         $updatecart = $(".updatecart");
         $updatecart.click(function (e){
            e.preventDefault();
            $qty = $(this).parents("#tbody").find("#qty").val();

            $key = $(this).attr("data-key");
            $.ajax({
               url: 'http://localhost:8080/tastyphp/capnhatgiohang.php',
               type: 'GET',
               data: {'qty': $qty,'key':$key},
               success:function(data){
                  if (data == 1) {
                     alert("Cap nhat gio hanh thanh cong");
                     header("location:addtocard.php");
                  }
               }
            });
         })
      })
	</script>
<?php require_once __DIR__. "/layouts/footer.php"; ?>