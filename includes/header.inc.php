<?php ob_start(); ?>
<?php session_start(); ?>
<?php

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Super Quotes App</title>
    <!-- Favicons-->
    <link rel="icon" href="assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="assests/images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="assets/css//materialize.css" type="text/css" rel="stylesheet">
    <link href="assets/css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="assets/vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">

    <style>
      div.form_size {
        max-width: 800px;
        padding-left: 150px;
      }

      .btn {
        font-size: 12px !important;
      }

      div.login {
        max-width: 45%;
        position: relative;
        top: 10px;
        left: 350px;
        bottom: 200px;
      }

      div.login form {
        margin-right: none !important;
        margin-left: none !important;
      } 


      div.edit_profile {
        position: relative;
        bottom: 423px;
        left: 300px !important;
      }


      li.welcome_address {
          font-size: 22px;
          font-weight: bold;
      }
    </style>
  </head>
  <body>
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper"> -->
    <!-- <div id="loader"></div> -->
    <!-- <div class="loader-section section-left"></div> -->
    <!-- <div class="loader-section section-right"></div> -->
    <!-- </div> -->
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-65deg-white">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.html" class="brand-logo darken-1">
                    <img src="assets/images/logo/materialize-logo.png" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down">Tabular Rasa</span>
                  </a>
                </h1>
              </li>
            </ul>
            

            <ul class="right hide-on-med-and-down">
            
                <?php 

                if(isset($_SESSION['user_id'])) {

                  $user_id = $_SESSION['user_id'];

                $query = "SELECT * FROM users WHERE user_id = {$user_id}";
                $username_query = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($username_query)) {

                $username = ucfirst($row['username']);
                }

                echo "<li class='welcome_address'>Welcome {$username}</li>";

                } else {
                 
                  echo "<li class='welcome_address'>Welcome Guest</li>";

                }

                ?>

              <li>
               <a href="index.php">Home</a>
              </li>
             
              <?php 
                if(isset($_SESSION['user_id'])) {

                  $user_id = $_SESSION['user_id'];
                  
                  echo  "<li><a href='profile.php?profile_id=$user_id'>Profile</a></li>";

                  } 
               
               ?>


              <li>
              <a href="#">Chat</a>
              </li>

              <?php 
                if(isset($_SESSION['user_id'])) {

                  echo "<li><a href='quotes.php?source=add_quote'>Add Quote</a></li>";
                  
                }
                ?>

              <?php 

              if (isset($_SESSION['user_id'])) { ?>
              <li>
              <a class="btn waves-effect waves-light" href="logout.php">Logout</a>
              </li>
              <?php } else { ?>

                <li>
              <a class="btn waves-effect waves-light" href="login.php">Login/SignUp</a>
              </li>
                
            <?php  } ?>
            </ul>

            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICATIONS
                  <span class="new badge">5</span>
                </h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Profile</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Settings</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">live_help</i> Help</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">lock_outline</i> Lock</a>
              </li>
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->