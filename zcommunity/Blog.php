<?php
if(!isset($_SESSION)){
  session_start();
} 
include_once('../dbconnection.php');
include('./cominclude/socialheader.php');
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
    }
?>
<div class="align-items-center justify-content-center text-center" style="margin-top: 60px;">
  <div class="row">
      <div class="col">
      <div class="">
            <h1 class="bg-light text-dark p-2 radius-5" style=" border-radius: 10px;">Become A Helper</h1>  
      </div>
    </div>
  </div>
</div>

<?php

if(isset($_POST["postnotes"])) {
  $file = $_FILES['file'];
  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_size = $file['size'];
  $file_error = $file['error'];
  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
  $note_category = $_REQUEST['note_category'];
  $note_desc = $_REQUEST['note_desc'];
  $note_email = $_REQUEST['note_email'];
  $post_date = $_POST['post_date'];

  $allowed_ext = array("pdf");

  if(in_array($file_ext, $allowed_ext)) {
    if($file_error === 0) {
      if($file_size <= 1000000) {
        $pdf_path = "../DocFiles/" . uniqid('', true) . "." . $file_ext;
        move_uploaded_file($file_tmp, $pdf_path);

        $sql = "INSERT INTO notes(file, note_email, note_category, post_date, note_desc) VALUES ('$pdf_path', '$note_email', '$note_category', '$post_date', '$note_desc')";
        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      } else {
        echo "File size must be less than 1MB.";
      }
    } else {
      echo "Error uploading file.";
    }
  } else {
    echo "Only PDF files are allowed.";
  }
}
?>

<section> 

<div class="container mt-5 mb-3">
  <div class="row">
    <?php
    $sql = "SELECT * FROM notes JOIN student ON notes.note_email = student.stu_email ORDER BY file DESC";
    $result = $conn->query($sql);

    // display links to view PDF files
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $pdf_path = $row["file"];

        // Get the date the post was created
        $post_date = $row['post_date'];

        echo '<div class="col-md-4">
          <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <div class="icon"><img class="img-fluid" src="'.$row['stu_img'].'" alt="User" style="max-width: 100%; max-height: 100%; object-fit: contain;"></a></div>
                <div class="ms-2 c-details">
                  <h6 class="mb-0">'.$row['stu_name'].'</h6>
                  <span id="post-date">Posted: '.$post_date.'</span>
                </div>
              </div>
              <div class="badge"> <span>'.$row['note_category'].'</span> </div>
            </div>
            <div class="mt-5">
              <h3 class="heading">'.$row['note_desc'].'</h3>
              <div class="mt-5">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="mt-3"> <span class="text1"><i class="fa-solid fa-file-pdf"></i><span class="text2"><a href="#" data-bs-toggle="modal" data-bs-target="#pdfModal" data-bs-path="'.$pdf_path.'">Preview</a></span></span> </div>
              </div>
            </div>
          </div>
        </div>';
      }
    } else {
      echo "No PDF files found.";
    }
    ?>
  </div>
</div>

<!-- PDF Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 80%; max-height: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" id="pdfIframe" src="" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
  </section>

<script>
  var pdfModal = document.getElementById('pdfModal');
  pdfModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    var pdfPath = button.getAttribute('data-bs-path');
    var modalBody = pdfModal.querySelector('.modal-body');
    // Set the src attribute of the iframe with the PDF path
    modalBody.querySelector('iframe').setAttribute('src', pdfPath);
  })

  // For the date

  // Get the post date element
const postDate = document.getElementById("post-date");

// Get the date the post was created
const post_date = postDate.textContent.split(" ")[1]; // Assumes format: "Posted: YYYY-MM-DD"
const postDateObj = new Date(post_date);

// Get the current date
const currentDateObj = new Date();

// Calculate the difference in days between the current date and the post date
const timeDiff = currentDateObj.getTime() - postDateObj.getTime();
const diffDays = Math.floor(timeDiff / (1000 * 3600 * 24));

// Update the post date element with the number of days since the post was created
postDate.textContent = `${diffDays} days ago`;
</script>

 

<!-- Posting -->
      <div class="fixed-bottom" id="" style="text-align: right; margin-right: 50px; margin-bottom: 100px;">
            <?php
            if(isset($_SESSION['is_login'])){ 
                echo '<a class="btn btn-dark box" href=""  data-toggle="modal" data-target="#shareKnowledge"><i class="fas fa-plus fa-2x"></i></a>';
            }else{
              echo '<a class="btn btn-dark box" href="../loginor.php"  "><i class="fas fa-plus fa-2x"></i></a>';
            }
            ?>
      </div>


<!-- Modal for sharing PDF File -->
<div class="modal fade" id="shareKnowledge" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"> <!-- modal-dialog-centered -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareModalLabel">Add Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="note_category" class="col-form-label">Post Name:</label>
            <input type="text" class="form-control" id="note_category" name="note_category">
            <label for="note_desc" class="col-form-label">Post Description:</label>
            <input type="text" class="form-control" id="note_desc" name="note_desc">
            <label for="file">Select PDF file:</label>
            <input type="file" name="file" id="file">
            <input type="submit" name="postnotes" value="postnotes">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"  id="postnotes" name="postnotes">Add Post</button>
          <input type="hidden" name="note_email" id="note_email" value="<?php echo $stuLogEmail ?>">
          <input type="hidden" name="post_date" value="<?php echo date('Y-m-d'); ?>" readonly />
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="pdfModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

                <embed src="<?php echo $pdf_path ?>" frameborder="0" width="100%" height="400px">

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script>





</script>

<?php 
include('./cominclude/socialfooter.php');
?>