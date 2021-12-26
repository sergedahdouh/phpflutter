<?php include 'include/header.php';?>
<body>
	<div class="container col-lg-11">
	<div class="mx-auto col-lg-12 main-section" id="myTab" role="tablist">
		<?php include 'include/tab.php';?>
		<div class="tab-content mytab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
				<div class="card">
					<div class="card-header">
						<h5>Home</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="my-cards col col-md-3 mx-auto">
								<a href="quiz">
								<i class="fa fa-book"></i>
								<div class="my-card">
									<h4><b>Quiz</b></h4>
									<p>See All Quiz</p>
								</div>
								</a>
							</div>
							<div class="my-cards col col-md-3 mx-auto">
								<a href="category">
								<i class="fa fa-list"></i>
								<div class="my-card">
									<h4><b>Category</b></h4>
									<p>See All Category</p>
								</div>
								</a>
							</div>
							<div class="my-cards col col-md-3 mx-auto">
								<a href="badge">
								<i class="fa fa-users"></i>
								<div class="my-card">
									<h4><b>Badge</b></h4>
									<p>See All Badge</p>
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
				<div class="card">
					<div class="card-header">
						<h4>View Course</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Image</th>
									<th scope="col">Author</th>
									<th scope="col">category</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$employee = mysqli_query($conn, "SELECT * from tbl_course JOIN tbl_category ON tbl_course.category = tbl_category.cat_id JOIN tbl_author ON tbl_course.author = tbl_author.id_author ORDER BY id_packs DESC");
										while($row = mysqli_fetch_array($employee))
										{ ?>
											<tr>
											<td><?php echo $row['id_packs'] ?></td>
											<td><?php echo $row['name']?></td>
											<td><a href="<?php include 'image/baseurl.php'; echo $image_pack;?><?php echo $row['photo_course'];?>" id="example1" title="<?php echo $row['name'] ?>">
												<img src="<?php include 'image/baseurl.php'; echo $image_pack;?><?php echo $row['photo_course'];?>" height=70 width=100 id=myImg>
												</a>
											</td>
											<td><?php echo $row['name_author']; ?></td>
											<td><?php echo $row['cat_name']; ?></td>
											<td>
												<?php
													if($row['status']=="1"){?>
														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Active</span>
													<?php }else { ?>

														<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

													<?php }
												?>
											</td>
											<td>
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="editcourse?edit_pack=<?php echo $row['id_packs'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } else {?>
														<a href="#view/" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } ?>
												&ensp;
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="lecture.php?lec=<?php echo $row['id_packs'];?>" class="btn btn-info"><i class="fa fa-plus"></i></a>
												<?php } else {?>
														<a href="#view/" class="btn btn-info"><i class="fa fa-plus"></i></a>
												<?php } ?>
												&ensp;
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="action/delete_course.php?course_id=<?php echo $row['id_packs'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')"><i class="fa fa-trash"></i></a>
												<?php } else {?>
														<a href="#view/" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Ebook?')"><i class="fa fa-trash"></i></a>
												<?php } ?>
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
			<div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
				<div class="card">
					<div class="card-header">
						<h4>Add Quiz, Category and Achievments</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="my-cards col col-md-3 mx-auto">
								<a href="addquiz">
								<i class="fa fa-book"></i>
								<div class="my-card">
									<h4><b>Quiz</b></h4>
									<p>Add Quiz</p>
								</div>
							</a>
							</div>
							<div class="my-cards col col-md-3 mx-auto">
								<a href="addcategory">
								<i class="fa fa-list"></i>
								<div class="my-card">
									<h4><b>Category</b></h4>
									<p>Add Category</p>
								</div>
								</a>
							</div>
							<div class="my-cards col col-md-3 mx-auto">
								<a href="addbadge">
								<i class="fa fa-book"></i>
								<div class="my-card">
									<h4><b>Badge</b></h4>
									<p>Add Badge</p>
								</div>
							</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="view-tab">
				<div class="card">
					<div class="card-header">
						<h4>All Info</h4><a href="sendinfo">Send Notification</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">

							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Short</th>
									<th scope="col" style="width: 10%;">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$employee = mysqli_query($conn, "SELECT * FROM tbl_notification ORDER BY id_notification ASC");
										while($row = mysqli_fetch_array($employee))
										{ ?>
											<tr>
											<td><?php echo $row['id_notification'] ?></td>
											<td><?php echo $row['notification_title']?></td>
											<td><?php echo $row['notification_shortdesc']?></td>
											<td>
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="editinfo?edit_info=<?php echo $row['id_notification'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } else {?>
														<a href="#view/" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } ?>
												&ensp;
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="action/info_delete.php?id_notif=<?php echo $row['id_notification'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Info?')"><i class="fa fa-trash"></i></a>
												<?php } else {?>
														<a href="#view/" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Info?')"><i class="fa fa-trash"></i></a>
												<?php } ?>
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
			<div class="tab-pane fade" id="author" role="tabpanel" aria-labelledby="author-tab">
				<div class="card">
					<div class="card-header">
						<h4>View All author
						<a style="float: right;" class="nav-link btn btn-success" href="addauthor">Add Author</a>
						</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['active'])) {
									$edit = $_GET['active'];

									$news_upd = "UPDATE tbl_author SET status = 1 WHERE author_id = '".$edit."'";
									mysqli_query($conn, $news_upd);

									?>
									<script>
										window.location = 'home#author';
									</script>
									<?php
								}
							?>
							<?php
								if (isset($_GET['deactive'])) {
									$edit = $_GET['deactive'];

									$news_upd = "UPDATE tbl_author SET status = 0 WHERE author_id = '".$edit."'";
									mysqli_query($conn, $news_upd);

									?>
									<script>
										window.location = 'home#author';
									</script>
									<?php
								}
							?>
							<table id="userList1" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Photo</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$employee = mysqli_query($conn, "SELECT * from tbl_author ORDER BY author_id ASC");
										while($row = mysqli_fetch_array($employee))
										{ ?>
											<tr>
											<td><?php echo $row['author_id'] ?></td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><a href="<?php include 'image/baseurl.php';?><?php echo "image/".$row['photo_author'];?>" id="example1" title="<?php echo $row['title'] ?>">
												<img src="<?php include 'image/baseurl.php';?><?php echo "image/".$row['photo_author'];?>" height=70 width=100 id=myImg>
												</a>
											</td>
											<td>
												<?php
													if($row['status']!="0"){?>

														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Active</span>
													<?php }else{ ?>

														<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

													<?php }
												?>
											</td>
											<td><a href="editauthor?author=<?php echo $row['author_id'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>&ensp;
											<a href="authornews?news_id=<?php echo $row['author_id'];?>" class="btn btn-info"><i class="fa fa-list"></i></a>&ensp;
											<a href="?active=<?php echo $row['author_id'];?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to active this user?')"><i class="fa fa-check-circle" aria-hidden="true"></i></a>&ensp;
											<a href="?deactive=<?php echo $row['author_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to deactive this user?')"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
											</tr>
										<?php }
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="addnews" role="tabpanel" aria-labelledby="addnews-tab">
				<div class="card">
					<div class="card-header">
						<h4>Add Category / News: </h4> <?php include 'include/child-tab.php'; ?>
					</div>
					<div class="card-body">
						<form class="form" role="form" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Nama</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Harga</label>
								<div class="col-lg-9">
									<input class="form-control" type="number" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Category</label>
								<div class="col-lg-9">
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Deskripsi</label>
								<div class="col-lg-9">
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Gambar</label>
								<div class="col-lg-9">
									<input class="form-control" type="file" accept="image/*">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12 text-center">
									<input type="button" class="btn btn-primary" value="Tambah">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
				<div class="card">
					<div class="card-header">
						<h5>View All</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['cat_id'])) {
									$deleteNews = $_GET['cat_id'];
									$news_del = "DELETE FROM tbl_category WHERE cat_id = '".$deleteNews."'";
									$news_del_path = "SELECT * FROM tbl_category WHERE cat_id = '".$deleteNews."'";
									$que_del_path = mysqli_query($conn, $news_del_path);
									$datas = mysqli_fetch_assoc($que_del_path);

									if($datas['photo_cat']!=""){
										unlink('image/'.$datas['photo_cat']);
									}
									$que_del = mysqli_query($conn, $news_del);

									?>
									<script type="text/javascript">
										window.location = 'home#category';
									</script>
									<?php
								}
							?>
							<table id="dataTables-example" class="table table-bordered table-hover table-striped">
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
										$cat = mysqli_query($conn, "SELECT * from tbl_category");
										$cat_id = mysqli_query($conn, "SELECT * from tbl_category");
										while($row = mysqli_fetch_array($cat))
										{ ?>
											<tr>
											<td><?php echo $row['cat_id'] ?></td>
											<td><?php echo $row['cat_name'] ?></td>
											<td>
												<?php
													if($row['cat_status']!="0"){?>

														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">Published</span>

													<?php }else{ ?>

														<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">Disabled</span>

													<?php }
												?>
											</td>
											<td><a href="<?php include 'image/baseurl.php';?><?php echo "image/".$row['photo_cat'];?>" id="example1" title="<?php echo $row['name'] ?>">
												<img src="<?php include 'image/baseurl.php';?><?php echo "image/".$row['photo_cat'];?>" height=90 width=100 id=myImg>
												</a>
											</td>
											<td>
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="editcategory.php?cat_id=<?php echo $row['cat_id'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } else {?>
														<a href="#category/" class="btn btn-success"><i class="fa fa-edit"></i></a>
												<?php } ?>
												&ensp;&ensp;
												<?php
													if ($demoOrLive == "1") { ?>
														<a href="?cat_id=<?php echo $row['cat_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Category?')"><i class="fa fa-trash"></i></a>
												<?php } else {?>
														<a href="#category/" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Category?')"><i class="fa fa-trash"></i></a>
												<?php } ?>
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
			<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
				<div class="card">
					<div class="card-header">
						<h4>Add Category / Ebook: </h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="my-cards col col-md-5 mx-auto">
								<a href="addebook">
								<i class="fa fa-book"></i>
								<div class="my-card">
									<h4><b>News</b></h4>
									<p>Add Category News</p>
								</div>
							</a>
							</div>

							<div class="my-cards col col-md-5 mx-auto">
								<a href="addcategory">
								<i class="fa fa-list"></i>
								<div class="my-card">
									<h4><b>Category</b></h4>
									<p>Add Category</p>
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
				<div class="card">
					<div class="card-header">
						<h4>Add Product</h4>
					</div>
					<div class="card-body">
						<?php

							$query = "SELECT * FROM tbl_setting WHERE id = 1";

							$ms = mysqli_query($conn, $query);
							$result = mysqli_fetch_assoc($ms);

							$query1 = "SELECT * FROM tbl_news";

							$ms1 = mysqli_query($conn, $query1);
							$result1 = mysqli_fetch_assoc($ms1);

							$query2 = "SELECT * FROM tbl_category";

							$ms2 = mysqli_query($conn, $query2);
							$result2 = mysqli_fetch_assoc($ms2);

						?>
						<form class="form" role="form" autocomplete="off" method="post" action="action/edit_setting.php">
							<ul class="list-group">
								<li class="list-group-item active" style="text-align: center; margin-bottom: 20px;">News / Category in Home</li>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Slider News Home</label>
									<div class="col-lg-9">
										<input class="form-control" type="number" name="slider" min="1" max="7" value="<?php echo $result['slider'];?>">
									</div>
								</div>
								<li class="list-group-item active" style="text-align: center; margin-bottom: 20px;">Braintree Setup</li>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Environment</label>
									<div class="col-lg-9">
										<select name="environment" class="form-control">
											<?php if ($result['environment'] == 1) { ?>
												<option selected="<?php echo $result['environment'];?>" value="1">
													Production
												</option>
												<option value="0">Sandbox</option>
											<?php } else {?>
												<option selected="<?php echo $result['environment'];?>" value="0">Sandbox</option>
												<option value="1">
													Production
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Merchant Id</label>
									<div class="col-lg-9">
										<input class="form-control" type="text" name="merchantid" value="<?php echo $result['merchantId'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Public Key</label>
									<div class="col-lg-9">
										<input class="form-control" type="text" name="public_key" value="<?php echo $result['publicKey'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Private Key</label>
									<div class="col-lg-9">
										<input class="form-control" type="text" name="private_key" value="<?php echo $result['privateKey'];?>">
									</div>
								</div>
								<!-- <li class="list-group-item active" style="text-align: center; margin-bottom: 20px;">Show News by Keyword</li>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Title Keyword Header</label>
									<div class="col-lg-9">
										<input class="form-control" name="title_keyword1" value="<?php echo $result['title_keyword1'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Field Keyword Header</label>
									<div class="col-lg-9">
										<input class="form-control" name="field_keyword1" value="<?php echo $result['field_keyword1'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Title Keyword Footer</label>
									<div class="col-lg-9">
										<input class="form-control" name="title_keyword2" value="<?php echo $result['title_keyword2'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Field Keyword Footer</label>
									<div class="col-lg-9">
										<input class="form-control" name="field_keyword2" value="<?php echo $result['field_keyword2'];?>">
									</div>
								</div> -->
							</ul>
							<div class="form-group row">
									<div class="col-lg-12 text-center">
										<input type="submit" name="submit" class="btn btn-primary" value="Save">
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'include/footer.php';?>
</body>
</html>
