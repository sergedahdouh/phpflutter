<?php include 'include/header.php';?>
<body>
	<div class="container">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>All Badge</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['id_badge'])) { 
									$deleteNews = $_GET['id_badge'];
									$news_del = "DELETE FROM tbl_badge WHERE id_badge = '".$deleteNews."'";
									$news_del_path = "SELECT * FROM tbl_badge WHERE id_badge = '".$deleteNews."'";
									$que_del_path = mysqli_query($conn, $news_del_path);
									$datas = mysqli_fetch_assoc($que_del_path);

									if($datas['badge_image']!=""){
										unlink('image/image_badge/'.$datas['badge_image']);
									}

									$que_del = mysqli_query($conn, $news_del);
								}
							?>
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Key</th>
									<th scope="col">Required</th>
									<th scope="col">Status</th>
									<th scope="col">Image</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
								<?php
									$cat = mysqli_query($conn, "SELECT * from tbl_badge");
									$cat_id = mysqli_query($conn, "SELECT * from tbl_badge");
									while($row = mysqli_fetch_array($cat))
									{ ?>
										<tr>
										<td><?php echo $row['id_badge'] ?></td>
										<td><?php echo $row['badge_name'] ?></td>
										<td><?php echo $row['badge_key'] ?></td>
										<td><?php echo $row['badge_required'] ?></td>
										<td>
											<?php
												if($row['badge_status']!="0"){?>

													<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Published</span>										
												<?php }else{ ?>
													<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

												<?php }
											?>
										</td>
										<td><img src="<?php include 'image/baseurl.php';?><?php echo $badge.$row['badge_image'];?>" height=125 width=100 id=myImg>
										</td>
										<td>
											<a href="editbadge?id_badge=<?php echo $row['id_badge'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>											
											&ensp;&ensp;
											<a href="?id_badge=<?php echo $row['id_badge'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Badge?')"><i class="fa fa-user-times"></i></a>
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