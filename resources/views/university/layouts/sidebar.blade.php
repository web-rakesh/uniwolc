  <div class="dashboardMenuArea">
      <div class="dashboardMenuFldArea">
          <div class="dashboardMenuFldAreainner">
              <div class="dasboardMenuProfArea">
                  <div class="dasboardMenuProfAreainner"></div>
              </div>
              <div class="dashboardMenuAreainner">
                  <div class="dasboardMenu">
                      <div class="dasboardMenuinner">
                          <ul class="dasboardMenuWrap">

                              <li class="{{ request()->is('university/dashboard') ? 'active' : '' }}">
                                  <a href="{{ route('university.dashboard') }}">
                                      <span class="icon"><i class="fa-solid fa-gauge-high"></i></span>
                                      <span class="title">Home</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('university/program') ? 'active' : '' }}">
                                  <a href="{{ route('university.program.index') }}">
                                      <span class="icon"><i class="fa-regular fa-magnifying-glass"></i></span>
                                      <span class="title">Programs </span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('university/profile') ? 'active' : '' }}">
                                  <a href="{{ route('university.profile.index') }}">
                                      <span class="icon"><i class="fa-regular fa-circle-user"></i></span>
                                      <span class="title">Profile</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('university/application') ? 'active' : '' }}">
                                  <a href="{{ route('university.application') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">My Programs</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('university/application/all') ? 'active' : '' }}">
                                  <a href="{{ route('university.application.all') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">All Applications</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('university/application/new') ? 'active' : '' }}">
                                  <a href="{{ route('university.application.new') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title"> New Applications</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('university/application/accepted') ? 'active' : '' }}">
                                  <a href="{{ route('university.application.accepted') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title"> Accepted Applications</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('university/application/rejected') ? 'active' : '' }}">
                                  <a href="{{ route('university.application.rejected') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title"> Rejected Applications</span>
                                  </a>
                              </li>


                              {{--  <li>
                                  <a href="menu2.html">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">Menu 2</span>
                                  </a>
                              </li>

                              <!---->

                              <li>
                                  <a href="payment.html">
                                      <span class="icon"><i class="fa-regular fa-circle-dollar"></i></span>
                                      <span class="title">Payments</span>
                                  </a>
                              </li> --}}

                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                                      <span class="title"> Logout</span>
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                      @csrf
                                  </form>


                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
