<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::Group(['prefix' => 'admin'], function ()
// {
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
// });

