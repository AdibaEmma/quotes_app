<?php include "includes/header.inc.php"; ?>
<?php include "../includes/db_connect.php"; ?>


<?php

if(isset($_GET['profile_id'])) {

  $user_id = $_GET['profile_id'];

}

?>

  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>

<!-- START HEADER -->
<header id="header" class="page-topbar">
    
    <!-- start header nav-->
   <?php include "includes/navigation.inc.php"; ?>

<!-- START MAIN -->
<div id="main">
      <!-- START WRAPPER -->
  <div class="wrapper">
  <!-- sidebar -->
  <!-- sidebar -->
  <?php include "includes/sidebar.inc.php"; ?>

  <div class="col s12">
                  <table class="bordered Highlight responsive-table">
                    <thead>
                      <tr>
                        <th data-field="id">Quote Id</th>
                        <th data-field="name">Quote Author</th>
                        <th data-field="price">Quote Image</th>
                        <th data-field="name">Quote</th>
                        <th data-field="price">Uploaded By</th>
                        <th data-field="name">Quote Tags</th>
                        <th data-field="price">Quote Status</th>
                        <th data-field="name">Approve</th>
                        <th data-field="price">Unapprove</th>
                        <th data-field="name">Upload Date</th>
                        <th data-field="name">Edit</th>
                        <th data-field="price">Delete</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                    <?php

                    $query = "SELECT * FROM quotes ORDER BY quote_id DESC";
                    $select_all_quotes = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc( $select_all_quotes )) {

                      $quote_id = $row['quote_id'];
                      $quote_author = $row['quote_author'];
                      $quote_image = $row['quote_image'];
                      $quote = $row['quote'];
                      $uploaded_by = $row['username'];
                      $quote_tags = $row['quote_tags'];
                      $quote_status = $row['quote_status'];
                      $upload_date = $row['upload_date'];

                      $upload_date = date('d-m-Y', strtotime($upload_date));
                  
                    echo "<tr>";
                    
                    echo "<td>$quote_id</td>";
                    echo "<td>$quote_author</td>";
                    echo "<td><img style='width: 70px;' src='../images/$quote_image' alt='quote img'></td>";
                    echo "<td>$quote</td>";
                    echo "<td>$uploaded_by</td>";
                    echo "<td>$quote_tags</td>";
                    echo "<td>$quote_status</td>";
                    echo "<td><a>Approve</a></td>";
                    echo "<td><a>Unapprove</a></td>";
                    echo "<td>$upload_date</td>";
                    echo "<td><a>Edit</a></td>";
                    echo "<td><a class='text-danger'>Delete</a></td>";
                    
                    echo "</tr>";
                    }
                    
                    ?>
                    </tbody>
                  </table>
                </div>
                </aside>
        <!-- END RIGHT SIDEBAR NAV-->
</div>
      <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
  <?php include "includes/footer.inc.php"; ?>