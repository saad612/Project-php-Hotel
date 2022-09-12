<?php
$title ='My Rooms';
include 'template/header.php'; ?>
<br><br><br><br><br><br><br> 
<?php 
if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] === true){


    // Button Cancel 

    if(isset($_GET['action']) and $_GET['action'] === 'cancel' and isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $user_id = $_SESSION['user_id'];
        
        $delete = mysqli_query($conn,"UPDATE `add` SET `status` = 'cancel' WHERE room_id ='$id' AND user_id='$user_id'");
        if($delete){
            echo 'Your Room has been canceled';
          
            header('Location:myroom.php');
        }
     die();
    }
    // End code Cancel 
    
    /// اظهار الطلبات بشرط انه يكون غير مكتمل 
    
    $user_id = $_SESSION['user_id'];
    $listOrders = mysqli_query($conn, "SELECT * FROM `add` WHERE user_id='$user_id'AND `status`= 'uncompleted' ");
    if(mysqli_num_rows($listOrders) > 0){
        echo '<div class="row">';
        $totalPrice = 0;
        while($row = mysqli_fetch_assoc($listOrders)): // looping products
            $pid =$row['room_id'];
            // اظهار من جدول الروم بشرط اظهار 
            $products = mysqli_query($conn, "SELECT * FROM `room` WHERE id='$pid'");
            if(mysqli_num_rows($products) > 0 ){
                while($p = mysqli_fetch_assoc($products)):  
                    
                    echo ' <center> <div class="card" style="width: 18rem;">
                    <img src="'.$p['image'].'" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">Name : '.$p['roomtype'].'</h5>
                      <h5 class="card-title"> description: '.$p['description'].'</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Price : '.$p['price'].'</h6>
                      <a href="myroom.php?action=cancel&id='.$p['id'].'" class="btn btn-dark btn-sm">cancel Room</a>
                    </div>
                  </div>';         
                  $totalPrice += $p['price'];
                 endwhile;
            }
        endwhile;
        echo '</div>';
        echo " <center> <h5>TOTAL PRICE $totalPrice</h5> </center>";

    }else{
    echo '<div class="alert alert-warning"> you have an empty room</div>';
    }
}