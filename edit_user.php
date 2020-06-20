<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>
<?php include "includes/functions.php"; ?>
<?php
	//default value for inputs
	$firstname = $lastname = $email = $username = $bio = $password = '';
	$errors = $arrayName = array('firstname'=>'', 'lastname'=>'', 'email'=>'', 'username'=>'', 'password'=>'', 'bio'=>'');

		
if(isset($_POST['register'])) {

  
  if (empty($_POST['firstname'])) {
    $errors['firstname'] = 'Field cannot be empty';
  } else{
      $firstname = ucwords(escapeInjection($_POST['firstname']));

      if(!preg_match('/^[a-zA-Z]+$/', $firstname)){
        $errors['firstname'] = 'Name cannot contain spaces,numbers or symbols';
      }
    }
    
  
    if (empty($_POST['lastname'])) {
      $errors['lastname'] = 'Field cannot be empty';
    } else{
        $lastname = ucwords(escapeInjection($_POST['lastname']));

        if(!preg_match('/^[a-zA-Z]+$/', $lastname)){
          $errors['lastname'] = 'Name cannot contain spaces,numbers or symbols';
        }
      }

		if (empty($_POST['email'])) {
		$errors['email'] = 'Field cannot be empty';
	} else {

      $email = escapeInjection($_POST['email']);

			if(!preg_match('/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email)){
				$errors['email'] = 'Enter a valid email address';
			}
		}

		// check username
	if (empty($_POST['username'])) {
    $errors['username'] = 'Field cannot be empty';
	} else{
      $username = escapeInjection($_POST['username']);
  
			if(!preg_match('/^[a-zA-Z\d]{4,12}$/', $username)){
			$errors['username']	= 'Invalid Username';
			}
  }
  
  if(!empty($_POST['password'])) {
    if(strlen($_POST['password'] <= 3)) {
      $errors['password'] = "Must be greater than 3 characters";
    }  else {
        $password = escapeInjection($_POST['password']);
    }
  }
  
      if(strlen($_POST['bio']) > 255){
				$errors['bio'] = 'max length exceeded';
			} else {
          $bio = ucfirst(escapeInjection($_POST['bio']));
      }

			
      

  if (!array_filter($errors)) {
    $query = "INSERT INTO users (firstname, lastname, user_email, username, password, user_bio) ";
    $query .= "VALUES ('{$firstname}','{$lastname}','{$email}', '{$username}','{$password}', '{$bio}')";

    $create_user_query = mysqli_query($conn, $query);

    confirmQuery($create_user_query);

    header("Location: login.php");

  }

}



?>
    <!-- Registration Form -->
    <div class="col s12 m12 l6">
                  <div class="card-panel login">
                    <h4 class="header2">Registration</h4>
                    <div class="row">
                      <form class="col s12" action="" method="POST">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name4" type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" class="validate">
                            <label for="first_name">Firstname</label>
                            <div class="red-text"><?php echo $errors['firstname']; ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name4" type="text" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" class="validate">
                            <label for="last_name">Lastname</label>
                            <div class="red-text"><?php echo $errors['lastname']; ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email4" type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" class="validate">
                            <label for="email">Email</label>
                            <div class="red-text"><?php echo $errors['email']; ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name4" type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="validate">
                            <label for="username">Username</label>
                            <div class="red-text"><?php echo $errors['username']; ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input id="password5" type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" class="validate">
                            <label for="password">Password</label>
                            <div class="red-text"><?php echo $errors['password']; ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">question_answer</i>
                            <textarea id="message4" name="bio" class="materialize-textarea validate" length="120"><?php echo htmlspecialchars($bio); ?></textarea>
                            <label for="message">Message</label>
                            <div class="red-text"><?php echo $errors['bio']; ?></div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn waves-effect waves-light right" type="submit" name="register">Sign Up
                                <i class="material-icons right">send</i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>



<?php include "includes/footer.inc.php"; ?>