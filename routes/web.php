<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\CricketPlayerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();



Route::get('/employee-form',[EmployeeController::class,'employeeForm'])->name('list_employee');
// Route::middleware(['auth'])->group(function () {
    Route::post('/employee-insert',[EmployeeController::class,'employeeInsert']);
    Route::get('employee-list',[EmployeeController::class,'employeeList'])->name('employee-list');
    Route::get('employee-edit/{id}',[EmployeeController::class,'employeeEdit'])->name('employee-edit');
    Route::post('/update-employee',[EmployeeController::class,'employeeUpdate'])->name('update-employee');
    // Route::get('/search', [EmployeeController::class,'search'])->name('search');
    Route::get('/employee-address',[EmployeeController::class,'employeeAddress'])->name('employee-address');
    Route::get('/employee-data',[EmployeeController::class,'employeeData'])->name('employee-data');
    Route::get('delete-data/{id}',[EmployeeController::class,'deleteData']);
    Route::get('/show-employee',[EmployeeController::class,'showEmployee'])->name('show-employee');










    Route::get('/create',[CollegeController::class,'showCollegePage'])->name('create');
    Route::post('/insert-user',[CollegeController::class,'insertData'])->name('insert-user');
    Route::get('/user-list',[CollegeController::class,'collegeList'])->name('user-list');
    Route::get('/edit-list/{id}',[CollegeController::class,'collegeEdit'])->name('edit-list');
    Route::post('/update-college',[CollegeController::class,'updateData'])->name('update-college');
    Route::get('/delete-collage/{id}',[CollegeController::class,'deleteData']);
// Route::get('/index',[FamilyController::class,'index']);
// Route::get('/ourstory',[FamilyController::class,'ourstory']);
// Route::get('/gallery',[FamilyController::class,'gallery']);
// Route::get('/contact',[FamilyController::class,'contact']);
// Route::get('/events',[FamilyController::class,'events']);





    // ajax

    Route::get('/form',[CollegeController::class,'showForm'])->name('form');
    Route::post('/store-data',[CollegeController::class,'storeData'])->name('store-data');
    Route::get('/list',[CollegeController::class,'showList'])->name('list');
    Route::get('/delete-data/{id}',[CollegeController::class,'deleteListData'])->name('delete-data');
    Route::get('status/{id}',[CollegeController::class,'inActive'])->name('status');



    // student

    Route::get('/student-form',[CollegeController::class,'studentForm'])->name('student-form');
    Route::post('/student-data',[CollegeController::class,'studentData'])->name('student-data');
    Route::get('/student-list',[CollegeController::class,'studentList'])->name('student-list');
    Route::get('/edit-student/{id}',[CollegeController::class,'studentEdit'])->name('edit-student');
    Route::post('/update-student',[CollegeController::class,'updateStudentData'])->name('update-student');
    Route::get('/delete-student-data/{id}',[CollegeController::class,'deleteStudentData'])->name('delete-student-data');
    Route::get('student-status/{id}',[CollegeController::class,'activeInActive'])->name('student-status');



    // cricekt player form

    Route::get('/',[CricketPlayerController::class,'cricketForm'])->name('cricket-palyer-form');
    Route::post('/player-insert',[CricketPlayerController::class,'playerInser'])->name('player-insert');
    Route::get('/player-list',[CricketPlayerController::class,'palyerList'])->name('player-list');
    Route::get('player-edit/{id}',[CricketPlayerController::class,'palyerEdit'])->name('player-edit');
    Route::post('/update-player',[CricketPlayerController::class,'updatePlayer'])->name('update-player');
    Route::get('remove-player/{id}',[CricketPlayerController::class,'removePlayer'])->name('remove-player');

    // captain
    Route::get('/captain-form',[CricketPlayerController::class,'captainForm'])->name('captain-form');
    Route::post('/captain-insert',[CricketPlayerController::class,'captainInsert'])->name('captain-insert');
    Route::get('/captain-list',[CricketPlayerController::class,'captainList'])->name('captain-list');
    Route::get('captain-edit/{id}',[CricketPlayerController::class,'captainEdit'])->name('captain-edit');
    Route::post('/update-captain',[CricketPlayerController::class,'captainUpdate'])->name('update-captain');
    Route::get('remove-captain/{id}',[CricketPlayerController::class,'removeCaptain'])->name('remove-captain');
    Route::get('/team',[CricketPlayerController::class,'captainPlayers'])->name('team');
    Route::post('/team-insert',[CricketPlayerController::class,'captainPlayersInsert'])->name('team-insert');
    Route::get('/team-list',[CricketPlayerController::class,'captainPlayersList'])->name('team-list');
    Route::get('remove-team/{id}',[CricketPlayerController::class,'removeTeamPlayer'])->name('remove-team');
    Route::get('file-export', [CricketPlayerController::class, 'fileExport'])->name('file-export');
    // Route::get('team-edit/{id}',[CricketPlayerController::class,'teamEdit'])->name('team-edit');





    // Route::get('/registration-form',[CricketPlayerController::class,'showRegistrationForm'])->name('registration-form');
    // Route::post('/user-data-insert',[CricketPlayerController::class,'userInsert'])->name('user-data-insert');
    // Route::get('/login',[CricketPlayerController::class,'showLoginPage'])->name('login');
    // Route::post('/user-login',[CricketPlayerController::class,'userLogin'])->name('user-login');

// });




// 4 and ( 100  or 400)



// Route::get('/home', 'HomeController@index')->name('home');
