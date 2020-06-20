
<?php
	//default value for inputs
	$quote = $quote_author = $username ='';
	$errors = $arrayName = array('author'=>'', 'quote'=>'', 'username'=>'');

		
if(isset($_POST['upload'])) {
  

  // check for author
  if (empty($_POST['quote_author'])) {
		$errors['author'] = 'Field cannot be empty';
	} else{
      $quote_author = ucwords(escapeInjection($_POST['quote_author']));
  
			if(!preg_match('/(?=^.{0,40}$)^[a-zA-Z-]+\s[a-zA-Z-]+$/', $quote_author)){
				$errors['author'] = 'Name cannot contain numbers or symbols';
			}
		}

		if (empty($_POST['quote'])) {
		$errors['quote'] = 'Field cannot be empty';
	} else {
      $quote = ucfirst(escapeInjection($_POST['quote']));
			if(strlen($quote) > 255){
				$errors['quote'] = 'max length exceeded';
			}
		}

		// check username
	if (empty($_POST['username'])) {
		$errors['username'] = 'Field cannot be empty';
	} else{
		$username = escapeInjection($_POST['username']);
			if(!preg_match('/^[a-zA-Z0-9]+$/', $username)){
			$errors['username']	= 'Username cannot have spaces or contain symbols';
			}
	}

  $quote_tags = escapeInjection($_POST['quote_tags']);
  
  $quote_image = $_FILES['quote_image']['name'];
  $quote_image_temp = $_FILES['quote_image']['tmp_name'];
  move_uploaded_file($quote_image_temp, "images/$quote_image");

  if(isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id']; 

    $query = "SELECT * FROM users";
    $username_query = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($username_query)) {

    $username = $row['username'];
    }

  }
 
  if (!array_filter($errors)) {
    $query = "INSERT INTO quotes (user_id, quote, quote_author, quote_image, quote_tags, username) ";
    $query .= "VALUES({$user_id},'{$quote}','{$quote_author}','{$quote_image}', '{$quote_tags}','{$username}') ";

    $create_quote_query = mysqli_query($conn, $query);

    confirmQuery($create_quote_query);

    header("Location: index.php");

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
                <h5 class="breadcrumbs-title">Quotes</h5>
                <ol class="breadcrumbs">
                  <li><a href="index.php">Homepage</a></li>
                  <li><a href="#">Quotes</a></li>
                  <li class="active">Add Quote</li>

                </ol>
              </div>
            </div>
          </div>
    </div>

    <div id="main">
    <!-- Form with validation -->
    <div class="container">
        <div class="section">
    <div class="col s10 m10 l6">
                  <div class="card-panel hoverable form_size">
                    <h4 class="center-align">Add Quote</h4>
                    <div class="row">
                      <form class="col s9" action="quotes.php?source=add_quote" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_box</i>
                            <input id="name4" type="text" name="quote_author" value="<?php echo htmlspecialchars($quote_author); ?>" class="validate">
                            <label for="first_name">Quote Author</label>
                            <div class="red-text"><?php echo $errors['author']; ?></div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">image</i>
                            <input id="quote_image" type="file" name="quote_image" class="validate">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">question_answer</i>
                            <textarea id="message4" name="quote" value="<?php echo htmlspecialchars($quote); ?>" class="materialize-textarea validate" length="120"></textarea>
                            <label for="message">Quote</label>
                            <div class="red-text"><?php echo $errors['quote']; ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="email4" type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" class="validate">
                            <label for="email">Username</label>
                            <div class="red-text"><?php echo $errors['username']; ?></div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">loyalty</i>
                            <input id="email4" type="text" name="quote_tags" class="validate">
                            <label for="email">Quote Tags</label>
                          </div>
                        </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn waves-effect waves-light right" type="submit" name="upload">Upload
                                <i class="material-icons right">send</i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                </div>
                </div>
</div>
    <!-- END MAIN -->
