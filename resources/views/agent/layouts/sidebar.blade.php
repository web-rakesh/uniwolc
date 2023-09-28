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

                              <li class="{{ request()->is('agent/dashboard') ? 'active' : '' }}">
                                  <a href="{{ route('agent.dashboard') }}">
                                      <span class="icon"><i class="fa-solid fa-gauge-high"></i></span>
                                      <span class="title">Home</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('agent/staff') ? 'active' : '' }}">
                                  <a href="{{ route('agent.staff') }}">
                                      <span class="icon"><i class="fa-solid fa-person-cane"></i></span>
                                      <span class="title">Staff</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('agent/student') ? 'active' : '' }}">
                                  <a href="{{ route('agent.student') }}">
                                      <span class="icon"><i class="fa-solid fa-users-line"></i></span>
                                      <span class="title">Students</span>
                                  </a>
                              </li>

                              <li
                                  class="{{ request()->is('programs') || request()->is('program-details/*') ? 'active' : '' }}">
                                  <a href="{{ route('programs') }}">
                                      <span class="icon"><i class="fa-regular fa-magnifying-glass"></i></span>
                                      <span class="title">Programs & School</span>
                                  </a>
                              </li>

                              <li
                                  class="{{ request()->is('agent/application') || request()->is('agent/application-fillup/*') ? 'active' : '' }}">
                                  <a href="{{ route('agent.application') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">All Applications</span>
                                  </a>
                              </li>
                              <li class="{{ request()->is('agent/paid/application') ? 'active' : '' }}">
                                  <a href="{{ route('agent.paid.application') }}">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">Paid Applications</span>
                                  </a>
                              </li>



                              {{--  <li>
                                  <a href="menu2.html">
                                      <span class="icon"><i class="fa-regular fa-file-text"></i></span>
                                      <span class="title">Menu 2</span>
                                  </a>
                              </li>

                              <!---->
--}}
                              <li class="{{ request()->is('agent/payment-history') ? 'active' : '' }}">
                                  <a href="{{ route('agent.payment.history') }}">
                                      <span class="icon"><i class="fa-regular fa-circle-dollar"></i></span>
                                      <span class="title">Payments</span>
                                  </a>
                              </li>

                              <li class="{{ request()->is('agent/wallet-history') ? 'active' : '' }}">
                                  <a href="{{ route('agent.wallet.history') }}">
                                      <span class="icon"><i class="fa-regular fa-circle-dollar"></i></span>
                                      <span class="title">Wallet Request</span>
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
