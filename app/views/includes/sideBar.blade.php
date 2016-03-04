<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <!-- dashboard -->

                  <li>

                      <a href="{{ URL::route('dashboard') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  {{-- User --}}
                  <li>

                      <a href="{{ route('user.create') }}">
                          <i class="fa fa-user"></i>
                          <span>Add Admin</span>
                      </a>
                  </li>
                  {{-- user --}}
                  <li>

                      <a href="{{ route('user.index') }}">
                          <i class="fa fa-user"></i>
                          <span>View all admin</span>
                      </a>
                  </li>

                  {{-- Token --}}
                  <li>

                      <a href="{{ route('token.create') }}">
                          <i class="fa fa-gears"></i>
                          <span>Create Token</span>
                      </a>
                  </li>

                  {{-- Customers --}}
                  <li>

                      <a href="{{ route('token.index') }}">
                          <i class="fa fa-gears"></i>
                          <span>All tokens</span>
                      </a>
                  </li>

                  {{-- Salespersons --}}
                  <!-- Masiur Rahman Siddiki mrsiddiki@gmail.com -->
                  <li>

                      <a href="{{ route('token.delete') }}">
                          <i class="fa fa-flash"></i>
                          <span>Delete Previous Token</span>
                      </a>
                  </li>

                  {{-- Staff Users --}}
                  <li>

                      <a href="{{ route('token.print') }}">
                          <i class="fa fa-users"></i>
                          <span>Print Your Tokens</span>
                      </a>
                  </li>

                  {{-- Roles & Permissions --}}
                  <!--li>

                      <a href="#">
                          <i class="fa fa-gears"></i>
                          <span>Roles & Permissions</span>
                      </a>
                  </li>
                  -->
                  


                  









              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>