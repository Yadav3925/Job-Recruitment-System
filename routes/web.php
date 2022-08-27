<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', function () {
   // return view('user\index');
//});

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
//->middleware('is_admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/applicant', [App\Http\Controllers\HomeController::class, 'applicant'])->name('applicant');
Route::post('/applicant1', [App\Http\Controllers\HomeController::class, 'applicant1']);
Route::get('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::post('/update_application', [App\Http\Controllers\HomeController::class,'update_application'])->name('update_application');
Route::get('/view/{id}', [App\Http\Controllers\HomeController::class, 'view'])->name('view');
Route::delete('/deleteApplicant', [App\Http\Controllers\HomeController::class, 'deleteApplicant']);
Route::get('/viewResume/{id}', [App\Http\Controllers\HomeController::class, 'viewResume']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/manage_application', [App\Http\Controllers\HomeController::class, 'manageApplication'])->name('manage_application');
Route::post('/prodEdit',[productController::class,'edit']);


Route::get('/jobs', [App\Http\Controllers\VacancyController::class, 'jobs'])->name('jobs');
Route::post('/insertVacancy', [App\Http\Controllers\VacancyController::class, 'insertVacancy']);

Route::get('/updateVacancy/{id}', [App\Http\Controllers\VacancyController::class, 'updateVacancy']);
Route::post('/editVacancy', [App\Http\Controllers\VacancyController::class, 'editVacancy']);
Route::delete('/deleteVacancy', [App\Http\Controllers\VacancyController::class, 'deleteVacancy']);
Route::get('/Company', [App\Http\Controllers\VacancyController::class, 'company'])->name('company');
Route::post('/insertCompany', [App\Http\Controllers\VacancyController::class, 'insertCompany']);
Route::get('/updateCompany/{id}', [App\Http\Controllers\VacancyController::class, 'updateCompany']);
Route::post('/editCompany', [App\Http\Controllers\VacancyController::class, 'editCompany']);
Route::delete('/deleteCompany', [App\Http\Controllers\VacancyController::class, 'deleteCompany']);

Route::get('/Status', [App\Http\Controllers\Recrutiment::class, 'Status']);
Route::get('/ViewStatus/{id}', [App\Http\Controllers\Recrutiment::class, 'ViewStatus']);
Route::post('/update_status', [App\Http\Controllers\Recrutiment::class, 'update_status']);
Route::delete('/deleteStatus', [App\Http\Controllers\Recrutiment::class, 'deleteStatus']);
Route::get('/Category', [App\Http\Controllers\Recrutiment::class, 'Category'])->name('job_category');
Route::POST('/insertStatus', [App\Http\Controllers\Recrutiment::class, 'insertStatus']);
Route::post('/insertCategory', [App\Http\Controllers\Recrutiment::class, 'insertCategory']);
Route::delete('/deleteJobCat', [App\Http\Controllers\Recrutiment::class, 'deleteJobCat']);
Route::get('/ViewJob/{id}', [App\Http\Controllers\Recrutiment::class, 'ViewJob']);
Route::post('/update_category', [App\Http\Controllers\Recrutiment::class, 'update_category']);


Route::get('/Message', [App\Http\Controllers\Setting::class, 'Message']);
Route::get('/viewMessage/{mid}', [App\Http\Controllers\Setting::class, 'viewMessage']);
Route::get('/updateMessage/{id}', [App\Http\Controllers\Setting::class, 'updateMessage']);
Route::delete('/deleteMessage', [App\Http\Controllers\Setting::class, 'deleteMessage']);
Route::POST('/editMessage', [App\Http\Controllers\Setting::class, 'editMessage']);
Route::get('/insertUser', [App\Http\Controllers\Setting::class, 'insertUser']);
Route::get('/SiteSetting', [App\Http\Controllers\Setting::class, 'SiteSetting'])->name('site_setting');

//user side route
Route::get('/index', [App\Http\Controllers\FrontController::class, 'index'])->name('index')
->middleware('is_admin');
Route::get('/AboutUs', [App\Http\Controllers\FrontController::class, 'AboutUs'])->name('about');
Route::get('/JobCategory', [App\Http\Controllers\FrontController::class, 'JobCategory']);
Route::get('/JobCategory1/{time}', [App\Http\Controllers\FrontController::class, 'JobCategory1']);
Route::get('/JobList/{time}', [App\Http\Controllers\FrontController::class, 'JobList'])->name('job-list');
Route::get('/JobList1', [App\Http\Controllers\FrontController::class, 'JobList1'])->name('job-list');
Route::get('/description/{time}', [App\Http\Controllers\FrontController::class, 'JobDescription']);
Route::get('/ContactUs', [App\Http\Controllers\FrontController::class, 'ContactUs'])->name('contact')->middleware('is_admin');;
Route::get('/Result', [App\Http\Controllers\FrontController::class, 'Status'])->name('status')->middleware('is_admin');
Route::get('/sendMessage', [App\Http\Controllers\FrontController::class, 'sendMessage']);
Route::get('/ReceivedMessage', [App\Http\Controllers\FrontController::class, 'ReceivedMessage']);
Route::post('/searchVacancy', [App\Http\Controllers\FrontController::class, 'searchVacancy']);
Route::get('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/store1', [App\Http\Controllers\ApplyController::class, 'store1'])->name('store1');


//report Controller
Route::get('/srApplicants/{id}', [App\Http\Controllers\report::class, 'srApplicants']);
Route::get('/printReport', [App\Http\Controllers\report::class, 'printReport']);

Route::get('/sortList', [App\Http\Controllers\SortListApplicants::class, 'sortList']);

Route::get('/recomend/{id}/{post}', [App\Http\Controllers\FrontController::class, 'recomend']);