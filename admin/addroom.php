<?php
$title = 'Add new room';
include 'template/header.php';
$roomtype = $image = $description = $price='';
$error = [];
?>
<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$roomtype = $_POST['roomtype'];
$description =$_POST['description'];
$price =$_POST['price'];

if(empty($roomtype)){
    $error['roomtypeErr'] = 'roomtype required';
}

if(empty($description)){
    $error['descriptionErr'] = 'description required';
}
if(empty($price)){
    $error['priceErr'] = 'price required';
}

// check if there is a file ?
if(isset($_FILES['fileToUpload']) and $_FILES['fileToUpload']['error'] == 0):
 
        // set allowd files extensions and their MIME types
        $allowedFiles = [
            'jpg' => 'image/jpeg',
            'png' => 'image/png',

          ];
      
        // get MIME of the uploaded file
        $fileMIMEType = mime_content_type($_FILES['fileToUpload']['tmp_name']);
            if(!in_array($fileMIMEType,$allowedFiles)):
                $error['places_imageErr'] = 'this is not allowed extension!';
            endif;
            // set max file size
            
            $maxSize  = 5 * 1048576;// 1MB = 1048576
            $fileSize = $_FILES['fileToUpload']['size'];
            if($fileSize > $maxSize ):
                $error['places_imageErr'] = 'Only files under 5MB';
            endif;
        
  endif; // end $_FILES
  
    if (count($error) == 0) {
        $roomtype = mysqli_real_escape_string($conn,$roomtype);
        $price= mysqli_real_escape_string($conn,$price);
        $image = mysqli_real_escape_string($conn,$image);
        $description =mysqli_real_escape_string($conn,$description);
        // upload
        $path = dirname(__FILE__).'/../assets/img/'; 
        if (is_dir($path)) {
            $fileName = time().'_'.$_FILES['fileToUpload']['name'];
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path . '/' . $fileName); // Move File (Image) $path
        }else{
            echo '<div class="alert alert-danger">There is no directory with this name !!!</div>';
        }
        $image = 'assets/img/'.$fileName; // database 
        $sql = "INSERT INTO room SET `roomtype` ='$roomtype', `image`='$image', `description` ='$description', `price`='$price'";
        $insert = mysqli_query($conn, $sql);
        if($insert){
            echo '<div class = "alert alert-success">Room has been Add </div>';
        }else{
            // echo mysqli_error($conn);
            echo '<div class="alert alert-warning"> failed adding Room  </div>';

      }// end if insert
  
    }
    // end no error if

}

// end submit if


?>
<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
         <section class="ftco-section img bg-hero" 
style="  background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url(../assets/img/bg.jpg);
background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover; "> 
   <!-- <br><br>
    <div class="container">
    <br><br> --> 
    <center>
    <div class="col-lg-5">
					<div class="contact-wrap w-100 p-md-5 p-4">
    <h3 class="mb-4"> add new room </h3>
    <form method="post" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="form-group">
            <label for="productName"> Room Name : </label>
     <input type="text" class="form-control" id="roomName" name="roomtype" placeholder="roomtype">
            <div class="text-danger"><?= isset($error['roomtypeErr']) ? $error['roomtypeErr'] : '' ?></div>
        </div>
        <div class="col-md-12">
        <div class="form-group">
            <label for="pImage"> Room image : </label>
            <input type="file" class="form-control" id="RoomImage" name="fileToUpload" required>
            <div class="text-danger"><?= isset($error['imageErr']) ? $error['imageErr'] : '' ?></div>

           </div>
        </div>
        <div class="col-md-12">
        <div class="form-group">
            <label for="description">description : </label>
            <input type="text" class="form-control" id="description" name="description" placeholder="description">
                <div class="text-danger"><?= isset($error['descriptionErr']) ? $error['descriptionErr'] : '' ?></div>
        </div>
        <div class="col-md-12">
        <div class="form-group">
            <label for="price"> price </label>
            <input type="text" class="form-control" id="price" name="price"
                placeholder="price">
                <div class="text-danger"><?= isset($error['priceErr']) ? $error['priceErr'] : '' ?></div>

        </div>

        <div class="form-group">
            <input class="btn btn btn-primary" type="submit" value="add Room">
        </div>

    </form>


</div>
</center>

</body>
</html>
<br>
<br>

<?php 
include 'template/footer.php';?>