<?php
	 require_once ('autoload/autoload.php'); 

	 $id = intval(getInput('id'));

	 $EditCategory = $db->fetchID("category",$id);

	 if(isset($_GET['p']))
	 {
	 	$p = $_GET['p'];
	 }
	 else
	 {
	 	$p = 1;
	 }

	 $sql = "SELECT * FROM product WHERE category_id = $id";

	 $total = count($db->fetchsql($sql));

	 $product = $db->fetchJones("product",$sql,$total,$p,7,true);
	 $sotrang = $product['page'];
	 unset($product['page']);

	 $path = $_SERVER['SCRIPT_NAME'];
	 // _debug($product);
 ?>
<?php require_once ('layouts/header.php'); ?>

<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main"><a href="javascript:void(0)"><?php echo $EditCategory['name'] ?></a> </h3>
       <!-- Nội dung -->
       	 <div class="showitem clearfix">
       	 	<?php foreach ($product as $item) { ?>
	            <div class="col-md-3 item-product bor">
	                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?> ">
                        <img src="public/uploads/product/<?php echo $item['image'] ?>" class="" width="100%" height="180px">
                        </a>
                        <div class="info-item">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>" ><?php echo $item['name'] ?></a>
                            <p ><?php echo $item['tacgia'] ?></p>
                            <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatPricesale($item['price'], $item['sale']) ?></b></p>
                        </div>
                        <div class="hidenitem">
                            <p><a href=""><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href="/addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
	            </div>
       	 		
       	 	<?php } ?>
        </div>
        <nav class="text-center">
        	<ul class="pagination">
        		<?php for ($i=1; $i <= $sotrang ; $i++) { ?>
				  <li class="<?php echo ($i == $p) ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i?>"><?php echo $i ?></a></li>
        		<?php } ?>
			</ul>
        </nav>
    </section>
</div>

<?php require_once ('layouts/footer.php'); ?>

                