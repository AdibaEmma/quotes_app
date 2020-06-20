<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>

<?php

  if(isset($_POST['login'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];

   $query = "SELECT * FROM users ";
  $login_query = mysqli_query($conn, $query);

  while($row = mysqli_fetch_assoc($login_query)) {
      $user_id= $row['user_id'];
      $db_username = $row['username'];
      $db_password = $row['password'];
      $user_role = $row['user_role'];
  }


  $_SESSION['user_id'] = $user_id;
    
  if(  $username == $db_username && $password == $db_password && $user_role == "subscriber" ) {

      header("Location: profile.php?profile_id={$user_id}");

  } elseif(  $username == $db_username && $password == $db_password && $user_role == "admin" ) {

      header("Location: admin/index.php?profile_id={$user_id}");
 
  } else {

      echo "<h1 class='center-align red-text'>Login Error</h1>";

  }


  }


?>
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
                            <div>Don't have an account yet? why not <a href="registration.php">signup</a> with us.</div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


<?php include "includes/footer.inc.php"; ?>