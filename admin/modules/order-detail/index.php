<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
 ?>

<!--  phân trang -->
 <?php 
   if (isset($_GET['page'])) {
      $p=$_GET['page'];
   } else {
      $p=1;
   }

   $sql = "select tastyphp.`order-detail`.*,tastyphp.`product`.name as namepro from tastyphp.`order-detail` left join tastyphp.`product` on tastyphp.`order-detail`.`product-id` = tastyphp.`product`.id";

   $order = $db->fetchJone("tastyphp.`order-detail`",$sql,$p,2,true);

   if (isset($order['page'])) {
      $sotrang = $order['page'];
      unset($order['page']);
   }

   
  ?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <h1>Order Detail</h1>
    <hr>
    <p>This is a great starting point for new custom pages.</p>
    <div class="clearfix"></div>
    <?php if(isset($_SESSION['successproduct'])){ ?>
      <div class="alert alert-success">
         <?php echo $_SESSION['successproduct']; unset($_SESSION['successproduct']); ?>
      </div>
    <?php } ?>
    <?php if(isset($_SESSION['errorproduct'])){ ?>
      <div class="alert alert-danger">
         <?php echo $_SESSION['errorproduct']; unset($_SESSION['errorproduct']); ?>
      </div>
    <?php } ?>
    <?php if(isset($_SESSION['success'])){ ?>
      <div class="alert alert-success">
         <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
      </div>
    <?php } ?>
    <?php if(isset($_SESSION['error'])){ ?>
      <div class="alert alert-danger">
         <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php } ?>
</div>

<div class="row">
   <div class="col-lg-12">
      <div class="card-body">
   <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
         <div class="row">
            <div class="col-sm-12 col-md-6">
               <div class="dataTables_length" id="dataTable_length">
                  <label>
                     Show 
                     <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                     </select>
                     entries
                  </label>
               </div>
            </div>
            <div class="col-sm-12 col-md-6">
               <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                     <tr role="row">
                       <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">STT</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">Name Product</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 254px;">Order</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">Price</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">Quantity</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $i = 1; 
                     foreach ($order as $value) {
                     ?>
                     <tr role="row" class="odd">
                        <td class="sorting_1"><?php echo $i; ?></td>
                        <td><?php echo $value['namepro']; ?></td>
                        <td><a href='order.php?id= <?php echo $value['order-id'];?>'class='btn btn-success'><?php echo $value['order-id']; ?></a></td>
                        <td><?php echo $value['price']; ?></td>
                        <td><?php echo $value['quantity']; ?></td>
                        
                     </tr>
                     <?php $i++;} ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12 col-md-5">
               <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
               <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                  <ul class="pagination">
                      <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="?page=<?php if($i<$sotrang)echo $st+1;?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Previous</a></li>
                      <?php 
                        for ($i=1 ; $i <= $sotrang ; $i++) :
                      ?>
                       
                        <li class="paginate_button page-item <?php echo ($i==$p) ? 'active':''; $st=$i; ?>">
                           <a href="?page=<?php echo $i;?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i;?></a>
                        </li>

                     <?php endfor ?>

                     <li class="paginate_button page-item next" id="dataTable_next"><a href="?page=<?php if($i<=$sotrang)echo $st+1;?>" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   
</div>
</div>
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>