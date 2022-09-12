<?php 
$title = 'Order Handler';
include 'template/header.php'; 


// to complete the order
if (isset($_GET['action']) and $_GET['action'] === 'completed' and isset($_GET['id']) and !empty($_GET['id'])) {
    $id=mysqli_real_escape_string($conn,$_GET['id']);
    $sql ="UPDATE `add` SET `status` = 'completed' WHERE id='$id'";
    $completed = mysqli_query($conn, $sql);
    if ($completed) {
        
    $_SESSION['message'] = "Order with ID#$id has been finished.";
    header('location:index.php');
    }else{
        // echo mysqli_error($conn);
        echo "<div class='alert alert-warning'>something went wrong while change status</div>";
    } 
    // to undo compelete the order

}elseif(isset($_GET['action']) and $_GET['action'] === 'uncompleted' and isset($_GET['id']) and !empty($_GET['id'])){
    $id=mysqli_real_escape_string($conn,$_GET['id']);
    $sql ="UPDATE `add` SET `status` = 'uncompleted' WHERE id='$id'";
    $completed = mysqli_query($conn, $sql);
    if ($completed) {
    $_SESSION['message'] = "Order with ID#$id has been reset to uncompleted.";
    header('location:index.php');
    }else{
        // echo mysqli_error($conn);
        echo "<div class='alert alert-warning'>something went wrong while change status</div>";

    } 
}else{
    header('location:showOrder.php');
} 





include 'template/footer.php';
?>