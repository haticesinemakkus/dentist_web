<?php

use App\Http\Controllers\Api\AppointmntController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SSSController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/teams', [TeamController::class, 'list']);
Route::get('/sss', [SSSController::class, 'list']);
Route::get('/services', [ServicesController::class, 'list']);
Route::get('/randomservices', [ServicesController::class, 'randomServices']);
Route::get('/blog', [BlogController::class, 'list']);
Route::get('/randomBlog', [BlogController::class, 'random']);
Route::get('/article', [ArticleController::class, 'list']);
Route::get('/randomArticle', [ArticleController::class, 'random']);
Route::get('/setting', [SettingController::class, 'list']);
Route::get('/comment', [CommentController::class, 'list']);
Route::post('/appointment', [AppointmntController::class, 'save']);
Route::post('/appointment_request', [AppointmntController::class, 'appointmentRequest']);



