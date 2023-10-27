  <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">

          <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <a class="nav-link " href="{{ route('admin.dashboard') }}">
                  <span class="menu-title">Dashboard</span>
                  <i class="mdi mdi-home menu-icon"></i>
              </a>
          </li>
          <li class="nav-item {{ Request::is('admin/post-secondary') ? 'active' : '' }}">
              <a class="nav-link " href="{{ route('admin.post.secondary.category') }}">
                  <span class="menu-title">Post Secondary Catagory</span>
                  <i class="mdi mdi-category menu-icon"></i>
              </a>
          </li>
          <li class="nav-item {{ Request::is('admin/student/*') ? 'active' : '' }}">
              <a class="nav-link" data-bs-toggle="collapse" href="#register-page" aria-expanded="false"
                  aria-controls="register-page">
                  <span class="menu-title">Register List</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse {{ Request::is('admin/register/student/list') || Request::is('admin/register/university/list') || Request::is('admin/register/agent/list') ? 'show' : '' }} }}"
                  id="register-page">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/register/student/list') ? 'active' : '' }}"
                              href="{{ route('admin.register.list.student') }}"> Student Register </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/register/university/list') ? 'active' : '' }}"
                              href="{{ route('admin.register.list.university') }}"> University Register </a>
                      </li>

                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/register/agent/list') ? 'active' : '' }}"
                              href="{{ route('admin.register.list.agent') }}">
                              Agent Register </a>
                      </li>

                  </ul>
              </div>
          </li>


          @if (menu_permission('student'))
              <li class="nav-item {{ Request::is('admin/student/*') ? 'active' : '' }}">
                  <a class="nav-link" data-bs-toggle="collapse" href="#question-pages" aria-expanded="false"
                      aria-controls="question-pages">
                      <span class="menu-title">Students</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi mdi-contacts menu-icon"></i>
                  </a>
                  <div class="collapse {{ Request::is('admin/student/*') ? 'show' : '' }} }}" id="question-pages">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/student/list') ? 'active' : '' }}"
                                  href="{{ route('admin.student') }}"> Student List </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/student/question-category') ? 'active' : '' }}"
                                  href="{{ route('admin.question.category') }}"> Question
                                  Category </a>
                          </li>

                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/student/question-sub-category') ? 'active' : '' }}"
                                  href="{{ route('admin.question.sub.category') }}">
                                  Question Sub Category </a>
                          </li>

                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/student/question-screen') ? 'active' : '' }}"
                                  href="{{ route('admin.question.screen') }}">
                                  Question Screen </a>
                          </li>

                      </ul>
                  </div>
              </li>
          @endif
          @if (menu_permission('agent'))
              <li class="nav-item {{ Request::is('admin/agent') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.agent') }}">
                      <span class="menu-title">Agents</span>
                      <i class="mdi mdi-face-agent menu-icon"></i>
                  </a>
              </li>
          @endif
          @if (menu_permission('staff'))
              <li class="nav-item {{ Request::is('admin/staff') || Request::is('admin/staff/*') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.staff') }}">
                      <span class="menu-title">Agents Staff</span>
                      <i class="mdi  mdi-account-multiple menu-icon"></i>
                  </a>
              </li>
          @endif

          @if (menu_permission('university'))
              <li class="nav-item {{ Request::is('admin/university/*') ? 'active' : '' }}">
                  <a class="nav-link" data-bs-toggle="collapse" href="#university" aria-expanded="false"
                      aria-controls="university">
                      <span class="menu-title">Universities</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi  mdi-school menu-icon"></i>
                  </a>
                  <div class="collapse {{ Request::is('admin/university/*') ? 'show' : '' }}" id="university">
                      <ul class="nav flex-column sub-menu">
                          @if (action_permission('program', 'add') == true)
                              <li class="nav-item">
                                  <a class="nav-link {{ Request::is('admin/university/list') ? 'active' : '' }}"
                                      href="{{ route('admin.university') }}">
                                      University List </a>
                              </li>
                          @endif
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/university/create') ? 'active' : '' }}"
                                  href="{{ route('admin.university.create') }}">
                                  University
                                  Add </a>
                          </li>
                      </ul>
                  </div>
              </li>
          @endif
          @if (menu_permission('program'))
              <li class="nav-item {{ Request::is('admin/course/*') ? 'active' : '' }}">
                  <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                      aria-controls="general-pages">
                      <span class="menu-title">Program</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi mdi-medical-bag menu-icon"></i>
                  </a>
                  <div class="collapse {{ Request::is('admin/course/*') ? 'show' : '' }}" id="general-pages">
                      <ul class="nav flex-column sub-menu">
                          @if (action_permission('program', 'add') == true)
                              <li class="nav-item">
                                  <a class="nav-link {{ Request::is('admin/course/create') ? 'active' : '' }}"
                                      href="{{ route('admin.university.course.create') }}">
                                      Add Program </a>
                              </li>
                          @endif
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/course/view') ? 'active' : '' }}"
                                  href="{{ route('admin.university.course.view') }}">
                                  View
                                  Program </a>
                          </li>
                      </ul>
                  </div>
              </li>
          @endif
          @if (menu_permission('application'))
              <li class="nav-item {{ Request::is('admin/application/*') ? 'active' : '' }}">
                  <a class="nav-link" data-bs-toggle="collapse" href="#application-pages" aria-expanded="false"
                      aria-controls="general-pages">
                      <span class="menu-title">Manage Applications</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi  mdi-school menu-icon"></i>
                  </a>
                  <div class="collapse {{ Request::is('admin/application/*') ? 'show' : '' }}"
                      id="application-pages">
                      <ul class="nav flex-column sub-menu">
                          {{-- @if (action_permission('program', 'add') == true) --}}
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/application/index') ? 'active' : '' }}"
                                  href="{{ route('admin.application.index') }}">
                                  All Applications </a>
                          </li>
                          {{-- @endif --}}
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/application/new-application') ? 'active' : '' }}"
                                  href="{{ route('admin.application.new.application') }}">
                                  New Application </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/application/accepted-application') ? 'active' : '' }}"
                                  href="{{ route('admin.application.accepted.application') }}">
                                  Accepted Application </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/application/rejected-application') ? 'active' : '' }}"
                                  href="{{ route('admin.application.accepted.rejected') }}">
                                  Rejected Application </a>
                          </li>
                      </ul>
                  </div>
              </li>
          @endif
          {{-- @if (menu_permission('university')) --}}
          <li
              class="nav-item {{ Request::is('admin/education-partner-list') || Request::is('admin/education-partner-details/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.education.partner.list') }}">
                  <span class="menu-title">Education Partner</span>
                  <i class="mdi  mdi-school menu-icon"></i>
              </a>
          </li>
          {{-- @endif --}}
          {{--   @if (menu_permission('university'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">
                      <span class="menu-title">Paper Application</span>
                      <i class="mdi  mdi-school menu-icon"></i>
                  </a>
              </li>
          @endif
          @if (menu_permission('university'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">
                      <span class="menu-title">Payments</span>
                      <i class="mdi  mdi-school menu-icon"></i>
                  </a>
              </li>
          @endif --}}
          @if (menu_permission('blog'))
              <li class="nav-item {{ Request::is('admin/blog') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.blog.index') }}">
                      <span class="menu-title">Blogs</span>
                      <i class="mdi  mdi-school menu-icon"></i>
                  </a>
              </li>
          @endif
          @if (menu_permission('news'))
              <li class="nav-item {{ Request::is('admin/news') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.news.index') }}">
                      <span class="menu-title">News</span>
                      <i class="mdi  mdi-school menu-icon"></i>
                  </a>
              </li>
          @endif
          @if (menu_permission('setting'))
              <li class="nav-item {{ Request::is('admin/setting/*') ? 'active' : '' }}">
                  <a class="nav-link" data-bs-toggle="collapse" href="#settings-pages" aria-expanded="false"
                      aria-controls="general-pages">
                      <span class="menu-title">Settings</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi mdi-cogs menu-icon"></i>
                  </a>
                  <div class="collapse {{ Request::is('admin/setting/*') ? 'show' : '' }}" id="settings-pages">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/setting/general') ? 'active' : '' }}"
                                  href="{{ route('admin.setting.general') }}">
                                  General Settings </a>
                          </li>
                          <li class="nav-item"> <a
                                  class="nav-link {{ Request::is('admin/setting/level-of-education') ? 'active' : '' }}"
                                  href="{{ route('admin.setting.level-of-education') }}"> Level of education </a></li>
                          <li class="nav-item"> <a
                                  class="nav-link {{ Request::is('admin/setting/grading-scheme') ? 'active' : '' }}"
                                  href="{{ route('admin.setting.grading-scheme') }}">
                                  Grading Scheme </a></li>
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/setting/country') ? 'active' : '' }}"
                                  href="{{ route('admin.setting.country') }}">
                                  Country
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/setting/terms-and-condition') ? 'active' : '' }}"
                                  href="{{ route('admin.setting.terms.and.condition') }}">
                                  Terms and Condition
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link {{ Request::is('admin/setting/privacy-policy') ? 'active' : '' }}"
                                  href="{{ route('admin.setting.privacy.policy') }}">
                                  Privacy Policy
                              </a>
                          </li>


                      </ul>
                  </div>
              </li>
          @endif

          <li class="nav-item {{ Request::is('admin/school-commission') ? 'active' : '' }}">
              <a class="nav-link" data-bs-toggle="collapse" href="#commission-pages" aria-expanded="false"
                  aria-controls="general-pages">
                  <span class="menu-title">Commissions</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-chart-line-stacked menu-icon"></i>
              </a>
              <div class="collapse {{ Request::is('admin/school-commission') ? 'show' : '' }}" id="commission-pages">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/school-commission') ? 'active' : '' }}"
                              href="{{ route('admin.student.commission') }}">
                              School Commissions </a>
                      </li>
                      {{-- <li class="nav-item"> <a class="nav-link" href="javascript:;"> Commission Policy </a></li> --}}

                  </ul>
              </div>
          </li>

          <li
              class="nav-item {{ Request::is('admin/manage-courses') || Request::is('admin/manage-chapter') || Request::is('admin/manage-lesson') ? 'active' : '' }}">
              <a class="nav-link" data-bs-toggle="collapse" href="#manage-courses-pages" aria-expanded="false"
                  aria-controls="general-pages">
                  <span class="menu-title"> Video Courses</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-chart-line-stacked menu-icon"></i>
              </a>
              <div class="collapse {{ Request::is('admin/manage-courses') || Request::is('admin/manage-chapter') ? 'show' : '' }}"
                  id="manage-courses-pages">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/manage-courses') ? 'active' : '' }}"
                              href="{{ route('admin.manage.courses') }}">
                              Manage Courses </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/manage-chapter') ? 'active' : '' }}"
                              href="{{ route('admin.manage.chapter') }}"> Manage
                              Chapter </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/manage-lesson') ? 'active' : '' }}"
                              href="{{ route('admin.manage.lesson') }}"> Manage
                              Lesson</a>
                      </li>

                  </ul>
              </div>
          </li>


          <li
              class="nav-item {{ Request::is('admin/manage-pre-submission-model') || Request::is('admin/manage-pre-submission-model-question') ? 'active' : '' }}">
              <a class="nav-link" data-bs-toggle="collapse" href="#manage-pre-submission" aria-expanded="false"
                  aria-controls="general-pages">
                  <span class="menu-title"> Manage Pre Model</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-chart-line-stacked menu-icon"></i>
              </a>
              <div class="collapse {{ Request::is('admin/manage-pre-submission-model') || Request::is('admin/manage-pre-submission-model-question') ? 'show' : '' }}"
                  id="manage-pre-submission">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/manage-pre-submission-model') ? 'active' : '' }}" href="{{ route('admin.manage.pre.submission.model') }}"> Pre
                              Submission Model </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/manage-pre-submission-model-question') ? 'active' : '' }}" href="{{ route('admin.manage.pre.submission.model.question') }}"> Pre
                             Model Question </a>
                      </li>

                  </ul>
              </div>
          </li>

          @if (auth()->guard('admin')->user()->is_admin == 1)
              <li class="nav-item {{ Request::is('admin/manage-sub-admin/*') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.manage-sub-admin.index') }}">
                      <span class="menu-title">Uniwolc Staff</span>
                      <i class="mdi  mdi-school menu-icon"></i>
                  </a>
              </li>
          @endif
          {{-- @if (menu_permission('university'))
              <li class="nav-item {{ Request::is('admin/university') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">
                      <span class="menu-title">Letter Request</span>
                      <i class="mdi  mdi-alpha-l-box menu-icon"></i>
                  </a>
              </li>
          @endif --}}

          <li
              class="nav-item {{ Request::is('admin/testimonial') || Request::is('admin/testimonial/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.testimonial.index') }}">
                  <span class="menu-title">Testimonial</span>
                  <i class="mdi mdi-alpha-t-box menu-icon"></i>
              </a>
          </li>
          <li
              class="nav-item {{ Request::is('admin/testimonial') || Request::is('admin/testimonial/*') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.letter.request') }}">
                  <span class="menu-title">Letter Request</span>
                  <i class="mdi mdi-alpha-t-box menu-icon"></i>
              </a>
          </li>
          <li class="nav-item {{ Request::is('admin/transaction/*') ? 'active' : '' }}">
              <a class="nav-link" data-bs-toggle="collapse" href="#transaction-pages" aria-expanded="false"
                  aria-controls="general-pages">
                  <span class="menu-title">Transactions</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-source-repository-multiple menu-icon"></i>
              </a>
              <div class="collapse {{ Request::is('admin/transaction/*') ? 'show' : '' }}" id="transaction-pages">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link  {{ Request::is('admin/transaction/all') ? 'active' : '' }}"
                              href="{{ route('admin.transaction.all') }}">all
                              transaction</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/transaction/agent') ? 'active' : '' }}"
                              href="{{ route('admin.transaction.agent') }}">Commissions Generates</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/transaction/agent-payout') ? 'active' : '' }}"
                              href="{{ route('admin.transaction.agent.payout') }}">Payouts</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Request::is('admin/transaction/wallet-request') ? 'active' : '' }}"
                              href="{{ route('admin.transaction.wallet.request') }}">Payment Request</a>
                      </li>
                  </ul>
              </div>
          </li>



      </ul>
  </nav>
