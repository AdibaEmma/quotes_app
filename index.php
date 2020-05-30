<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>
<?php include "includes/functions.php"; ?>


 <!-- START MAIN -->


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
                  <li class="active"> View all Quotes</li>
                </ol>
              </div>
            </div>
          </div>
    </div>

    

<div id="card-reveal" class="section">
            <div class="row">
            <div class="col s12">
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="row">
    <?php

$query = "SELECT * FROM quotes ORDER BY upload_date DESC";
$select_quotes_query = mysqli_query($conn, $query);

while($row = mysqli_fetch_array( $select_quotes_query )) {

   $quote = $row['quote'];
   $quote_author = $row['quote_author'];
   $quote_image = $row['quote_image'];
   $username = $row['username'];



   ?>

                  <div class="col s12 m3 l3">
                    <div class="card">
                      <div class="card-image waves-effect waves-block waves-light">
                      <?php echo  "<img class='activator' src='assets/images/gallary/$quote_image' alt='office'>" ?>
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo $quote_author; ?>
                            <i class="material-icons right">more_vert</i>
                          </span>
                        <p>Uploaded by <a href="#"><?php echo $username; ?></a>
                        </p>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $quote_author; ?>
                            <i class="material-icons right">close</i>
                          </span>
                        <p><?php echo $quote; ?></p>
                      </div>
                    </div>
                  </div>

              
        
<?php }

confirmQuery($select_quotes_query);

?>
        </div>
        </div>
        </div>
          </div>
        </div>
        </div>
    


<?php include "includes/footer.inc.php"; ?>