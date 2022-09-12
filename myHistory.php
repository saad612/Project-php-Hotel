<?php
$title = 'My History';
include  'template/header.php';
?>
<br><br><br><br><br><br>

<?php
if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] === true){
    $user_id = $_SESSION['user_id'];
    $myhistory = mysqli_query($conn, "SELECT * FROM `add` WHERE user_id='$user_id' and `status` = 'completed'");
    if(mysqli_num_rows($myhistory) > 0){
        echo '<div class="row">';
        $totalPrice = 0;
        while($row = mysqli_fetch_assoc($myhistory)): // looping products
            $pid =$row['room_id'];
            $products = mysqli_query($conn, "SELECT * FROM `room` WHERE id='$pid'");
            if(mysqli_num_rows($products) >0 ){
                while($p = mysqli_fetch_assoc($products)):
                    echo ' <center>
                    <h1 >My History Order </h1>
                     <div class="card" style="width: 18rem;">
                    <img src="'.$p['image'].'" class="card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">Room type : '.$p['roomtype'].'</h5>
                      <h5 class="card-title"> '.$p['description'].'</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Price : '.$p['price'].'</h6>
                    </div>
                  </div> ';         

            
                 endwhile;
            }
        endwhile;
        echo '</div>';

    }else{
    echo '<div class="alert alert-warning"> you don\'t buy anythin </div>';
    }
}