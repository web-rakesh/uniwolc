  <div class="topNavbar">
      <div class="leftTopNavbar">
          <span class="backMenu"><a href=" {{ URL::previous() }}"><i
                      class="fa-sharp fa-regular fa-arrow-left"></i></a></span>
          <ul class="topNavMenuList">
              <li><a href=" {{ route('student.dashboard') }}">Home </a></li>
              <li><span>{{ ucfirst(str_replace('-', ' ', substr(strrchr(url()->current(), '/'), 1))) }}</span></li>
          </ul>
      </div>
      <div class="rightTopNavbar">
          <ul class="rightSideMenuList">
              {{ auth()->user()->name }}
              <li class="topNavNotificationItem"><a href="#" class="notificationLink"><i
                          class="fa-regular fa-bell"></i></a></li>
              <li class="topNavUserItem">
                  <a href="{{ route('student.profile') }}" class="topNavUserLink">
                      <span class="avatarImage">
                          @if (auth()->user()->profile_photo_path)
                              <img id="avatarImage" src="{{ asset('storage/') . '/' . auth()->user()->profile_photo_path }}"
                                  class="img-fluid" alt="">
                          @else
                              <img id="avatarImage" src="{{ asset('/') }}assets/images/user.png" class="img-fluid"
                                  alt="">
                          @endif
                      </span>
                  </a>
              </li>
          </ul>
          <button class="buttonMenuMobile">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-menu align-self-center topbar-icon">
                  <line x1="3" y1="12" x2="21" y2="12"></line>
                  <line x1="3" y1="6" x2="21" y2="6"></line>
                  <line x1="3" y1="18" x2="21" y2="18"></line>
              </svg>
          </button>
      </div>
  </div>
