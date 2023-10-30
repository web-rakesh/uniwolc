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

                              <li class="{{ request()->is('student/dashboard') ? 'active' : '' }}">
                                  <a href="{{ route('student.dashboard') }}">
                                      <span class="icon"><i class="fa-solid fa-gauge-high"></i></span>
                                      <span class="title">Home</span>
                                  </a>
                              </li>


                              <li
                                  class="{{ request()->is('student/program') || request()->is('student/program-detail/*') ? 'active' : '' }}">
                                  <a href="{{ route('student.programs') }}">
                                      <span class="icon"><i class="fa-regular fa-magnifying-glass"></i></span>
                                      <span class="title">Programs &amp; Schools</span>
                                  </a>
                              </li>


                              <li class="{{ request()->is('student/profile') ? 'active' : '' }}">
                                  <a href="{{ route('student.profile') }}">
                                      <span class="icon"><i class="fa-regular fa-circle-user"></i></span>
                                      <span class="title">Profile</span>
                                  </a>
                              </li>

                              <li
                                  class="{{ request()->is('student/application') || request()->is('student/application-fillup/*') ? 'active' : '' }}">
                                  <a href="{{ route('student.application.index') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">My Applications</span>
                                  </a>
                              </li>


                              <!---->

                              <li class="{{ request()->is('student/payment-history') ? 'active' : '' }}">
                                  <a href="{{ route('student.payment.history') }}">
                                      <span class="icon"><i class="fa-regular fa-circle-dollar"></i></span>
                                      <span class="title">Payments</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('student/request-letter') ? 'active' : '' }}">
                                <a href="{{ route('student.request.letter.create') }}">
                                    <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                                    <span class="title">Letter Request</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('student/request-letter-list') ? 'active' : '' }}">
                                  <a href="{{ route('student.request.letter.list') }}">
                                      <span class="icon"><i class="fa-regular fa-envelope"></i></span>
                                      <span class="title">Letter Request List</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('change-password') ? 'active' : '' }}">
                                  <a href="{{ route('change.password') }}">
                                      <span class="icon"><i class="fa-light fa-key"></i></span>
                                      <span class="title">Change Password</span>
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
