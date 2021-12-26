<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<body>
	<div class="container">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>All Category</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['cat_id'])) {
									$deleteCat = $_GET['cat_id'];
									$delete = "DELETE FROM tbl_category WHERE cat_id = '".$deleteCat."'";
									$path = "SELECT * FROM tbl_category WHERE cat_id = '".$deleteCat."'";

									$delPath = mysqli_query($conn, $path);
									$datas = mysqli_fetch_assoc($delPath);

									if ($datas['photo_cat']!="") {
										unlink('image/'.$datas['photo_cat']);
									}

									mysqli_query($conn, $delete);
								}
							?>
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Status</th>
									<th scope="col">Image</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
									
									while()
									{ ?>
										<tr>
										<td></td>
										<td></td>
										<td>
											<?php
												if(){?>

													<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Published</span>										
												<?php }else{ ?>
													<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

												<?php }
											?>
										</td>
										<td><a href="" id="example1" title="<?php echo $row['name'] ?>">
											<img src="" height=100 width=100 id=myImg>
											</a>
										</td>
										<td>
											<a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>											
											&ensp;&ensp;
											<a href="" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Category?')"><i class="fa fa-user-times"></i></a>
										</td>
										</tr>
									<?php }
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'include/footer.php';?>
</body>
</html>