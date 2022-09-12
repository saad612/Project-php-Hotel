<?php

$title = 'Delete Order';
include 'template/header.php';

if (isset($_GET['action']) and $_GET['action'] === 'delete' and isset($_GET['id']) and !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $del = mysqli_query($conn, "DELETE FROM `add` WHERE id='$id'");
    if($del){
        $_SESSION['message']= 'Order has been Deleted successfully';
        header('location:index.php');
    }else{
        echo mysqli_error($conn);
        // echo "<div class='container'><div class='alert alert-warning'> you cannot delete this user , because he have uncompeleted order, remove the order to remove him.</div></div>";
    }
}else{
    header('location:index.php');
}

include 'template/footer.php';