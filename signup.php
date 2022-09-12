<?php
$title = 'Register';
include 'template/header.php';
$username = $password = $email ='';
$error = [];




/* helping functions */

function redirect($target){
    session_write_close();
        header('Location:' . $target);
        exit;
}



?>
<?php
if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] === TRUE){
    redirect('index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];

if(empty($username)){
    $error['usernameErr'] = 'username required';
}

if(empty($password)){
    $error['passwordErr'] = 'password required';
}


if(empty($email)){
    $error['emailErr'] = 'email required';
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $error['emailErr'] = 'your email invalid';
}
    if (count($error) == 0) {
        $username = mysqli_real_escape_string($conn, $username);
        $password = md5($password);
        $email = mysqli_real_escape_string($conn, $email);
        $insert = mysqli_query($conn, "INSERT INTO user SET username = '$username' , `email` = '$email' , `password` = '$password'");
        if($insert){
            $last_id = mysqli_insert_id($conn);
            $_SESSION['loggedIn'] =true;
            $_SESSION['user_id'] = $last_id;
            redirect('index.php');
        }else{
            echo '<div class="alert alert-warning"> Register error</div>';

        }
    }
}
?>
<br><br><br><br><br><br>

<div class = "text-center">
</div>
<form method="post" >
    <div class="form-group">

    <div class="col">
        <input type="text" class="form-control" id="username" name="username" placeholder=" Your User Name" require
            value="<?=isset($username) ? $username : '' ?>">
        <div class="text-danger"><?= isset($error['usernameErr']) ? $error['usernameErr'] : '' ?></div>
    </div></div>
    <br>
    <div class="form-group">

<div class="col">
    <input type="text" class="form-control" id="email" name="email" placeholder="Your Email" require
        value="<?=isset($email) ? $email : '' ?>">
    <div class="text-danger"><?= isset($error['emailErr']) ? $error['emailErr'] : '' ?></div>
</div></div>
    <br>
    <div class="form-group">
    <div class="col">
        <input type="password" class="form-control" id="password" name="password" placeholder=" Your password">
        <div class="text-danger"><?= isset($error['passwordErr']) ? $error['passwordErr'] : '' ?></div>
    </div></div>
    <br>
    <div class="text-center">
    <div class="form-group">
        <input class="btn btn btn-warning btn-lg" style="font-weight:bold;color:#4C7031;" type="submit" value="Signup">
        </div> 
    </div>

<br>
</form>

<?php 
echo '<br>';
include 'template/footer.php';?>