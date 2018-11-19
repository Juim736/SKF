<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
             
                   
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="material-icons">dashboard</i>
                          <p class="d-lg-none d-md-block">
                            Stats
                          </p>
                        </a>
                      </li>
                  
                  
              

              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo" id="myProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="myProfile">
                  <a class="dropdown-item" href="{{ url('user/my-profile') }}">
                    <i class="material-icons">perm_identity</i>
                  My Profile</a>
                  @if(CF::isEmployeeExitAttendace())
                      
                        <a class="dropdown-item" href="#" id="logOffMenu">
                          <i class="material-icons">directions_run</i>
                          Log off
                        </a>
                     
                    @endif
                  <form action="{{url('login/sign-out')}}" method="post" id="logout-form">
                    {{ csrf_field() }}
                    <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit()">
                      <i class="material-icons">logout</i>
                        Sign Out
                     </a>
                  </form>
            
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>