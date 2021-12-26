<?php include 'include/header.php';?>
<?php include 'include/demo.php';?>
<?php include 'image/baseurl.php';?>
<body>
  <div class="container">
  <div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
    <?php include 'include/child-tab.php';?>
    <div class="tab-content" id="myTabContent"> 
      <div role="tabpanel">
        <div class="card">
          <div class="card-header">
            <h4>Edit Quiz Content</h4>
          </div>
          <div class="card-body">
            <?php 
                $id = $_GET['edit_qc'];    
                $query = mysqli_query($conn, "SELECT * FROM tbl_quiz_content WHERE id_quiz_content = '".$id."'");
                $result = mysqli_fetch_assoc($query);

                if (isset($_POST['submit'])) {

                    $question = addslashes($_POST['question']);
                    $status = $_POST['status'];
                    if(!empty($status)){
                        foreach($status as $valueStatus){
                            //echo "value: " . $valueStatus;
                        }
                    }
                    if ($_FILES['photo']['name']!="") {
                      $file = $_FILES['photo']['tmp_name'];
                      $filename = $_FILES['photo']['name'];
                      $target_directory = "image/image_quiz/".$result['id_quiz'].'/';

                      $new_image = "quiz_content_".time()."_".str_replace(" ", "", $filename);
                      $target_filepath = $target_directory.$new_image;
                      $image = $new_image;

                      $query = "UPDATE tbl_quiz_content SET image_quiz_content = '".$image."', question_quiz_content = '".$question."', answer_quiz_content = '".$valueStatus."' WHERE id_quiz_content = '".$id."'";

                      if ($result['image_quiz_content'] != "") {
                        unlink('image/image_quiz/'.$result['id_quiz'].'/'.$result['image_quiz_content']);
                      }

                      mysqli_query($conn, $query);
                      move_uploaded_file($file, $target_filepath);

                      ?>
                        <script type="text/javascript">
                          window.location = "javascript:history.go(-1)";
                        </script>
                      <?php

                    }else{
                      $query = "UPDATE tbl_quiz_content SET question_quiz_content = '".$question."', answer_quiz_content = '".$valueStatus."' WHERE id_quiz_content = '".$id."'";

                      mysqli_query($conn, $query);

                      ?>
                        <script type="text/javascript">
                          window.location = "javascript:history.go(-1)";
                        </script>
                      <?php
                    }

                }
             ?>
            <form class="form" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Question</label>
                <div class="col-lg-9">
                  <input class="form-control" name="question" value="<?php echo $result['question_quiz_content'];?>">
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Image Quiz</label>
                <div class="col-lg-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                      <img src="<?php include 'image/baseurl.php'; echo $image.$result['id_quiz'].'/'.$result['image_quiz_content'];?>" alt=""/>
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
                <label class="col-lg-3 col-form-label form-control-label">Answer</label>
                <div class="col-lg-9">
                  <div class="checkbox anim-checkbox">
                    <input type="checkbox" id="ch3" name="status[]" value="1" <?php if($result['answer_quiz_content']=="1"){ ?>checked<?php }?>/>
                    <label for="ch3">True</label>
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