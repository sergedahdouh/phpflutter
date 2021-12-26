<?php include 'include/header.php';?>
<body>
	<div class="container">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<h4>Edit Quiz</h4>
					</div>
					<div class="card-body">
						<?php
							$id = $_GET['edit_quiz'];
							$query = "SELECT * FROM tbl_quiz WHERE id_quiz = '".$id."'";

							$ms = mysqli_query($conn, $query);
							$result = mysqli_fetch_assoc($ms);

							if (isset($_POST['submit'])) {
							
								$name = addslashes($_POST['name']);
						        $category = $_POST['category'];
						        $status = $_POST['status'];
						        if(!empty($status)){
						            foreach($status as $valueStatus){
						                //echo "value: " . $valueStatus;
						            }
						        }

								if($_FILES['photo']['name']!=""){
									$file = $_FILES['photo']['tmp_name'];
							        $filename = $_FILES['photo']['name'];
							        $target_directory = "image/image_quiz/";

							        $new_image = "quiz_".time()."_".str_replace(" ", "", $filename);
							        $target_filepath = $target_directory.$new_image;
							        $image = $new_image;

									$query = "UPDATE tbl_quiz SET name_quiz = '".$name."', image_quiz = '".$image."', category_quiz = '".$category."', view_quiz = '0', status_quiz = '".$valueStatus."' WHERE id_quiz = '".$id."'";

									if ($result['image_quiz']!="") {
										unlink('image/image_quiz/'.$result['image_quiz']);
									}
									mysqli_query($conn, $query);
									move_uploaded_file($file, $target_filepath);

						            ?>
									<script type="text/javascript">
										window.location = 'quiz';
									</script>
									<?php

								}else{
									$query = "UPDATE tbl_quiz SET name_quiz = '".$name."', category_quiz = '".$category."', view_quiz = '0', status_quiz = '".$valueStatus."' WHERE id_quiz = '".$id."'";

									mysqli_query($conn, $query);

									?>
									<script type="text/javascript">
										window.location = 'quiz';
									</script>
									<?php
								}

							}

						?>
						<form class="form" role="form" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Title Quiz</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" value="<?php echo $result['name_quiz'];?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Category Quiz</label>
								<div class="col-lg-9">
									<?php
										include 'include/connection.php';
										$cat_que = "SELECT * FROM tbl_category";
										$cat_sel = mysqli_query($conn, $cat_que);
										$cat_sel_equals = mysqli_query($conn, "SELECT * FROM tbl_quiz WHERE id_quiz = '".$id."'");
										$data_name = mysqli_fetch_assoc($cat_sel_equals);
									?>
									<select name="category" class="form-control" required>
										<?php while ($data = mysqli_fetch_assoc($cat_sel)) {
											if ($data['cat_id'] == $data_name['category_quiz']) {?>
												<option selected="<?php echo $data_name['category_quiz'];?>" value="<?php echo $data['cat_id'];?>">
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
										<input type="checkbox" id="ch3" name="status[]" value="1" <?php if($result['status_quiz']=="1"){ ?>checked<?php }?>/>
										<label for="ch3">Active</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Image Quiz (512 x 512) recomended</label>
								<div class="col-lg-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="<?php include 'image/baseurl.php'; echo $image.$result['image_quiz'];?>" alt=""/>
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
												<input type="file" name="photo" accept="image/jpeg"></span>
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