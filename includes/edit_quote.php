  <?php

if(isset($_GET['quote_id'])) {

 $quote_id = $_GET['quote_id'];


$query = "SELECT * FROM quotes WHERE quote_id = {$quote_id}";
 $select_quotes_query = mysqli_query($conn, $query);

 while( $row = mysqli_fetch_array($select_quotes_query)) {

  $quote_id = $row['quote_id'];
  $quote = $row['quote'];
  $quote_author = $row['quote_author'];
  $quote_image = $row['quote_image'];
  $username = $row['username'];
  $quote_tags = $row['quote_tags'];
 }

}

//default value for inputs
$errors = $arrayName = array('author'=>'', 'quote'=>'', 'username'=>'');

if(isset($_POST['update'])) {

   // check for author
   if (empty($_POST['quote_author'])) {
		$errors['author'] = 'Field cannot be empty';
	} else{
    if(!function_exists('escapeInjection')) {
      $quote_author = ucwords(escapeInjection($_POST['quote_author']));
    }
		
			if(!preg_match('/^([a-zA-Z\s]+)(\s*[a-zA-Z\s]*)*$/', $quote_author)){
				$errors['author'] = 'Name cannot contain numbers or symbols';
			}
		}

		if (empty($_POST['quote'])) {
		$errors['quote'] = 'Field cannot be empty';
	} else {
    if(!function_exists('escapeInjection')) {
      $quote = ucfirst(escapeInjection($_POST['quote']));
    }
			if(strlen($quote) > 255){
				$errors['quote'] = 'max length exceeded';
			}
		}

		// check username
	if (empty($_POST['username'])) {
		$errors['username'] = 'Field cannot be empty';
	} else{

    if(!function_exists('escapeInjection')) {
      $username = escapeInjection($_POST['username']);
    }
		$username = escapeInjection($_POST['username']);
			if(!preg_match('/^[a-zA-Z0-9]+$/', $username)){
			$errors['username']	= 'Username cannot have spaces or contain symbols';
			}
	}

  if(!function_exists('escapeInjection')) {
    $quote_tags = escapeInjection($_POST['quote_tags']);
  }
  
  $quote_image = $_FILES['quote_image']['name'];
  $quote_image_temp = $_FILES['quote_image']['tmp_name'];
  move_uploaded_file($quote_image_temp, "images/$quote_image");

  
  if(empty($quote_image)) {
    $query = "SELECT quote_image FROM quotes WHERE quote_id = $quote_id ";
    $select_image  = mysqli_query($conn, $query); 

    while($row = mysqli_fetch_array($select_image)) {

      $quote_image = $row['quote_image'];
    }

  }

  move_uploaded_file($quote_image_temp, "images/$quote_image");

  
  if (!array_filter($errors)) {
$query = "UPDATE quotes SET quote = '{$quote}', quote_author = '{$quote_author}', quote_image = '{$quote_image}' , quote_tags = '{$quote_tags}', username = '{$username}' WHERE quote_id = {$quote_id}";
$update_quote_query = mysqli_query($conn, $query);

  confirmQuery($update_quote_query);

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
                  <li><a href="#">Quote</a></li>
                  <li class="active">Edit Quote</li>

                </ol>
              </div>
            </div>
          </div>
    </div>

    <div>
    <!-- Form with validation -->
    <div class="container">
        <div class="section">
    <div class="col s10 m10 l6">
                  <div class="card-panel hoverable form_size">
                  <h4 class="center-align">Edit Quote</h4>
                    <div class="row">
                      <form class="col s9" action="" method="POST" enctype="multipart/form-data">
                      <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_box</i>
                            <input id="name4" type="text" name="quote_author" class="validate" value="<?php echo $quote_author; ?>">
                            <label for="quote_author">Quote Author</label>
                            <div class="red-text"><?php echo $errors['author']; ?></div>
                          </div>
                        </div>
                        
                        <div class="row">
                        <img src="images/<?php echo $quote_image; ?>" alt="Quote Image" style="width: 100px">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">image</i>
                            <input id="quote_image" type="file" name="quote_image" class="validate">
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">question_answer</i>
                            <textarea id="message4" name="quote" class="materialize-textarea validate" length="120"><?php echo $quote; ?></textarea>
                            <label for="message">Quote</label>
                            <div class="red-text"><?php echo $errors['quote']; ?></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="email4" type="text" name="username" class="validate" value="<?php echo $username; ?>">
                            <label for="email">Username</label>
                            <div class="red-text"><?php echo $errors['username']; ?></div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">loyalty</i>
                            <input id="email4" type="text" name="quote_tags" class="validate" value="<?php echo $quote_tags; ?>">
                            <label for="email">Quote Tags</label>
                          </div>
                        </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn waves-effect waves-light right" type="submit" name="update">Update
                                <i class="material-icons right">create</i>
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