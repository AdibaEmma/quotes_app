<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>
<?php include "includes/functions.php"; ?>

<?php

if(isset($_GET['source'])) {

    $source = $_GET['source'];
    
} else {
    $source = "";
}

switch ($source) {
    case 'add_quote':
        include "includes/add_quote.php";
        break;

    case 'edit_quote':
        include "includes/edit_quote.php";
        break;
        

    default:
    include "index.php";
        break;
}

?>





<?php include "includes/footer.inc.php"; ?>
