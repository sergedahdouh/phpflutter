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
						<h4>Add Quiz</h4>
					</div>
					<div class="card-body">
						<form class="form" role="form" method="post" action="action/add_quiz.php" enctype="multipart/form-data">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Title Quiz</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Category Quiz</label>
								<div class="col-lg-9">
									<?php
										include 'include/connection.php';
										$cat_que = "SELECT * FROM tbl_category";
										$cat_sel = mysqli_query($conn, $cat_que);
										$cat_sel_equals = mysqli_query($conn, $cat_que);
										$data_name = mysqli_fetch_assoc($cat_sel_equals);
									?>
									<select name="category" class="form-control" required>
										<?php while ($data = mysqli_fetch_assoc($cat_sel)) {
											if ($data['cat_id'] == $data_name['cat_id']) {?>
												<option selected="<?php echo $data_name['cat_id'];?>" value="<?php echo $data['cat_id'];?>">
													<?php echo $data['cat_name'];?>
												</option>
											<?php } else { ?>
												<option value="<?php echo $data['cat_id'];?>">
													<?php echo $data['cat_name'];?>
												</option>
											}
										<?php }} ?>
									</select>
								</div>
							</div> 
			            	<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Status Quiz</label>
								<div class="col-lg-9">
									<div class="checkbox anim-checkbox">
										<input type="checkbox" id="ch3" name="status[]" value="1"/>
										<label for="ch3">Active</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Image Quiz (512 x 512) recomended</label>
								<div class="col-lg-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="http://placehold.it/512x512" alt=""/>
										</div>
										<div class="fileupload-preview fileupload-exists thumbnail"
											style="
											max-width: 200px;
											max-height: 150px;
											line-height: 20px;">
										</div>
										<div>
											<span class="btn btn-file btn-primary">
												<span class="fileupload-new">Select image</span>
												<span class="fileupload-exists">Change</span>
												<input type="file" name="photo" accept="image/jpeg" required></span>
											<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
								</div>
							</div>
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