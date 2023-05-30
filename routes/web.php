<?php

use App\Jobs\PullRepo;
use App\Jobs\RunTests;
use App\Jobs\Deploy;
use Illuminate\Support\Facades\Bus;
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
    $batch = [
        new PullRepo('errandpoint/project1'),
        new PullRepo('errandpoint/project2'),
        new PullRepo('errandpoint/project3')
    ];

    Bus::batch($batch)
    ->allowFailures()
    ->dispatch();

    return view('welcome');
});
