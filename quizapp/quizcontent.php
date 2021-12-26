<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<body>
	<div class="container col-lg-11">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<?php include 'include/child-tab.php';?>
		<div class="tab-content" id="myTabContent">	
			<div role="tabpanel">
				<div class="card">
					<div class="card-header">
						<?php $id = $_GET['qc'];?>
						<h4>All Quiz Content</h4> <a href="addquizcontent.php?addqc=<?php echo $id;?>">Add Quiz Content</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<?php
								if (isset($_GET['del_quiz'])) { 
									$deleteNews = $_GET['del_quiz'];
									$news_del = "DELETE FROM tbl_quiz_content WHERE id_quiz_content = '".$deleteNews."'";
									$news_del_path = "SELECT * FROM tbl_quiz_content WHERE id_quiz_content = '".$deleteNews."'";
									$que_del_path = mysqli_query($conn, $news_del_path);
									$datas = mysqli_fetch_assoc($que_del_path);

									if($datas['image_quiz_content']!=""){
										unlink('image/image_quiz/'.$deleteNews.'/'.$datas['image_quiz_content']);
									}

									$que_del = mysqli_query($conn, $news_del);
									?>
						                <script type="text/javascript">
						                  window.location = 'javascript:history.go(-1)';
						                </script>
						             <?php
								}
							?>
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Id QC</th>
									<th scope="col">Image</th>
									<th scope="col">Question</th>
									<th scope="col">Answer</th>
									<th scope="col">Action</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$employee = mysqli_query($conn, "SELECT * from tbl_quiz_content WHERE id_quiz = '".$id."' ORDER BY id_quiz DESC");
										while($row = mysqli_fetch_array($employee))
										{ ?>
											<tr>
											<td><?php echo $row['id_quiz_content'] ?></td>
											<td><?php echo $row['id_quiz'] ?></td>
											<td>
												<?php
													if($row['image_quiz_content']!=""){?>
														<img src="<?php include 'image/baseurl.php'; echo $image.$id.'/';?><?php echo $row['image_quiz_content'];?>" height=96 width=100 id=myImg>
												<?php } else { ?>
														<a href="http://placehold.it/512x512" id="example1" title="No image">
														<img src="http://placehold.it/512x512" height=96 width=96 id=myImg>
														</a>
												<?php } ?>
											</td>
											<td><?php echo $row['question_quiz_content'];?></td>	
											<td>
												<?php
													if($row['answer_quiz_content']=="1"){?>
														<span class="badge badge-success-lighten" style="color: #0acf97; background-color: rgba(10,207,151,.18);">True</span>																
													<?php }else { ?>

														<span class="badge badge-dark-lighten" style="color: #ef042f; background-color: rgba(49,58,70,.18);">False</span>

													<?php }
												?>
											</td>
											<td>
												<a href="editquizcontent.php?edit_qc=<?php echo $row['id_quiz_content'];?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
												&ensp;
												<a href="?del_quiz=<?php echo $row['id_quiz_content'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')"><i class="fa fa-trash"></i></a>
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