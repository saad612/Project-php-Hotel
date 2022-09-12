<?php
$title ='Rooms';
include 'template/header.php';
?>
<html><style>
h1   {  background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
  text-align:center;
  color:#6c757d;
 }

</style></html>
<br><br><br><br><br><br>
<h1> Rooms </h1> 
<?php
$sql = "SELECT room.id,room.roomtype,room.image,room.description,room.price from room" ;
$orders = mysqli_query($conn, $sql);
if(mysqli_num_rows($orders) > 0){
    echo '
<div class="container">
<table class="table table-borderless">
<thead class="thead-light">
<tr>
  <th scope="col"> </th>
  <th scope="col"> </th>
  <th scope="col"> </th>
  <th scope="col"></th>
  <th scope="col"></th>
</tr>
</thead>
<tbody>';
    while($row = mysqli_fetch_assoc($orders)){
            echo '<tr>
            <td><img src="'.$row['image'].'" witdh="400" height="200px"></td>
            <td><h3>'.$row['roomtype'].'</h3>
            <br>
            '.$row['description'].'
            </td>
            <td><br><br>  ' .$row['price'].' </td>
           
            
            ';
            ?>

<td> <br>
<?php
if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] === true) {
                  echo '<a href="addroom.php?pid='.$row['id'].'" class="btn btn-primary btn-m">Book now</a>';
              }else{
                  echo '<a href="register.php" class="btn btn-primary btn-m">Register Here To Order</a>';
              }
?>
</td>
</tr>
<?php
}//endwhile
    echo "</tbody>
    </table></div>";
}else{
  echo "<div class='container'><div class='alert alert-warning'> Not found products for now!</div></div>";

}
include 'template/footer.php';
?>

