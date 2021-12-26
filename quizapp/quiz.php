<?php include 'include/header.php';?>
<body>
	<div class="container col-lg-11">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>All Quiz</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Image</th>
									<th scope="col">category</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$quiz = mysqli_query($conn, "SELECT * from tbl_quiz JOIN tbl_category ON tbl_quiz.category_quiz = tbl_category.cat_id ORDER BY id_quiz DESC");
										while($row = mysqli_fetch_array($quiz))
										{ ?>
											<tr>
											<td><?php echo $row['id_quiz'] ?></td>
											<td><?php echo $row['name_quiz']?></td>									
											<td><img src="<?php include 'image/baseurl.php'; echo $image;?><?php echo $row['image_quiz'];?>" height=96 width=96 id=myImg>
											</td>								
											<td><?php echo $row['cat_name']; ?></td>
											<td>
												<?php
													if($row['status_quiz']=="1"){?>
														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Active</span>																
													<?php }else { ?>

														<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

													<?php }
												?>
											</td>
											<td>
												<a href="editquiz?edit_quiz=<?php echo $row['id_quiz'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												&ensp;
												<a href="quizcontent.php?qc=<?php echo $row['id_quiz'];?>" class="btn btn-info"><i class="fa fa-plus"></i></a>
												&ensp;
												<a href="action/delete_quiz.php?id_quiz=<?php echo $row['id_quiz'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')"><i class="fa fa-trash"></i></a>
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