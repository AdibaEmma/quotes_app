<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>

<?php

  $error_msg = "";

  if(isset($_POST['login'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = "SELECT * FROM users ";
  $login_query = mysqli_query($conn, $query);

  while($row = mysqli_fetch_assoc($login_query)) {
      $_SESSION['user_id'] = $user_id = $row['user_id'];
      $db_username = $row['username'];
      $db_password = $row['password'];
      $user_role = $row['user_role'];
  }

  $password_verify = password_verify( $password, $db_password );

  if(  $username == $db_username && $password_verify ) {

      if( $user_role == "subscriber" ) {

        header("Location: profile.php?profile_id={$user_id}");

      } elseif( $user_role == "admin" ) {
  
          header("Location: admin/index.php?profile_id={$user_id}");
  
        } 
    
  
  }  else {
  
  $error_msg = "<h5 class='center-align red-text'>Invalid Username or Password</h5>";
  
    }
  
}
  
?>

<div id="breadcrumbs-wrapper">
          <!-- Search for small screen
          <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
          </div> -->
          <div class="container-fluid">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">User Profile</h5>
                <ol class="breadcrumbs">
                  <li><a href="index.php">Homepage</a></li>
                  <li class="active">User Login</li>
                </ol>
              </div>
            </div>
          </div>
    </div>

<?php echo $error_msg; ?>

    <!-- Form with validation -->
    <div class="col s10 m10 l6">
                  <div class="card-panel login">
                    <h4 class="header2  center-align">Login</h4>
                    <div class="row">
                      <form action="" method="POST" class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name4" type="text" name="username" value="" class="validate">
                            <label for="username">Username</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="password5" type="password" name="password" value="" class="validate">
                            <label for="password">Password</label>
                          </div>
                        </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn waves-effect waves-light right" type="submit" name="login">Login
                                <i class="material-icons right">send</i>
                              </button>
                            </div>
                            <div>Don't have an account yet? why not <a href="registration.php">Create an account</a> with us.</div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


<?php include "includes/footer.inc.php"; ?>