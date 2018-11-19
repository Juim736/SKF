<div class="sidebar" data-color="purple" data-background-color="white"
     data-image="{{ asset('/assets')}}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="" class="simple-text logo-normal">
            <img src="{{ asset('/assets')}}/images/logo.png" height="70" width="80" alt="">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="./user.html">
                    <i class="material-icons">person</i>
                    <p>User Profile</p>
                </a>
            </li>
            @if(Sentinel::getUser()->roles()->first()->slug == 'administrator' )
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('user/user-all')}}">
                        <i class="material-icons">person</i>
                        <p>Users</p>
                    </a>
                </li>
            @endif
            @if(Sentinel::getUser()->roles()->first()->slug == 'accountant' )
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('account/account') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Account</p>
                </a>
            </li>
            @endif

            <li class="nav-item ">
                <a class="nav-link" href="./typography.html">
                    <i class="material-icons">library_books</i>
                    <p>Typography</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{url('employee/employee-attendance')}}">
                    <i class="material-icons">accessibility</i>
                    <p>Employee Attends</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/employee/all-employee') }}">
                    <i class="material-icons">people</i>
                    <p>Employee</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                    <i class="material-icons">location_ons</i>
                    <p>Maps</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <!-- <li class="nav-item active-pro ">
                  <a class="nav-link" href="./upgrade.html">
                      <i class="material-icons">unarchive</i>
                      <p>Upgrade to PRO</p>
                  </a>
              </li> -->
        </ul>
    </div>
</div>