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
            <h4>Add Quiz Content</h4>
          </div>
          <div class="card-body">
            <?php 
                $id = $_GET['addqc'];    
                if (isset($_POST['submit'])) {
                    $question = addslashes($_POST['question']);
                    $status = $_POST['status'];
                    if(!empty($status)){
                        foreach($status as $valueStatus){
                        }
                    }
                    if ($_FILES['photo']['name']!="") {
                      $file = $_FILES['photo']['tmp_name'];
                      $filename = $_FILES['photo']['name'];
                      $target_directory = "image/image_quiz/".$id.'/';

                      $new_image = "quiz_content_".time()."_".str_replace(" ", "", $filename);
                      $target_filepath = $target_directory.$new_image;
                      $image = $new_image;

                      $query = "INSERT INTO tbl_quiz_content (id_quiz, image_quiz_content, question_quiz_content, answer_quiz_content) VALUES ('".$id."', '".$image."', '".$question."', '".$valueStatus."')";

                      mysqli_query($conn, $query);
                      move_uploaded_file($file, $target_filepath);

                      $_SESSION['aqc']="Question content successfuly added with image";
                      ?>
                        <script type="text/javascript">
                          window.location = "javascript:history.go(-1)";
                        </script>
                      <?php

                    }else{
                      $query = "INSERT INTO tbl_quiz_content (id_quiz, question_quiz_content, answer_quiz_content) VALUES ('".$id."', '".$question."', '".$valueStatus."')";

                      mysqli_query($conn, $query);
                      $_SESSION['aqc']="Question content successfuly added";
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
                  <input class="form-control" name="question">
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">Image Quiz</label>
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
                    <input type="checkbox" id="ch3" name="status[]" value="1"/>
                    <label for="ch3">True</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12 text-center">
                  <p style="color: green"><?php echo $_SESSION['aqc'];?></p>
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