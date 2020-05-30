<?php

if(isset($_POST['upload'])) {

    $quote_author = $_POST['quote_author'];
    $quote = $_POST['quote'];
    $username = $_POST['username'];

    $quote_image = $_FILES['quote_image']['name'];
    $quote_image_temp = $_FILES['quote_image']['tmp_name'];

    $quote_tags = $_POST['quote_tags'];
    
    

    move_uploaded_file($quote_image_temp, "images/$quote_image");

    $query = "INSERT INTO quotes (quote, quote_author, quote_image, quote_tags, username) ";
    $query .= "VALUES('{$quote}','{$quote_author}','{$quote_image}',
    '{$quote_tags}','{$username}') ";

    $create_quote_query = mysqli_query($conn, $query);

    confirmQuery($create_quote_query);

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
                  <div class="card-panel">
                    <h4 class="center-align">Add Quote</h4>
                    <div class="row">
                      <form class="col s8" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_box</i>
                            <input id="name4" type="text" name="quote_author" class="validate">
                            <label for="first_name">Quote Author</label>
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
                            <textarea id="message4" name="quote" class="materialize-textarea validate" length="120"></textarea>
                            <label for="message">Quote</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="email4" type="text" name="username" class="validate">
                            <label for="email">Username</label>
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