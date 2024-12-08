<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $name = 'belal';
    $departments = [
        '1' => 'Information Technology',
        '2' => 'Human Resource',
        '3' => 'Finance Department',
    ];
    // return view('about')->with('name',$name);
    // return view('about', ['name' => $name]);
    return view('about', compact('name', 'departments'));
});
Route::post('about', function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Information Technology',
        '2' => 'Human Resource',
        '3' => 'Finance Department',
    ];
    return view('about', compact('name'));
});

Route::get('tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks',compact('tasks'));
});
Route::post('create', function () {
    $tasks_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $tasks_name]);

    return redirect()->back();
    // return view('tasks',compact('tasks'));
});

Route::post('delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});

Route::post('/edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks', 'task'));

});
Route::post('/update', function () {
    $id = $_POST['id'];
    $name = $_POST['name'];
    DB::table('tasks')->where('id', $id)->update(['name' => $name]);
    return redirect(to:'tasks');
});
