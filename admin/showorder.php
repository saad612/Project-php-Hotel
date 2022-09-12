<?php 
$title = 'show orders';
include 'template/header.php'; 
$sql ="
SELECT `add`.id , `add`.status , user.username , room.roomtype
FROM `add`
INNER JOIN user ON `add`.user_id=user.id 
INNER JOIN room ON `add`.room_id=room.id;
";
$orders = mysqli_query($conn, $sql);
if(mysqli_num_rows($orders) > 0){
    echo '
    <br><br><br><br><br>
    <div class="container">
    <table class="table display" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-light">
      <tr>
        <th scope="col">#ORDER ID</th>
        <th scope="col">User </th>
        <th scope="col">Product</th>
        
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>';
    while($row = mysqli_fetch_assoc($orders)){
            echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['roomtype'].'</td>
            <td>'.$row['status'].'</td>';
            ?>

<td>
    <?php if($row['status'] ==='uncompleted'):?>
    <a href="orderHandler.php?action=completed&id=<?= $row['id']?>" class="btn btn-sm btn-warning">Complete</a>
    <?php elseif($row['status'] ==='completed'): ?>
    <a href="orderHandler.php?action=uncompleted&id=<?= $row['id']?>" class="btn btn-sm btn-dark">unComplete</a>
    <?php endif;?>
    <a onclick="if(!confirm('Are you sure you want to delete?')) return false;"
        href="deleteorder.php?action=delete&id=<?= $row['id']?>" class="btn btn-sm btn-danger">Delete</a>
</td>
</tr>

<?php
}//endwhile
    echo "</tbody>
    </table></div>";
}else{
  echo "<div class='container'><div class='alert alert-warning'> No order yet!</div></div>";
}
?>
