<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>
<?php include "includes/functions.php"; ?>


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
                  <li><a href="edit_user.php?profile_id=$user_id">User</a></li>
                  <li class="active"> Profile & Quotes</li>
                </ol>
              </div>
            </div>
          </div>
    </div>


 <!--card widgets start-->
 <div class="main">
 <div class="row">
<div class="col s12 m12 l8">
  <div id="card-widgets">
              <div class="row">
                <div class="col s12 m6 l6">
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

      </div>

      
    </div>

    <hr>
      <div class="row">
      <div class="col s12 m12 l12">
      <div id="card-reveal" class="section">
            <div class="row">
            <div class="col s12">
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="row">
    <?php

$query = "SELECT * FROM quotes WHERE user_id={$user_id} ORDER BY upload_date DESC";
$select_quotes_query = mysqli_query($conn, $query);
confirmQuery($select_quotes_query);

while($row = mysqli_fetch_array( $select_quotes_query )) {

   $quote_id = $row['quote_id'];
   $quote = $row['quote'];
   $quote_author = $row['quote_author'];
   $quote_image = $row['quote_image'];
   $username = $row['username'];
   $upload_date = $row['upload_date'];

   $upload_date = date("d-m-Y", strtotime($upload_date));

?>

                  <div class="col s12 m3 l3">
                    <div class="card hoverable">
                      <div class="card-image waves-effect waves-block waves-light">
                      <?php echo  "<img class='activator' src='images/$quote_image' alt='office'>" ?>
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4 truncate"><?php echo $quote; ?>
                            
                          </span>
                     <?php echo "<p>Uploaded by <a href='#'>{$username}</a><span class='right'>[{$upload_date}]</span></p>"; ?>
                        <span class="center">
                          <a class="btn grey z-depth-0" href="quotes.php?source=edit_quote&quote_id=<?php echo $quote_id; ?>">Edit</a>
                          <a class="btn z-depth-0" onClick="javascript: return confirm('Are you sure you want to delete?');" href="index.php?delete=<?php echo $quote_id; ?>">Delete</a>
                        </span>
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



?>
        </div>
        </div>
        </div>
          </div>
        </div>
        </div>

      </div>
  </div><!-- end row -->
</div><!-- end section -->


<?php include "includes/footer.inc.php"; ?>