<?php

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
use App\Libs\AppConst;
use App\Libs\LoginState;

//Route::resource('employees', 'EmployeesController');
//Route::resource('depts', 'DeptsController');
Route::prefix('api')->group(function(){
    /* employees */
    Route::post('employees/store', 'EmployeesController@store');
    /* depts */
    Route::get('depts/index', 'DeptsController@index');
    Route::post('depts/store', 'DeptsController@store');
    Route::post('depts/update/{id}', 'DeptsController@update');
    Route::get('depts/show/{id}', 'DeptsController@show');
    Route::get('depts/edit/{id}', 'DeptsController@edit');
    Route::get('depts/destroy/{id}', 'DeptsController@destroy');
    Route::get('depts/test', 'DeptsController@test');
    // users
    Route::post('users/auth',  function(Request $request) {
        $const = new AppConst;
        $ret=$const->NG_CODE;
        $email   = request('email');
        $password= request('password');
//var_dump( $password );
        $query = App\User::query();
        $query->where('email', $email);
        $user = $query->first();
        if (Hash::check($password, $user->password)) {
            $ret= $const->OK_CODE;
        }
        return ['ret'=>$ret,'user'=> $user ];
    });
    //
    Route::get('tasks',  function() {
        $tasks = App\Task::orderBy('id', 'desc')->get();
        return $tasks;
    });
    Route::get('tasks/show/{id}',  function($id) {
        $task = App\Task::find($id);
        return $task;
    });
    Route::get('tasks/edit/{id}',  function($id) {
        $task = App\Task::find($id);
        return $task;
    });
    Route::post('tasks/add',  function() {
        $task = new App\Task();
        $task->title   = request('title');
        $task->content = request('content');
        $task->save();
        return ['title' => request('title'),'content' => request('content')];
    });
    //
    Route::post('tasks/update/{id}',  function($id) {
        $task = App\Task::find($id);
        $task->title   = request('title');
        $task->content = request('content');
        $task->save();
        return ['title' => request('title'),'content' => request('content')];
    });
    //
    Route::get('tasks/destroy/{id}',  function($id) {
        $const = new AppConst;
        $task = App\Task::find($id);
        $task->delete();
        $ret= $const->OK_CODE;
        return ['ret'=>$ret  ];
    });
    //
    Route::get('user/check',  function() {
        $state = new LoginState;
        $const = new AppConst;
        $user=$state->checkLogin();
        return ['count'=>count($user) , $const->sessParam_user=>$user ];
    });
    //
    Route::get('/books', function(Request $request) {
        return App\Book::paginate(4);
    });
    //
    Route::get('test',  function() {
        $state = new LoginState;
        $user=$state->checkLogin();
        return $user;
    });    
});
//Route::resource('users', 'UsersController');
//Route::post('/users/auth', 'UsersController@auth');
//Route::get('/users/login', 'UsersController@login');
//Route::get('/users/logout', 'UsersController@logout');
//Route::get('/users/test', 'UsersController@test');
//Route::get('/home', 'HomeController@index')->name('home');
// /register : regist
//
Auth::routes();
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');


