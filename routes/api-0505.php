<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Libs\AppConst;
use App\Libs\LoginState;

//
Route::group(['middleware' => 'api'], function() {
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
//        $tasks = App\Task::all()->take(100);
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
