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

                              <li class="{{ request()->is('staff/dashboard') ? 'active' : '' }}">
                                  <a href="{{ route('staff.dashboard') }}">
                                      <span class="icon"><i class="fa-solid fa-gauge-high"></i></span>
                                      <span class="title">Home</span>
                                  </a>
                              </li>

                              <li
                                  class="{{ request()->is('staff/student') || request()->is('staff/student/*') ? 'active' : '' }}">
                                  <a href="{{ route('staff.student') }}">
                                      <span class="icon"><i class="fa-regular fa-user"></i></span>
                                      <span class="title">Students</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('staff/program') ? 'active' : '' }}">
                                  <a href="{{ route('staff.program') }}">
                                      <span class="icon"><i class="fa-regular fa-magnifying-glass"></i></span>
                                      <span class="title">Programs</span>
                                  </a>
                              </li>

                              <li
                                  class="{{ request()->is('staff/application') || request()->is('staff/application-fillup/*') ? 'active' : '' }}">
                                  <a href="{{ route('staff.application') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">No. of Application</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('staff/application/paid') ? 'active' : '' }}">
                                  <a href="{{ route('staff.application.paid') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">No. of Paid Application</span>
                                  </a>
                              </li>

                              <!---->

                              <li>
                                  <a href="{{ route('staff.payment.list') }}">
                                      <span class="icon"><i class="fa-regular fa-circle-dollar"></i></span>
                                      <span class="title">Payments</span>
                                  </a>
                              </li>

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
