<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Student\PaymentController;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Student\QuestionController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Student\TestScoreController;
use App\Http\Controllers\Student\VisaPermitController;
use App\Http\Controllers\University\ProgramController;
use App\Http\Controllers\Admin\ManageSubAdminController;
use App\Http\Controllers\Student\ApplyProgramController;
use App\Http\Controllers\University\DashboardController;
use App\Http\Controllers\Student\StudentDetailController;
use App\Http\Controllers\Admin\QuestionCategoryController;
use App\Http\Controllers\Admin\UniversityCourseController;
use App\Http\Controllers\Student\EducationSummaryController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\University\ProfileDetailController;
use App\Http\Controllers\Agent\AgentProfileDetailsController;
use App\Http\Controllers\University\ApplicantRequirementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
//     dd('done');
// });


// Route::get('/', function () {
//     return view('website.landing');
// })->name('landing');

Route::get('/login', function () {
    return view('website.auth.login');
})->name('login');
Route::get('/register', function () {
    return view('website.auth.register');
})->name('register');

// Route::get('/students', function () {
//     return view('website.students');
// })->name('students');

Route::get('/our-solutions', function () {
    return view('website.our-solutions');
})->name('our.solutions');

Route::get('/our-story', function () {
    return view('website.our-story');
})->name('our.story');

Route::get('/careers', function () {
    return view('website.careers');
})->name('careers');

Route::get('/press', function () {
    return view('website.press');
})->name('press');



Route::get('/leadership', function () {
    return view('website.leadership');
})->name('leadership');




Route::get('/apply-insights', function () {
    return view('website.apply-insights');
})->name('apply.insights');

Route::get('/trends-report', function () {
    return view('website.trends-report');
})->name('trends.report');


Route::controller(WebsiteController::class)
    ->group(function () {
        Route::get('/', [WebsiteController::class, 'index'])->name('landing');
        Route::get('/recruiters-partners', [WebsiteController::class, 'recruitersPartner'])->name('recruiters');
        Route::get('/schools', [WebsiteController::class, 'schools'])->name('schools');
        Route::get('/students', [WebsiteController::class, 'students'])->name('students');
        Route::get('/about', [WebsiteController::class, 'about'])->name('about');
        Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
        Route::get('/services', [WebsiteController::class, 'services'])->name('services');
        Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
        Route::get('/blog-details/{slug}', [WebsiteController::class, 'blogDetails'])->name('blog-details');
        Route::get('/news', [WebsiteController::class, 'news'])->name('news');
        Route::get('/news-details/{slug}', [WebsiteController::class, 'newsDetails'])->name('news-details');
        Route::get('/life', [WebsiteController::class, 'life'])->name('life');
        Route::get('/education-partners', [WebsiteController::class, 'educationPartner'])->name('education.partners');
        Route::post('/education-partner', [WebsiteController::class, 'educationPartnerStore'])->name('education.partner');
        Route::get('/uk-resources', [WebsiteController::class, 'ukResources'])->name('uk.resources');
        Route::get('/au-resources', [WebsiteController::class, 'auResources'])->name('au.resources');
        Route::get('/uniwolc-fees', [WebsiteController::class, 'uniwolcFees'])->name('uniwolc.fees');
        Route::get('/programs', [WebsiteController::class, 'program'])->name('programs');
        Route::get('/programs-study-search', [WebsiteController::class, 'studySearch'])->name('programs.study.search');
        Route::get('/programs-school-location', [WebsiteController::class, 'studySchoolLocation'])->name('programs.school.location');
        Route::get('/programs-school-location-study-search', [WebsiteController::class, 'studySchoolLocationStudySearch'])->name('programs.school.location.study.search');

        Route::get('/programs-eligibility', [WebsiteController::class, 'programEligibility'])->name('programs.eligibility');
        Route::get('/programs-school-program-search', [WebsiteController::class, 'programSchoolProgramSearch'])->name('programs.school.program.search');

        Route::get('/programs-country', [WebsiteController::class, 'getCountry'])->name('country');
        Route::get('/programs-city', [WebsiteController::class, 'getCity'])->name('city');
    });
// --- login with facebook

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('callback/facebook', [SocialController::class, 'loginWithFacebook']);
Route::get('auth/google', [SocialController::class, 'signInwithGoogle']);
Route::get('callback/google', [SocialController::class, 'callbackToGoogle']);


Route::get('/term-conditions', function () {
    return view('website.term-conditions');
})->name('term.conditions');
Route::get('/privacy-policy', function () {
    return view('website.privacy-policy');
})->name('privacy.policy');
Route::get('/dashboard', function () {

    // dd(auth()->user()->type);
    if (auth()->check() && auth()->user()->email_verified_at != null) {

        if (auth()->user()->type == 'student') {
            return redirect()->route('student.dashboard');
        } else if (auth()->user()->type == 'agent') {
            // if (agent_verify() == 0) {
            //     auth()->logout();
            //     return redirect()->route('login')->with('error', 'Your account is not active. Please contact admin.');
            // }
            return redirect()->route('agent.dashboard');
        } else if (auth()->user()->type == 'university') {
            return redirect()->route('university.dashboard');
        } else if (auth()->user()->type == 'staff') {
            if (staff_verify() == 0) {
                auth()->logout();
                return redirect()->route('login')->with('error', 'Your account is not active. Please contact your agent.');
            }
            return redirect()->route('staff.dashboard');
        } else if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login');
        }
    } else {
        if (auth()->check()) {

            return redirect()->route('verification.notice');
        }
        return redirect()->route('login');
    }
    // return redirect()->route('verification.notice');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'prevent-back-history'
])->group(function () {


    // global routes

    Route::get('/school-detail/{id}/{slug}', [ApplyProgramController::class, 'schoolDetails'])->name('school.detail');
    Route::post('/application/academic-session', [ApplyProgramController::class, 'applicationAcademicSession'])->name('application.academic.session');

    Route::post('/application/record-note', [ApplyProgramController::class, 'applicationRecordNote'])->name('application.record.note');
    Route::post('/application/program-backup', [ApplyProgramController::class, 'applicationProgramBackup'])->name('application.program.backup');

    Route::post('/application/program-backup-store', [ApplyProgramController::class, 'applicationProgramBackupStore'])->name('application.program.backup.store');

    // fetch country state and city
    Route::get('/currency/get', [AdminController::class, 'getCurrency'])->name('currency');
    Route::post('/fetch-cities', [AdminController::class, 'getCity'])->name('cities');


    // student routes
    Route::group(['prefix' => 'student', 'middleware' => ['auth', 'user-access:student'], 'as' => 'student.'], function () {

        Route::get('/profile', [StudentDetailController::class, 'profile'])->name('profile');

        Route::resource('student-detail', StudentDetailController::class);

        Route::resource('education-summary', EducationSummaryController::class);

        Route::resource('test-score', TestScoreController::class);

        Route::resource('visa-and-permit', VisaPermitController::class);

        Route::middleware(['auth', 'profile.updated'])->group(function () {

            // Route::get('/dashboard', function () {
            //     return view('students.home');
            // })->name('dashboard');

            Route::controller(StudentDashboardController::class)
                ->prefix('dashboard')
                ->group(function () {
                    Route::get('/', 'index')->name('dashboard');
                });

            Route::resource('question', QuestionController::class);

            Route::get('/program', [StudentDetailController::class, 'program'])->name('programs');


            Route::get('/program-detail/{slug}', [StudentDetailController::class, 'programDetail'])->name('program.detail');

            Route::get('/program-apply/{program}', [StudentDetailController::class, 'programApply'])->name('program.apply');

            Route::get('/school-detail/{id}/{slug}', [ApplyProgramController::class, 'schoolDetails'])->name('school.detail');

            Route::get('/application-fillup/{application}', [ApplyProgramController::class, 'applicationFillup'])->name('application.fillup');




            Route::post('/applicant-document-upload', [ApplyProgramController::class, 'applicantDocumentUpload'])->name('applicant.document.upload');

            Route::post('/applicant-document-delete', [ApplyProgramController::class, 'applicantDocumentDelete'])->name('applicant.document.delete');

            Route::post('/applicant-status-update', [ApplyProgramController::class, 'applicantStatusUpdate'])->name('applicant.status.update');

            Route::get('/general-print/{user_id?}', [StudentDetailController::class, 'studentProgramPrint'])->name('program.print');

            Route::resource('/application', ApplyProgramController::class);



            Route::get('/payment-confirm', [PaymentController::class, 'index'])->name('payment.confirm');

            Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');

            Route::post('/payment-process', [PaymentController::class, 'processPayment'])->name('payment.process');
            Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
            Route::get('/payment-history', [PaymentController::class, 'paymentHistory'])->name('payment.history');
            Route::get('/invoice/{id}', [PaymentController::class, 'Invoice'])->name('invoice');

            // Route::get('/payment', function () {

            // })->name('payment');
            Route::get('/student', function () {
                return "student";
            })->name('student');
        });
    });
    // end student routes

    // agent routes
    Route::group(['prefix' => 'agent', 'middleware' => ['auth', 'user-access:agent'], 'as' => 'agent.'], function () {

        // profile routes
        Route::post('/get-states-by-country', [AgentProfileDetailsController::class, 'getState']);
        Route::get('/general-details', [AgentProfileDetailsController::class, 'generalDetails'])->name('general.details');
        Route::post('/general-details', [AgentProfileDetailsController::class, 'generalDetailsStore'])->name('general.details.store');
        Route::get('/bank/details', [AgentProfileDetailsController::class, 'bankDetails'])->name('bank.details');
        Route::post('/bank/details.store', [AgentProfileDetailsController::class, 'bankDetailsStore'])->name('bank.details.store');
        Route::get('/school-commission', [AgentProfileDetailsController::class, 'schoolCommission'])->name('school.commission');
        Route::get('/commission-policy', [AgentProfileDetailsController::class, 'commissionPolicy'])->name('commission.policy');
        Route::get('/manage-staff', [AgentProfileDetailsController::class, 'manageStaff'])->name('manage.staff');

        Route::middleware(['auth', 'profile.updated'])->group(function () {

            Route::get('/dashboard', [AgentController::class, 'index'])->name('dashboard');
            Route::get('/staff', [AgentController::class, 'staff'])->name('staff');
            Route::get('/student', [AgentController::class, 'student'])->name('student');
            Route::get('/program', [AgentController::class, 'program'])->name('program');
            Route::get('/program-detail/{program}', [StudentDetailController::class, 'programDetail'])->name('program.detail');
            Route::post('/program-apply/{program}', [StudentDetailController::class, 'agentProgramApply'])->name('program.apply');
            Route::get('/student/general-print/{user_id?}', [StudentDetailController::class, 'studentProgramPrint'])->name('program.print');
            Route::get('/student/general-details/{user_id?}', [AgentController::class, 'studentGeneralDetails'])->name('student.general.detail');
            Route::resource('student-general-detail', StudentDetailController::class);
            Route::get('/student/education-history/{user_id?}', [AgentController::class, 'studentEducationHistory'])->name('student.education.history');
            Route::resource('education-summary', EducationSummaryController::class);
            Route::get('/student/test-score/{user_id?}', [AgentController::class, 'studentTestScore'])->name('student.test.score');
            Route::resource('test-score', TestScoreController::class);
            Route::get('/student/visa-permit/{user_id?}', [AgentController::class, 'studentVisaPermit'])->name('student.visa.permit');
            Route::resource('visa-and-permit', VisaPermitController::class);

            Route::get('/application', [ApplyProgramController::class, 'agentStaffApplication'])->name('application');
            Route::get('/view/application/{application}', [ApplyProgramController::class, 'agentStaffViewApplication'])->name('view.application');
            Route::get('/paid/application', [ApplyProgramController::class, 'agentStaffPaidApplication'])->name('paid.application');
            Route::get('/application-fillup/{application}', [ApplyProgramController::class, 'applicationAgentFillup'])->name('application.fillup');
            Route::post('/applicant-document-upload', [ApplyProgramController::class, 'applicantDocumentUpload'])->name('applicant.document.upload');
            Route::post('/applicant-document-delete', [ApplyProgramController::class, 'applicantDocumentDelete'])->name('applicant.document.delete');

            Route::get('/payment-confirm', [PaymentController::class, 'index'])->name('payment.confirm');
            Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
            Route::post('/payment-process', [PaymentController::class, 'processPayment'])->name('payment.process');
            Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

            // payment history

            Route::get('payment-history', [AgentController::class, 'paymentHistory'])->name('payment.history');
            Route::get('wallet-history', [AgentController::class, 'walletHistory'])->name('wallet.history');
        });
    });
    // end agent routes

    //  university
    Route::group(['prefix' => 'university', 'middleware' => ['auth', 'user-access:university'], 'as' => 'university.'], function () {

        Route::resource('profile', ProfileDetailController::class);
        Route::middleware(['auth', 'profile.updated'])->group(function () {
            Route::controller(DashboardController::class)
                ->prefix('dashboard')
                ->group(function () {
                    Route::get('/', 'dashboard')->name('dashboard');
                });

            Route::resource('program', ProgramController::class);

            Route::get('program/{id}/{slug}', [ProgramController::class, 'programShow'])->name('program.details');
            Route::get('/programs-add', [ProgramController::class, 'create'])->name('programs.add');

            Route::controller(ApplicantRequirementController::class)
                ->prefix('application')
                ->as('application.')
                ->group(function () {
                    Route::get('/all', 'index')->name('all');
                    Route::get('/new', 'newApplication')->name('new');
                    Route::get('/accepted', 'acceptedApplication')->name('accepted');
                    Route::get('/rejected', 'rejectedApplication')->name('rejected');
                });

            Route::get('/application', function () {
                return view('university.my-application');
            })->name('application');
        });
    });
    //  university

    //  staff
    Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'user-access:staff'], 'as' => 'staff.'], function () {

        Route::get('/dashboard', [StaffController::class, 'index'])->name('dashboard');
        Route::get('/student', [StaffController::class, 'student'])->name('student');
        Route::get('/profile', [StaffController::class, 'profile'])->name('profile');
        Route::post('/profile-update', [StaffController::class, 'profileUpdate'])->name('profile.update');

        Route::get('/student/general-details/{user_id?}', [StaffController::class, 'studentGeneralDetails'])->name('student.general.detail');
        Route::resource('student-general-detail', StudentDetailController::class);
        Route::get('/student/education-history/{user_id?}', [StaffController::class, 'studentEducationHistory'])->name('student.education.history');
        Route::resource('education-summary', EducationSummaryController::class);
        Route::get('/student/test-score/{user_id?}', [StaffController::class, 'studentTestScore'])->name('student.test.score');
        Route::resource('test-score', TestScoreController::class);
        Route::get('/student/visa-permit/{user_id?}', [StaffController::class, 'studentVisaPermit'])->name('student.visa.permit');
        Route::resource('visa-and-permit', VisaPermitController::class);

        Route::get('/program', [StaffController::class, 'program'])->name('program');
        Route::get('/program-detail/{program}', [StudentDetailController::class, 'programDetail'])->name('program.detail');
        Route::post('/program-apply/{program}', [StudentDetailController::class, 'agentProgramApply'])->name('program.apply');
        Route::get('/general-print/{user_id?}', [StudentDetailController::class, 'studentProgramPrint'])->name('program.print');
        // Route::get('/application', function () {
        //     return view('staff.application');
        // })->name('application');

        Route::get('/application', [ApplyProgramController::class, 'agentStaffApplication'])->name('application');
        Route::get('/application/paid', [ApplyProgramController::class, 'agentStaffPaidApplication'])->name('application.paid');
        Route::get('/application-fillup/{application}', [ApplyProgramController::class, 'applicationStaffFillup'])->name('application.fillup');
        Route::get('/payment-confirm', [PaymentController::class, 'index'])->name('payment.confirm');
        Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
        Route::post('/payment-process', [PaymentController::class, 'processPayment'])->name('payment.process');
        Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

        Route::get('/payment/list', [StaffController::class, 'paymentList'])->name('payment.list');
    });
    //  staff application
});

// Admin Routes
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('adminLogin');
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');

Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']],
    function () {



        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // admin can see all the register list
        Route::get('/register/student/list', [AdminController::class, 'registerListStudent'])->name('register.list.student');
        Route::get('/register/university/list', [AdminController::class, 'registerListUniversity'])->name('register.list.university');
        Route::get('/register/agent/list', [AdminController::class, 'registerListAgent'])->name('register.list.agent');

        // admin view all student
        Route::get('/student/list', [AdminController::class, 'studentList'])->name('student');
        Route::get('/student/profile/{id}', [AdminController::class, 'student_single_profile'])->name('student.profile');

        // admin can create university
        Route::get('/university/list', [AdminController::class, 'universityList'])->name('university');
        Route::get('/university/create/{id?}', [AdminController::class, 'universityCreate'])->name('university.create');
        Route::post('/university/store', [AdminController::class, 'universityStore'])->name('university.store');
        Route::get('/currency/get', [AdminController::class, 'getCurrency'])->name('currency');
        Route::post('/fetch-cities', [AdminController::class, 'getCity'])->name('cities');

        // admin can create university course
        Route::get('/course/create', [UniversityCourseController::class, 'universityCourseCreate'])->name('university.course.create');
        Route::post('/course/store', [UniversityCourseController::class, 'universityCourseStore'])->name('university.course.store');
        Route::get('/course/view', [UniversityCourseController::class, 'universityCourseIndex'])->name('university.course.view');
        Route::get('/course/edit/{id}', [UniversityCourseController::class, 'universityCourseEdit'])->name('university.course.edit');
        Route::post('/course/update/{id}', [UniversityCourseController::class, 'universityCourseUpdate'])->name('university.course.update');

        // admin see all agent and staff list
        Route::get('/agent', [AdminController::class, 'agentList'])->name('agent');
        Route::get('/agent/crete', [AdminController::class, 'agentCreate'])->name('agent.create');
        Route::post('/agent/store', [AdminController::class, 'agentStore'])->name('agent.store');
        Route::get('/agent/profile/{id}', [AdminController::class, 'agent_profile'])->name('agent.profile');
        Route::get('/staff', [AdminController::class, 'staffList'])->name('staff');
        Route::get('/staff/profile/{id}', [AdminController::class, 'staff_profile'])->name('staff.profile');
        Route::get('/transaction/all', [AdminController::class, 'transaction'])->name('transaction.all');
        Route::get('/transaction/agent', [AdminController::class, 'agentTransaction'])->name('transaction.agent');
        Route::get('/transaction/agent-payout', [AdminController::class, 'agentTransactionPayout'])->name('transaction.agent.payout');
        Route::get('/transaction/agent-commission-detail/{agent_commission}', [AdminController::class, 'agentCommissionDetails'])->name('agent.commission.detail');
        Route::get('/invoice/{id}', [PaymentController::class, 'Invoice'])->name('invoice');
        Route::get('/education-partner-list', [AdminController::class, 'educationPartnerList'])->name('education.partner.list');
        Route::get('/education-partner-details/{education_partner}', [AdminController::class, 'educationPartnerDetail'])->name('education.partner.details');

        Route::get('/transaction/wallet-request', [AdminController::class, 'agentWalletDetails'])->name('transaction.wallet.request');

        // admin can able to dynamic question category
        Route::get('/student/question-category', [QuestionCategoryController::class, 'questionCategoryList'])->name('question.category');
        Route::get('/student/question-sub-category', [QuestionCategoryController::class, 'questionSubCategoryList'])->name('question.sub.category');
        Route::get('/student/question-screen', [QuestionCategoryController::class, 'questionScreen'])->name('question.screen');

        // admin see all the application
        Route::controller(ApplicationController::class)
            ->prefix('application')
            ->as('application.')
            ->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/new-application', 'newApplication')->name('new.application');
                Route::get('/accepted-application', 'acceptedApplication')->name('accepted.application');
                Route::get('/rejected-application', 'rejectedApplication')->name('accepted.rejected');
                Route::get('/show/{id}', 'show')->name('print');
            });

        // General Setting
        Route::controller(SettingController::class)
            ->prefix('setting')
            ->as('setting.')
            ->group(function () {
                Route::get('/general', 'general')->name('general');
                Route::get('/level-of-education', 'levelOfEducation')->name('level-of-education');
                Route::get('/grading-scheme', 'gradingScheme')->name('grading-scheme');
                Route::get('/country', 'country')->name('country');
            });

        // Blog
        Route::controller(BlogController::class)
            ->prefix('blog')
            ->as('blog.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{blog}', 'edit')->name('edit');
                Route::post('/update/{blog}', 'update')->name('update');
                Route::get('/delete/{id}', 'destroy')->name('delete');
            });

        // News
        Route::controller(NewsController::class)
            ->prefix('news')
            ->as('news.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{news}', 'edit')->name('edit');
                Route::post('/update/{news}', 'update')->name('update');
                Route::get('/delete/{id}', 'destroy')->name('delete');
            });


        // Manage Sub Admin Routes
        Route::controller(ManageSubAdminController::class)
            ->prefix('manage-sub-admin/list')
            ->as('manage-sub-admin.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update/{id}', 'update')->name('update');
                Route::get('/delete/{id}', 'destroy')->name('delete');
            });

        // Manage Testimonial Routes
        Route::resource('testimonial', TestimonialController::class);

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    }
);
