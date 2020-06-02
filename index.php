<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>
<?php include_once "includes/functions.php"; ?>

<?php

if(isset($_GET['delete'])) {

  $the_quote_id = $_GET['delete'];

  $query = "DELETE FROM quotes WHERE quote_id = {$the_quote_id}";
  $delete_query = mysqli_query($conn, $query);
    header("Location: index.php");
    
}
?>


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
    


<?php include "includes/footer.inc.php"; ?>