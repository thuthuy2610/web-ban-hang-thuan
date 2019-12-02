<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php require_once __DIR__. "/layouts/header.php"; ?>
<?php 
    if (isset($_GET['idpro'])) {
        $id = intval(getInput("idpro"));
        $sql = "select * from `product` where `id`= $id";
        $pro = $db->fetchsql($sql);
        if (!empty($pro)){
            foreach ($pro as $pro) {
                $product = $pro['name'];
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });
        </script> 
            <div class="main">
                <div class="content">
                    <div class="content_top">
                        <div class="back-links">
                            <p><a href="<?php echo base_url(); ?>">Home</a> >>>> <a href="<?php echo base_url();?>main.php?id=<?php echo $pro['category_id']?>">Electronics</a></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="section group">
                        <div class="cont-desc span_1_of_2">
                            <div class="product-details">
                                <div class="grid images_3_of_2">
                                    <div id="container">
                                        <div id="products_example">
                                            <div id="products">
                                                <div class="slides_container">
                                                    <h4>XXX</h4>
                                                    <a href="#" target="_blank"><img src="<?php echo base_url();?>public/uploads/products/<?php echo $pro['thunbar']; ?>" alt=" " /></a>
                                                </div>
                                                <ul class="pagination">
                                                    <li><a href="#"><img src="<?php echo base_url();?>public/uploads/products/<?php echo $pro['thunbar']; ?>" alt=" " /></a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="desc span_3_of_2">
                                    <h2><?php echo $pro['name']; ?></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                    <div class="price">
                                        <p>Price: <span><?php echo $pro['price']; ?></span>đ</p>
                                    </div>
                                    <div class="available">
                                        <p>Available Options :</p>
                                        Quality:
                                        <select>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="share-desc">
                                        <div class="share">
                                            <p>Share Product :</p>
                                            <ul>
                                                <li><a href="#"><img src="<?php echo base_url() ?>/public/frontend/images/facebook.png" alt="" /></a></li>
                                                <li><a href="#"><img src="<?php echo base_url() ?>/public/frontend/images/twitter.png" alt="" /></a></li>
                                            </ul>
                                        </div>
                                        <div class="button"><span><a href="<?php echo base_url(); ?>giohang.php?id=<?php echo $pro['id']; ?>">Add to Cart</a></span></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="wish-list">
                                        <ul>
                                            <li class="wish"><a href="#">Add to Wishlist</a></li>
                                            <li class="compare"><a href="#">Add to Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="product_desc">
                                <div id="horizontalTab">
                                    <ul class="resp-tabs-list">
                                        <li>Product Details</li>
                                        <li>product Tags</li>
                                        <li>Product Reviews</li>
                                        <div class="clear"></div>
                                    </ul>
                                    <div class="resp-tabs-container">
                                        <div class="product-desc">
                                            <p><?php echo $pro['name']; ?> <span>
                                                <?php echo $pro['content']; ?>
                                            </span>
                                        </div>
                                        <div class="product-tags">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                            <h4>Add Your Tags:</h4>
                                            <div class="input-box">
                                                <input type="text" value="">
                                            </div>
                                            <div class="button"><span><a href="#">Add Tags</a></span></div>
                                        </div>
                                        <div class="review">
                                            <h4>Lorem ipsum Review by <a href="#">Finibus Bonorum</a></h4>
                                            <ul>
                                                <li>Price :<a href="#"><img src="<?php echo base_url(); ?>public/frontend/images/price-rating.png" alt="" /></a></li>
                                                <li>Value :<a href="#"><img src="<?php echo base_url(); ?>public/frontend/images/value-rating.png" alt="" /></a></li>
                                                <li>Quality :<a href="#"><img src="<?php echo base_url(); ?>public/frontend/images/quality-rating.png" alt="" /></a></li>
                                            </ul>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                            <div class="your-review">
                                                <h3>How Do You Rate This Product?</h3>
                                                <p>Write Your Own Review?</p>
                                                <form>
                                                    <div>
                                                        <span><label>Nickname<span class="red">*</span></label></span>
                                                        <span><input type="text" value=""></span>
                                                    </div>
                                                    <div><span><label>Summary of Your Review<span class="red">*</span></label></span>
                                                        <span><input type="text" value=""></span>
                                                    </div>
                                                    <div>
                                                        <span><label>Review<span class="red">*</span></label></span>
                                                        <span><textarea> </textarea></span>
                                                    </div>
                                                    <div>
                                                        <span><input type="submit" value="SUBMIT REVIEW"></span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                  
                            <div class="content_bottom">
                                <div class="heading">
                                    <h3>Related Products</h3>
                                </div>
                                <div class="see">
                                    <p><a href="<?php echo base_url();?>productcate.php">See all Products</a></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="section group">
                                <?php  
                                    $name = substr($product, 0,1);
                                    $sql1 = "select * from `product` where `name`like '%$name%'";
                                    $pror = $db->fetchsql($sql1);
                                    if (!empty($pror)){
                                        foreach ($pror as $pror) {?>
                                        <div class="grid_1_of_4 images_1_of_4">
                                            <a href="<?php echo base_url(); ?>preview.php?idpro=<?php echo $pror['id']; ?>"><img src="<?php echo base_url(); ?>/public/uploads/products/<?php echo $pror['thunbar']; ?>" alt=""></a>                  
                                            <div class="price" style="border:none">
                                                <div class="add-cart" style="float:none">
                                                    <h4><a href="<?php echo base_url(); ?>giohang.php?id=<?php echo $pror['id']; ?>">Add to Cart</a></h4>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                <?php }} ?>
                            </div>
                        </div>
                        <div class="rightsidebar span_3_of_1">
                            <h2>CATEGORIES</h2>
                            <ul class="side-w3ls">
                              <?php $cate = $db->fetchAll('category') ?>
                              <?php foreach ($cate as  $value) {?>
                                 <li><a href="<?php echo base_url();?>main.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                              <?php } ?>
                            </ul>
                            <div class="subscribe">
                                <h2>Newsletters Signup</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
                                <div class="signup">
                                    <form>
                                        <input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';"><input type="submit" value="Sign up">
                                    </form>
                                </div>
                            </div>
                            <div class="community-poll">
                                <h2>Community POll</h2>
                                <p>What is the main reason for you to purchase products online?</p>
                                <div class="poll">
                                    <form>
                                        <ul>
                                            <li>
                                                <input type="radio" name="vote" class="radio" value="1">
                                                <span class="label"><label>More convenient shipping and delivery </label></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="vote" class="radio" value="2">
                                                <span class="label"><label for="vote_2">Lower price</label></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="vote" class="radio" value="3">
                                                <span class="label"><label for="vote_3">Bigger choice</label></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="vote" class="radio" value="5">
                                                <span class="label"><label for="vote_5">Payments security </label></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="vote" class="radio" value="6">
                                                <span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
                                            </li>
                                            <li>
                                                <input type="radio" name="vote" class="radio" value="7">
                                                <span class="label"><label for="vote_7">Other.</label></span>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } 
    }
    }?>
    <?php require_once __DIR__. "/layouts/footer.php"; ?>
