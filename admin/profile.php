<?php include "includes/header.inc.php"; ?>
<?php include "../includes/db_connect.php"; ?>

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
    
    <!-- start header nav-->
   <?php include "includes/navigation.inc.php"; ?>

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
                      <span class="card-title activator grey-text text-darken-4">Roger Waters</span>
                      <p>
                        <i class="material-icons">perm_identity</i> Project Manager</p>
                      <p>
                        <i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                      <p>
                        <i class="material-icons">email</i> yourmail@domain.com</p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Roger Waters
                        <i class="material-icons right">close</i>
                      </span>
                      <p>Here is some more information about this card.</p>
                      <p>
                        <i class="material-icons">perm_identity</i> Project Manager</p>
                      <p>
                        <i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                      <p>
                        <i class="material-icons">email</i> yourmail@domain.com</p>
                      <p>
                        <i class="material-icons">cake</i> 18th June 1990
                      </p>
                      <p>
                      </p>
                      <p>
                        <i class="material-icons">airplanemode_active</i> BAR - AUS
                      </p>
                      <p>
                      </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.inc.php"; ?>