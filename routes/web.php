<?php


use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckSession;
use Illuminate\Http\Request;
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

Route::get('/login', function (Request $request) {
    if ($request->session()->has('id'))
        return redirect('dashboard');
    else
        return view('login/login');
});
Route::get('/', function (Request $request) {
    if ($request->session()->has('id'))
        return redirect('dashboard');
    else
        return view('login/login');
});

Route::get('/token', function () {
    return csrf_token();
});

Route::middleware([CheckSession::class])->group(function () {
    Route::get('/users', function () {
        return view('user_management/users');
    });
    Route::get('dashboard', function () {
        return view('dashboard/dashboard');
    });
});



//Login 
Route::post('sign-in', [UserController::class, 'sign_in']);
Route::post('change-password/{id}', [UserController::class, 'change_password']);
Route::get('/logout', function (Request $request) {
    request()->session()->flush();
    if ($request->session()->has('id'))
        return session()->all();
    else
        echo 'No data in the session';
    return redirect('/login');
});


//usermanagement
Route::resource('/UserManagement', UserController::class);
Route::post('UpdateOrCreate', [UserController::class, 'updateorcreate']);
Route::post('user-update/{id}', [UserController::class, 'user_update']);






//test route
Route::get('/test', function (Request $request) {
    $request->session()->put('employee_number', 'Virat Gandhi');
    echo "Data has been added to session";
});
Route::get('/test2', function (Request $request) {
    if ($request->session()->has('employee_number'))
        dd(session()->all());
    //return session()->get('my_name');
    else
        echo 'No data in the session';
});
