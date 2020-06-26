<?php include "includes/header.inc.php"; ?>
<?php include "../includes/db_connect.php"; ?>


<?php 

if(isset($_GET['profile_id'])) {

  $user_id = $_GET['profile_id'];

}


  $query = "SELECT * FROM users WHERE user_id = $user_id";
  $select_user_query = mysqli_query($conn, $query);
  
  while($row = mysqli_fetch_assoc( $select_user_query )) {

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $user_role = $row['user_role'];
    $email = $row['user_email'];
    $bio = $row['user_bio'];
    $registration_date = $row['date_created'];

    $registration_date = date('d-m-Y', strtotime($registration_date));
  }

?>

  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    
  <!-- START HEADER -->
  <header id="header" class="page-topbar">
    
    <!-- header nav-->
   <?php include "includes/navigation.inc.php"; ?>

  <!-- START MAIN -->
  <div id="main">
      <!-- START WRAPPER -->
  <div class="wrapper">
  <!-- sidebar -->
  <?php include "includes/sidebar.inc.php"; ?>

<div id="card-widgets">
<div class="row">
<div class="col s12 m4 l4">
                  <div id="profile-card" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="../assets/images/gallary/3.png" alt="user bg">
                    </div>
                    <div class="card-content">
                      <img src="../assets/images/avatar/avatar-7.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
                      <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">edit</i>
                      </a>
                      <span class="card-title activator grey-text text-darken-4"><?php echo $firstname. " " . $lastname; ?></span>
                      <p>
                        <i class="material-icons">perm_identity</i><?php echo $user_role; ?></p>
                      
                      <p><i class="material-icons">email</i><?php echo $email; ?></p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><?php echo $firstname. " " . $lastname; ?>
                        <i class="material-icons right">close</i>
                      </span>
                      <p><?php echo $bio; ?></p>
                      <p>
                        <i class="material-icons">perm_identity</i><?php echo $user_role; ?></p>
                      
                      <p>
                        <i class="material-icons">email</i><?php echo $email; ?></p>
                      <p>
                        <i class="material-icons">cake</i>Registration Date: <?php echo $registration_date; ?>
                      </p>
                </div>
            </div>
        </div>
    </div>
</div>
</aside>
        <!-- END RIGHT SIDEBAR NAV-->
</div>
      <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<?php include "includes/footer.inc.php"; ?>