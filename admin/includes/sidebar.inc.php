<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
              <div class="row">
                <div class="col col s4 m4 l4">
                  <img src="../assets/images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                  <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="index.php?profile_id=<?php echo $user_id; ?>" >John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal">Administrator</p>
                </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                  <a href="index.html" class="waves-effect waves-cyan">
                      <i class="material-icons">pie_chart_outlined</i>
                      <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="profile.php?profile_id=<?php echo $user_id; ?>" class="waves-effect waves-cyan">
                      <i class="material-icons">perm_identity</i>
                      <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li class="bold">
                  <a href="view_all_quotes.php?profile_id=<?php echo $user_id; ?>" class="waves-effect waves-cyan">
                      <i class="material-icons">comment</i>
                      <span class="nav-text">View All Quotes</span>
                    </a>
                </li>
                
                <li class="bold">
                  <a href="comments.php" class="waves-effect waves-cyan">
                      <i class="material-icons">format_size</i>
                      <span class="nav-text">Comments</span>
                    </a>
                </li>
      
                <li class="bold">
                  <a href="table-basic.html" class="waves-effect waves-cyan">
                      <i class="material-icons">border_all</i>
                      <span class="nav-text">Users</span>
                    </a>
                </li>
                
              </ul>
            </li>
          </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->