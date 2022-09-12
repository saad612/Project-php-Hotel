<?php 
$title = 'show room';
include 'template/header.php'; 
$sql ="SELECT room.id,room.roomtype,room.image,room.price,room.description
 FROM room";
$orders = mysqli_query($conn, $sql);
if(mysqli_num_rows($orders) > 0){
    echo ' <br><br> <br><br><br> <br>
    <div class="container">
    <table class="table table-borderless>
    <thead class="thead-light">
      <tr>
        
        <th scope="col"> </th>
        <th scope="col"> </th>
        <th scope="col"> </th>
        <th scope = "col"></th>
        <th scope = "col"></th>
      </tr>
    </thead>
    <tbody>';
    while($row = mysqli_fetch_assoc($orders)){
            echo '<tr>
           
             <td><img src="../'.$row['image'].'" witdh="400" height="200px"></td>
             <td><h3>'.$row['roomtype'].'</h3>
             <br>
             '.$row['description'].'
             </td>
             <td><br><br>  ' .$row['price'].' </td>
        ';
            ?>

<td>
    <a href="editroom.php?action=edit&id=<?= $row['id']?>" class="btn btn-sm btn-info">Edit</a>
    <a onclick="if(!confirm('Are you sure you want to delete?')) return false;"
        href="deleteroom.php?action=delete&id=<?= $row['id']?>" class="btn btn-sm btn-danger">Delete</a>
</td>
</tr>
<?php
}//endwhile
    echo "</tbody>
    </table></div>";
} else{
  echo "<div class='container'><div class='alert alert-warning'> Not found places for now!</div></div>";

}
include 'template/footer.php'; 
?>