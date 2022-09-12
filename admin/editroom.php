<?php
$title = 'Edit Room';
include 'template/header.php';
$roomtype = $image = $description = $price='';
$error = [];
?>
<?php


if (isset($_GET['action']) and $_GET['action'] === 'edit' and isset($_GET['id']) and !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql ="SELECT room.id,room.roomtype,room.image,room.price,room.description
    FROM room";
   
    $productItem = mysqli_query($conn, $sql);
    $productFetch = mysqli_fetch_assoc($productItem);

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
        if (isset($_FILES['fileToUpload']) and $_FILES['fileToUpload']['error'] == 0):
    
        // set allowd files extensions and their MIME types
        $allowedFiles = [
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
          ];
      
        // get MIME of the uploaded file
        $fileMIMEType = mime_content_type($_FILES['fileToUpload']['tmp_name']);
        if (!in_array($fileMIMEType, $allowedFiles)):
                $error['product_imageErr'] = 'this is not allowed extension!';
        endif;
        // set max file size
        //5.242.880
        // 5 MB Max
            $maxSize  = 5 * 1048576;// 1MB = 1048576
            $fileSize = $_FILES['fileToUpload']['size'];
        if ($fileSize > $maxSize):
                $error['product_imageErr'] = 'Only files under 5MB';
        endif;
        
        endif; // end $_FILES
  
        if (count($error) == 0) {
            $roomtype = mysqli_real_escape_string($conn,$roomtype);
            $image = mysqli_real_escape_string($conn,$image);
            $description =mysqli_real_escape_string($conn,$description);
            $pice = mysqli_real_escape_string($conn,$price);

            // upload
            $path = dirname(__FILE__).'/../assets/img/';
            if (is_dir($path)) {
                $fileName = time().'_'.md5($_FILES['fileToUpload']['name']);
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path . '/' . $fileName);
            } else {
                echo '<div class="alert alert-danger">There is no directory with this name !!!</div>';
            }
            $image = 'assets/img/'.$fileName;
 $sql = "UPDATE  room SET  `roomtype` ='$roomtype',`description` ='$description' ,`price` ='$price'";

            if(isset($_FILES['fileToUpload']) and $_FILES['fileToUpload']['error'] == 0){
                $sql .= ",image='$image' WHERE id='$id' ";
            }   else{
                $sql .= " WHERE id='$id'  ";
            

            } 
                    
            
            
            $insert = mysqli_query($conn, $sql);
            if ($insert) {
                echo '<div class="alert alert-success">Places has been updated </div>';
                
            
            } else {
                echo mysqli_error($conn);
                echo '<div class="alert alert-warning"> failed update places </div>';
            }// end if insert
        }// end no error if
    }// end submit if
?>
<br><br><br><br><br><br>
<br>
<div class="container">
    <h1> update room </h1>

    <form method="post" enctype="multipart/form-data">
       


            
        <div class="form-group">
            <?php if(isset($productFetch['image'])){
             echo "<img src='../".$productFetch['image']."' width='400' height='200'>";
            }?>
            <label for="pImage"> Room image : </label>
            <input type="file" class="form-control" id="pImage" name="fileToUpload">
            <div class="text-danger"><?= isset($error['imageErr']) ? $error['imageErr'] : '' ?></div>
        </div>


         <div class="form-group">
            <label for="placesName"> roomtype: </label>
            <input type="text" class="form-control" id="roomtype" name="roomtype" placeholder="Roomtype"
                value="<?=isset($productFetch['roomtype']) ? $productFetch['roomtype'] : $roomtype ?>">
            <div class="text-danger"><?= isset($error['roomtypeErr']) ? $error['roomtypeErr'] : '' ?></div>
        </div>



        <div class="form-group">
            <label for="description">description : </label>
            <input type="text" class="form-control" id="description" name="description"
                placeholder="description"
                 value="<?=isset($productFetch['description']) ? $productFetch['description'] : $description ?>"> 

                <div class="text-danger"><?= isset($error['descriptionErr']) ? $error['descriptionErr'] : '' ?></div>

          
        </div>
        <div class="form-group">
            <label for="price"> price </label>
            <input type="text" class="form-control" id="menu" name="price"
                placeholder="price"
                value="<?=isset($productFetch['price']) ? $productFetch['price'] : $price?>"> 

                <div class="text-danger"><?= isset($error['priceErr']) ? $error['priceErr'] : '' ?></div>

        </div>

    

        <div class="form-group">
            <input class="btn btn-block btn-success" type="submit" value="Edit Room">
        </div>

    </form>


</div>


<?php 
}// end if get paramters 
else{
header('Location:showroom.php');
}?>