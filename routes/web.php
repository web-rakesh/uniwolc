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
use App\Http\Controllers\Student\TestScoreController;
use App\Http\Controllers\Student\VisaPermitController;
use App\Http\Controllers\University\ProgramController;
use App\Http\Controllers\Admin\ManageSubAdminController;
use App\Http\Controllers\Student\ApplyProgramController;
use App\Http\Controllers\Student\StudentDetailController;
use App\Http\Controllers\Admin\QuestionCategoryController;
use App\Http\Controllers\Admin\UniversityCourseController;
use App\Http\Controllers\Student\EducationSummaryController;
use App\Http\Controllers\University\ProfileDetailController;
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

Route::get('/dashboard', function () {
    return redirect()->route('student.dashboard');
});
// Route::get('/', function () {
//     return view('website.landing');
// })->name('landing');

Route::get('/login', function () {
    return view('website.auth.login');
})->name('login');
Route::get('/register', function () {
    return view('website.auth.register');
})->name('register');

Route::get('/students', function () {
    return view('website.students');
})->name('students');
Route::get('/recruiters-partners', function () {
    return view('website.recruiters');
})->name('recruiters');

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

Route::get('/life', function () {
    return view('website.life');
})->name('life');

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
        Route::get('/about', [WebsiteController::class, 'about'])->name('about');
        Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
        Route::get('/services', [WebsiteController::class, 'services'])->name('services');
        Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
        Route::get('/blog-details/{slug}', [WebsiteController::class, 'blogDetails'])->name('blog-details');
        Route::get('/news', [WebsiteController::class, 'news'])->name('news');
        Route::get('/news-details/{slug}', [WebsiteController::class, 'newsDetails'])->name('news-details');
        Route::get('/education-partners', [WebsiteController::class, 'educationPartner'])->name('education.partners');
        Route::post('/education-partner', [WebsiteController::class, 'educationPartnerStore'])->name('education.partner');
    });
// --- login with facebook

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
Route::get('auth/google', [SocialController::class, 'signInwithGoogle']);
Route::get('callback/google', [SocialController::class, 'callbackToGoogle']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // student routes
    Route::group(['prefix' => 'student', 'middleware' => ['auth', 'user-access:student'], 'as' => 'student.'], function () {

        Route::get('/dashboard', function () {
            return view('students.home');
        })->name('dashboard');

        Route::resource('question', QuestionController::class);

        Route::get('/program', [StudentDetailController::class, 'program'])->name('programs');

        Route::get('/profile', [StudentDetailController::class, 'profile'])->name('profile');

        Route::get('/program-detail/{slug}', [StudentDetailController::class, 'programDetail'])->name('program.detail');

        Route::get('/program-apply/{program}', [StudentDetailController::class, 'programApply'])->name('program.apply');

        Route::get('/program-apply/{program}', [StudentDetailController::class, 'programApply'])->name('program.apply');

        Route::get('/school-detail/{slug}', [ApplyProgramController::class, 'schoolDetails'])->name('school.detail');

        Route::get('/application-fillup/{application}', [ApplyProgramController::class, 'applicationFillup'])->name('application.fillup');

        Route::post('/application/program-backup', [ApplyProgramController::class, 'applicationProgramBackup'])->name('application.program.backup');

        Route::post('/application/program-backup-store', [ApplyProgramController::class, 'applicationProgramBackupStore'])->name('application.program.backup.store');

        Route::post('/applicant-document-upload', [ApplyProgramController::class, 'applicantDocumentUpload'])->name('applicant.document.upload');

        Route::post('/applicant-document-delete', [ApplyProgramController::class, 'applicantDocumentDelete'])->name('applicant.document.delete');

        Route::post('/applicant-status-update', [ApplyProgramController::class, 'applicantStatusUpdate'])->name('applicant.status.update');

        Route::get('/general-print/{user_id?}', [StudentDetailController::class, 'studentProgramPrint'])->name('program.print');

        Route::resource('/application', ApplyProgramController::class);

        Route::resource('student-detail', StudentDetailController::class);

        Route::resource('education-summary', EducationSummaryController::class);

        Route::resource('test-score', TestScoreController::class);

        Route::resource('visa-and-permit', VisaPermitController::class);

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
    // end student routes

    // agent routes
    Route::group(['prefix' => 'agent', 'middleware' => ['auth', 'user-access:agent'], 'as' => 'agent.'], function () {

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
    });
    // end agent routes

    // agent university
    Route::group(['prefix' => 'university', 'middleware' => ['auth', 'user-access:university'], 'as' => 'university.'], function () {

        Route::get('/', function () {
            return view('university.dashboard');
        })->name('dashboard');

        Route::resource('program', ProgramController::class);

        Route::resource('profile', ProfileDetailController::class);

        Route::resource('application-requirement', ApplicantRequirementController::class);

        Route::get('/apply-programs', function () {
            return view('university.apply-program-list');
        })->name('apply.programs');


        Route::get('/application', function () {
            return view('university.my-application');
        })->name('application');

        Route::get('/programs-add', function () {
            return view('university.programs-add');
        })->name('programs.add');
    });
    // agent university

    // agent staff
    Route::group(['prefix' => 'staff', 'middleware' => ['auth', 'user-access:staff'], 'as' => 'staff.'], function () {

        Route::get('/dashboard', [StaffController::class, 'index'])->name('dashboard');
        Route::get('/student', [StaffController::class, 'student'])->name('student');

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

        Route::get('/application', function () {
            return view('staff.application');
        })->name('application');

        Route::get('/application', [ApplyProgramController::class, 'agentStaffApplication'])->name('application');
    });
    // agent staff application
});

Route::post('admin/login', [AdminAuthController::class, 'login'])->name('adminLogin');
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');


Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']],
    function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // admin view all student
        Route::get('/student/list', [AdminController::class, 'studentList'])->name('student');

        // admin can create university
        Route::get('/university/list', [AdminController::class, 'universityList'])->name('university');
        Route::get('/university/create/{id?}', [AdminController::class, 'universityCreate'])->name('university.create');
        Route::post('/university/store', [AdminController::class, 'universityStore'])->name('university.store');
        Route::get('/currency/get', [AdminController::class, 'getCurrency'])->name('currency');

        // admin can create university course
        Route::get('/course/create', [UniversityCourseController::class, 'universityCourseCreate'])->name('university.course.create');
        Route::post('/course/store', [UniversityCourseController::class, 'universityCourseStore'])->name('university.course.store');
        Route::get('/course/view', [UniversityCourseController::class, 'universityCourseIndex'])->name('university.course.view');
        Route::get('/course/edit/{id}', [UniversityCourseController::class, 'universityCourseEdit'])->name('university.course.edit');
        Route::post('/course/update/{id}', [UniversityCourseController::class, 'universityCourseUpdate'])->name('university.course.update');

        // admin see all agent and staff list
        Route::get('/agent', [AdminController::class, 'agentList'])->name('agent');
        Route::get('/staff', [AdminController::class, 'staffList'])->name('staff');
        Route::get('/transaction', [AdminController::class, 'transaction'])->name('transaction');
        Route::get('/invoice/{id}', [PaymentController::class, 'Invoice'])->name('invoice');
        Route::get('/education-partner-list', [AdminController::class, 'educationPartnerList'])->name('education.partner.list');

        // admin can able to dynamic question category
        Route::get('/student/question-category', [QuestionCategoryController::class, 'questionCategoryList'])->name('question.category');
        Route::get('/student/question-sub-category', [QuestionCategoryController::class, 'questionSubCategoryList'])->name('question.sub.category');

        // admin see all the application
        Route::controller(ApplicationController::class)
            ->prefix('application')
            ->as('application.')
            ->group(function () {
                Route::get('', 'index')->name('index');
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

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    }
);
