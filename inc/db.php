<?php 
$conn = mysqli_connect('localhost','root','','hotel');
if (!$conn){
    die ("connction Failed:" .mysqli_connect_error());
}
?>
