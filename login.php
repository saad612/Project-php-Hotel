<?php
$title = 'LogIn';
include 'template/header.php';?>
<?php

if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn']=== TRUE){
  header('Location:index.php');
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = md5($_POST['password']);
  $login = mysqli_query($conn,"SELECT id FROM user WHERE username='$username' and `password`='$password'");
  if(mysqli_num_rows($login)==1){
    $id = mysqli_fetch_assoc($login)['id'];
    $_SESSION['loggedIn']=TRUE;
    $_SESSION['user_id']=$id;
    $_SESSION['users_name']=$username;
    
    header('Location:index.php');

  }else{
    echo '<div class="alert alert-danger" role="alert"> User Name Or Password Is Wrong!</div>';
  }
}



?>
<br><br><br><br><br><br>
<form method="post">
    <div class="form-group">
    <center>
    <div class="col-lg-5">
					<div class="contact-wrap w-100 p-md-5 p-4">
    <h3 class="mb-4"> Log in </h3>
    <div class="col-lg-5">

    <div class="col">
    <input type="text" class="form-control" id="username" name="username" placeholder="username" require>
       
    </div></div>
    <br>
    <div class="col-lg-5">
    <div class="form-group">
    <div class="col">
        <input type="password" class="form-control" id="password" name="password" placeholder="password">
    </div></div>
    <br>
    <div class="text-center">
    <div class="form-group">
        <input class="btn btn btn-warning btn-lg" type="submit" value="log In">
        </div>
        <div class="sign-up" style="font-size:xx-small">Not a member ?<a href="signup.php" style="font-size:xx-small ;">SingUp</a></div>
      
    </div>
</center>
</form>
<br> <br>

<?php

include 'template/footer.php';?>