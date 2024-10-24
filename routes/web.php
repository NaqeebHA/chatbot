<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function () {
    return view('chat-page');
})->middleware(['auth'])->name('index');

Route::get('/page-with-chat', function () {
    return view('page-with-chat');
})->middleware(['auth'])->name('page-with-chat');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::middleware(['web', 'auth:web'])->group(function () 
{
    Route::Group(['prefix' => 'questions'], function ()
    {
        Route::get('starter',[QuestionController::class, 'getStarterQuestions']);
        Route::get('followup/{id}',[QuestionController::class, 'getFollowupQuestions']);
        Route::post('create', [QuestionController::class, 'create']);
        Route::put('update', [QuestionController::class, 'update']);
        Route::delete('delete/{id}', [QuestionController::class, '@delete']);
    });

    Route::Group(['prefix' => 'debtors'], function ()
    {
        Route::get('list','DebtorController@getList');
        Route::post('create', 'DebtorController@create');
        Route::put('update', 'DebtorController@update');
        Route::delete('delete/{id}', 'DebtorController@delete');
    });

    Route::Group(['prefix' => 'debts'], function ()
    {
        Route::get('list','DebtController@getList');
        Route::get('list','DebtController@getList');
        Route::post('create', 'DebtController@create');
        Route::put('update', 'DebtController@update');
        Route::delete('delete/{id}', 'DebtController@delete');
    });
});

require __DIR__.'/auth.php';
