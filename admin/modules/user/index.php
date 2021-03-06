<?php 
	$open = "user";
	require_once ('../../autoloadadmin/autoloadadmin.php');

	// $product = $db->fetchAll("product");
	if(isset($_GET['page']))
	{
		$p = $_GET['page'];
	}
	else
	{
		$p = 1;
	}

	$sql = "SELECT user.* FROM user ORDER BY ID DESC ";
	$admin = $db->fetchJone('user',$sql,$p,5,true);

	if (isset($admin['page'])) 
	{
		$sotrang = $admin['page'];
		unset($admin['page']);	
	}

	 $path = $_SERVER['SCRIPT_NAME'];
	
 ?>
<?php require_once('../../layouts/header.php'); ?>
	<ol class="breadcrumb">
	    <li class="breadcrumb-item">
	        <a href="index.html">Dashboard</a>
	    </li>
	    <li class="breadcrumb-item active">Thành viên</li>
	</ol>
	<div class="row">
	    <div class="col-12">
	        <h1>Danh sách thành viên
	        <!-- <a href="add.php" class="btn btn-success">Thêm mới</a> -->
	        </h1>
	        <div class="clearfix"></div>

	        <!-- thông báo lỗi -->
<?php require_once('../../../partials/notification.php'); ?>
	       

	    </div>
	</div>
	<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th >STT</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Phone</th>
                    <th >Active</th>
                </tr>
            </thead>
            <tbody>
            	<?php $stt = 1; foreach ($admin as $item) { ?>
	                <tr role="row" class="odd">
	                    <td class="sorting_1"><?php echo $stt ?></td>
	                    <td><?php echo $item['name'] ?></td>
	                    <td><?php echo $item['email'] ?></td>
	                    <td><?php echo $item['phone'] ?></td>
	                    <td>
	                    <!-- 	<a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id']?>"><i class="fa fa-edit"></i>Sửa</a> -->
	                    	<a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id']?>"><i class="fa fa-times"></i>Xóa</a>
	                    </td>
	                    
	                </tr>
            	<?php $stt++; } ?>
                
                
            </tbody>
        </table>
        <div class="pull-right">
		    <nav aria-label="Page navigation example">
			    <ul class="pagination">
			        <li class="page-item">
			            <a class="page-link" href="#" aria-label="Previous">
			            <span aria-hidden="true">&laquo;</span>
			            <span class="sr-only">Previous</span>
			            </a>
			        </li>
					<?php for ($i=1; $i <= $sotrang ; $i++) { ?>
				        <li class="<?php echo ($i == $p) ? 'active' : '' ?>">
				        	<a class="page-link" href="<?php echo $path ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a>
				        </li>
					<?php } ?>

			        <li class="page-item">
			            <a class="page-link" href="#" aria-label="Next">
			            <span aria-hidden="true">&raquo;</span>
			            <span class="sr-only">Next</span>
			            </a>
			        </li>
			    </ul>
			</nav>
		</div>
    </div>
</div>

<?php require_once('../../layouts/footer.php') ?>