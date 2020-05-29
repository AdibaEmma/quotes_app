<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.inc.php"; ?>

<?php





?>

 <!-- START MAIN -->
 <div id="main">

 <div id="breadcrumbs-wrapper">
          <!-- Search for small screen
          <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
          </div> -->
          <div class="container-fluid">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">Cards</h5>
                <ol class="breadcrumbs">
                  <li><a href="index.php">Homepage</a></li>
                  <li class="active">Quotes</li>
                </ol>
              </div>
              
            </div>
          </div>
        </div>
        
 <div id="card-reveal" class="section">
            <h4 class="header">Card Reveal</h4>
            <div class="row">
              <div class="col s12">
                <p>Here you can add a card that reveals more information once clicked.</p>
              </div>
              <div class="col s12 m12 l12">
                <div class="row">
                  <div class="col s12 m4 l4">
                    <div class="card">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/gallary/12.png" alt="office">
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title
                            <i class="material-icons right">more_vert</i>
                          </span>
                        <p><a href="#">This is a link</a>
                        </p>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title
                            <i class="material-icons right">close</i>
                          </span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                      </div>
                    </div>
                    <p>
                      Just add the <code class=" language-markup">card-reveal</code> div with a <code class=" language-markup">span.card-title</code> inside to make this work. Add the class
                      <code class=" language-markup">activator</code> to an element inside the card to allow it to open the card reveal.
                    </p>
                  </div>
                  <div class="col s12 m4 l4">
                    <div class="card">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/gallary/19.png">
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title
                            <i class="material-icons right">more_vert</i>
                          </span>
                        <p><a href="#!">This is a link</a></p>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title
                            <i class="material-icons right">close</i>
                          </span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                      </div>
                      <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                      </div>
                    </div>
                    <p>The default state is having the card-reveal go over the card-action.</p>
                  </div>
                  <div class="col s12 m4 l4">
                    <div class="card sticky-action">
                      <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="assets/images/gallary/21.png">
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title
                            <i class="material-icons right">more_vert</i>
                          </span>
                        <p><a href="#!">This is a link</a></p>
                      </div>
                      <div class="card-action">
                        <a href="#">This is a link</a>
                        <a href="#">This is a link</a>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title
                            <i class="material-icons right">close</i>
                          </span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                      </div>
                    </div>
                    <p>You can make your card-action always visible by adding the class <code class=" language-markup">sticky-action</code> to the overall card.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>
    <!-- END MAIN -->

<?php include "includes/footer.inc.php"; ?>