<?php include 'include/header.php';?>
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
						<?php
							$id = $_GET['id_badge'];
							$query = "SELECT * FROM tbl_badge WHERE id_badge = '".$id."'";

							$ms = mysqli_query($conn, $query);
							$result = mysqli_fetch_assoc($ms);

							if (isset($_POST['submit'])) {
							
								$name = addslashes($_POST['name']);
    							$desc = addslashes($_POST['shortdes']); 
    							$badreq = $_POST['badreq']; 
    							$dkey = $_POST['badgekey'];
								$status = $_POST['status'];

								if(!empty($status)){
									foreach($status as $valueStatus){
										
									}
								}                                 

								if($_FILES['photo']['name']!=""){
									
									$name = addslashes($_POST['name']);
    								$desc = addslashes($_POST['shortdes']);
    								$dkey = $_POST['badgekey'];
									$photo_tmp = $_FILES['photo']['tmp_name'];
									$photo = $_FILES['photo']['name'];

									$strphoto = str_replace(" ", "", $photo);
									$strphoto_temp = str_replace(" ", "", $photo_tmp);
									$status = $_POST['status'];
	
									$md5photo = "badge_".time()."_".$strphoto;

									if(!empty($status)){
										foreach($status as $valueStatus){
											//echo "value: " . $valueStatus;
										}
									}

									$query = "UPDATE tbl_badge SET badge_name = '".$name."', badge_image = '".$md5photo."', badge_description = '".$desc."', badge_status = '".$valueStatus."', badge_key = '".$dkey."', badge_required = '".$badreq."' WHERE id_badge = '".$id."'";

									if ($result['badge_image']!="") {
										unlink('image/image_badge'.$result['badge_image']);
									}

									move_uploaded_file($strphoto_temp, "image/image_badge/".$md5photo);
									mysqli_query($conn, $query);
									?>
									<script>
										window.location = 'badge.php';
									</script>
									<?php

								}

								$query = "UPDATE tbl_badge SET badge_name = '".$name."', badge_description = '".$desc."', badge_status = '".$valueStatus."', badge_key = '".$dkey."', badge_required = '".$badreq."' WHERE id_badge = '".$id."'";
								mysqli_query($conn, $query);

								?>
									<script>
										window.location = 'badge.php';
									</script>
								<?php
								
							}
						?>
						<form class="form" role="form" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Title Badge</label>
								<div class="col-lg-9">
									<input class="form-control" name="name" value="<?php echo $result['badge_name']; ?>">
								</div>
							</div>	
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Title Key</label>
								<div class="col-lg-9">
									<input class="form-control" name="badgekey" value="<?php echo $result['badge_key']; ?>">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Badge Required</label>
								<div class="col-lg-9">
									<input class="form-control" name="badreq" value="<?php echo $result['badge_required']; ?>">
								</div>
							</div>												
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Badge Image</label>
								<div class="col-lg-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
											<img src="<?php include 'image/baseurl.php'; echo $badge.$result['badge_image'];?>" alt=""/>
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
												<input type="file" name="photo" accept="image/x-png"></span>
											<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Badge Description</label>
								<div class="col-lg-9">
									<textarea class="form-control" name="shortdes" style="height:150px;"><?php echo $result['badge_description'];?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Status</label>
								<div class="col-lg-9">
									<div class="checkbox anim-checkbox">
										<input type="checkbox" id="ch3" name="status[]" value="1" <?php if($result['badge_status']=="1"){ ?>checked<?php }?>/>
										<label for="ch3">Published</label>
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