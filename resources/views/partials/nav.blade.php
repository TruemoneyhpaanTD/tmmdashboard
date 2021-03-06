 <meta name="csrf-token" content="{{ csrf_token() }}">
<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>
<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""> {{ (Auth::check() && $user->employee_name ) ? $user->employee_name : "" }}
                    <span class=" fa fa-angle-down"></span>
                  </a>

                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="{{ url('/profile') }}"> Profile</a></li> -->
                    <!-- <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li>
                      <a href="{{ url('/logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"> <i class="fa fa-user fa-fw"></i>
                          Logout
                      </a>

                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
