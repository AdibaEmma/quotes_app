<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>

<?php
    if(isset($_GET['profile_id'])) {

        $user_id = $_GET['profile_id'];
    }
$query = "SELECT * FROM users WHERE user_id = {$user_id}";
    $select_user_query = mysqli_query($conn , $query);

    confirmQuery( $select_user_query);

    while($row = mysqli_fetch_array( $select_user_query )) {
        $user_id = $row['user_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_bio = $row['user_bio'];
    }
?>

 <!--card widgets start-->
 <div id="card-widgets">
              <div class="row">
                <div class="col s12 m4 l4">
                  <div id="profile-card" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="assets/images/gallary/3.png" alt="user bg">
                    </div>
                    <div class="card-content">
                      <img src="assets/images/avatar/avatar-7.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
                      <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">edit</i>
                      </a>
                      <span class="card-title activator grey-text text-darken-4"><?php echo $firstname . " " .  $lastname; ?> </span>
                      <p>
                        <i class="material-icons">perm_identity</i> <?php echo $user_role; ?>
                      </p>
                      <p>
                      <i class="material-icons">email</i> <?php echo $user_email; ?>
                      </p>
                      <p>
                      <i class="material-icons">account_circle</i> <?php echo $username; ?>
                      </p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><?php echo $firstname . " " .  $lastname; ?>
                        <i class="material-icons right">close</i>
                      </span>
                      <p><?php echo $user_bio; ?></p>
                      <p>
                        <i class="material-icons">perm_identity</i><?php echo $user_role; ?></p>
                      
                      <p>
                        <i class="material-icons">email</i> <?php echo $user_email; ?>
                    </p>
                    <p>
                        <i class="material-icons">account_circle</i> <?php echo $username; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>





<?php include "includes/footer.inc.php"; ?>