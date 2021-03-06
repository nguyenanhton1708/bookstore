<?php 
	$open = "product";
	require_once ("../../autoloadadmin/autoloadadmin.php");


	//danh mục sản phẩm

	$category = $db->fetchAll("category");
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$data = 
		[
			"name" => postInput('name'),
			"slug" => to_slug(postInput("name")),
			"category_id" => postInput("category_id"),
			"price" => postInput("price"),
			"number" => postInput("number"),
			"tacgia" => postInput("tacgia"),
			"content" => postInput("content"),
			"sale" => postInput("sale")
		];

		$error = [];

		if(postInput('name') == ''){
			$error['name'] = "Mời bạn nhập tên sản phẩm";
		}
		
		if(postInput('category_id') == ''){
			$error['category_id'] = "Mời bạn nhập tên danh muc";
		}
		
		if(postInput('price') == ''){
			$error['price'] = "Mời bạn nhập giá sản phẩm";
		}

		if(postInput('number') == ''){
			$error['number'] = "Mời bạn nhập số lượng sản phẩm";
		}
		
		if(postInput('tacgia') == ''){
			$error['tacgia'] = "Mời bạn nhập tên tác giả";
		}

		if(postInput('sale') == ''){
			$error['sale'] = "Sản phẩm này được giảm giá";
		}

		if(postInput('content') == ''){
			$error['content'] = "Mời bạn nhập nội dung";
		}
		if( ! isset($_FILES['image'])){
			$error['image'] = "Mời bạn chọn hình ảnh";
		}


		//error trống có nghĩa là không có lỗi
		if (empty($error)) {
			if (isset($_FILES['image'])) {
				$file_name = $_FILES["image"]["name"];
				$file_tmp = $_FILES["image"]["tmp_name"];
				$file_type = $_FILES["image"]["type"];
				$file_error = $_FILES["image"]["error"];
			
				if ($file_error == 0) {
					$part = ROOT ."product/";
					$data['image'] = $file_name;
				}
			}
			$id_insert = $db->insert("product",$data);
			if($id_insert)
			{
				move_uploaded_file($file_tmp,$part.$file_name);
				$_SESSION["success"] = "Thêm mới thành công";
				redirectAdmin("product");
			}
			else
			{
				$_SESSION["error"] = "Thêm mới không thành công";
			}
		}
	}

 ?>
<?php require_once('../../layouts/header.php'); ?>
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">
	        <a href="index.html">Dashboard</a>
	    </li>
	    <li class="breadcrumb-item active">Sản phẩm</li>
	    <li class="breadcrumb-item active">Thêm mới</li>
	</ol>
	<div class="row">
	    <div class="col-12">
	        <h1>Thêm mới sản phẩm
	        </h1>
	    </div>
	</div>
    <div class="clearfix"></div>
<!-- thông báo lỗi -->
<?php require_once('../../../partials/notification.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" action="" method="POST"  enctype="multipart/form-data">

			    <div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Danh mục sách</label>
			        <div class="col-sm-8">
			            <select class="form-control col-md-8" name="category_id">
			            	<option value="">- Mời bạn chọn danh mục sách -</option>
		            	<?php foreach ($category as $item) { ?>
	            		 	<option value="<?php echo $item['id'] ?>"><?php echo $item["name"] ?></option>
		            	<?php } ?>

			            </select>
			            <?php if (isset($error['category_id'])) { ?>
			            	<p class="text-danger"><?php echo $error['category_id']; ?></p>
			            <?php } ?>
			        </div>
			    </div>

			    <div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
			        <div class="col-sm-8">
			            <input type="text" class="form-control" id="inputEmail3" placeholder="tên sách" name="name">
			            <?php if (isset($error['name'])) { ?>
			            	<p class="text-danger"><?php echo $error['name']; ?></p>
			            <?php } ?>
			        </div>
			    </div>

			    <div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Tên tác giả</label>
			        <div class="col-sm-8">
			            <input type="text" class="form-control" id="inputEmail3" placeholder="tên tác giả" name="tacgia">
			            <?php if (isset($error['tacgia'])) { ?>
			            	<p class="text-danger"><?php echo $error['tacgia']; ?></p>
			            <?php } ?>
			        </div>
			    </div>

			     <div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
			        <div class="col-sm-8">
			            <input type="number" class="form-control" id="inputEmail3" placeholder="100.000đ" name="price">
			            <?php if (isset($error['price'])) { ?>
			            	<p class="text-danger"><?php echo $error['price']; ?></p>
			            <?php } ?>
			        </div>
			    </div>

				<div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
			        <div class="col-sm-8">
			            <input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number">
			            <?php if (isset($error['number'])) { ?>
			            	<p class="text-danger"><?php echo $error['number']; ?></p>
			            <?php } ?>
			        </div>
			    </div>

			     <div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
			        <div class="col-sm-3">
			            <input type="number" class="form-control" id="inputEmail3" placeholder="0 %" name="sale">
			            <?php if (isset($error['sale'])) { ?>
			            	<p class="text-danger"><?php echo $error['sale']; ?></p>
			            <?php } ?>
			        </div>
		        </div>

			    <div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
			        <div class="col-sm-3">
			            <input type="file" class="form-control" id="inputEmail3" name="image">
			             <?php if (isset($error['image'])) { ?>
			            	<p class="text-danger"><?php echo $error['image']; ?></p>
			            <?php } ?>
			        </div>
			    </div>
			    
			    <div class="form-group">
			        <label for="inputEmail3" class="col-sm-2 control-label">Nội dung</label>
			        <div class="col-sm-8">
			            <textarea class="form-control" name="content" rows="4"></textarea>
			            <?php if (isset($error['content'])) { ?>
			            	<p class="text-danger"><?php echo $error['content']; ?></p>
			            <?php } ?>
			        </div>
			    </div>

			    <div class="form-group">
			        <div class="col-sm-offset-2 col-sm-10">
			            <button type="submit" class="btn btn-success">Lưu</button>
			        </div>
			    </div>
			</form>
		</div>
	</div>

<?php require_once('../../layouts/footer.php') ?>