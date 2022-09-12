<?php
$title = 'Add to my Room';
include 'template/header.php';

if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] === true){
    if(isset($_GET['pid']) and !empty($_GET['pid'])){
        $room_id = filter_input(INPUT_GET, 'pid', FILTER_VALIDATE_INT);
        $user_id =$_SESSION['user_id'];
        // check if place exists
       $check = mysqli_query($conn,"SELECT * FROM `add` WHERE room_id='$room_id' AND user_id = '$user_id' AND `status`= 'uncompleted'");
        if ($check AND mysqli_num_rows($check) > 0) {
            die('<div class="alert alert-primary" role="alert">this room already in ur room!</div>');
            
        }
        
        // add new place to fav
        $orders = mysqli_query($conn, "INSERT INTO `add` SET user_id = '$user_id', `room_id` = '$room_id'");
        if($orders){
            echo '<div class="alert alert-success" role="alert">The Item has Been add</div>';
   
        }
    }

}