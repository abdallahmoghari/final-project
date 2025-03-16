<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;
use Symfony\Component\VarDumper\Caster\RedisCaster;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'abdalla';
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    //return view('about', ['name' => $name]);
    // return view('about')->with('name', $name);
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Tichnical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::post('create', function () {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return view('tasks');
});

Route::get('tasks', [TaskController::class, 'index']);

Route::post('create', [TaskController::class, 'create']);

Route::post('delete/{id}', [TaskController::class, 'destroy']);

Route::post('edit/{id}', [TaskController::class, 'edit']);

Route::post('update', [TaskController::class, 'update']);


Route::get('app' , function(){

    return view('layouts.app');
});





Route::get('users', [UserController::class, 'index']);

Route::post('users/create', [UserController::class, 'create']);

Route::post('users/delete/{id}', [UserController::class, 'destroy']);

Route::post('users/edit/{id}', [UserController::class, 'edit']);

Route::put('users/update/{id}', [UserController::class, 'update']);

