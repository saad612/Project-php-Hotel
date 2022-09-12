<?php
session_start();
include 'inc/db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> s&h hotel <?=$title ?></title> 
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logo.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
  <!--      <link href="css/bootstrap-rtl.css" rel="stylesheet" /> -->
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <style>
                #mainNav {
                    background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
  text-align:center;
  color:#6c757d;
                }
            </style>
            <div class="container px-4 px-lg-5">
       <img src="assets/logo.jpg " width="50px" class = "ml-3" style="padding-right: 10px;">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="Rooms.php">Rooms</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact2.php">Contact</a></li>
                        
                        <?php if(isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] ===true):?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
                        <li class="nav-item"><a class="nav-link" href="myroom.php">myroom</a></li>
                        <?php else: ?>

                            <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    