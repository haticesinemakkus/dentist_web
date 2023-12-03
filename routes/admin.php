<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Panel\GeneralController;
use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\AppointmentController;
use App\Http\Controllers\Panel\ArticleCategoryController;
use App\Http\Controllers\Panel\ArticleController;
use App\Http\Controllers\Panel\BlogCategoryController;
use App\Http\Controllers\Panel\BlogController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\ServicesController;
use App\Http\Controllers\Panel\SettingController;
use App\Http\Controllers\Panel\SSSController;
use App\Http\Controllers\Panel\TeamController;
use App\Http\Controllers\Panel\UserController;
use App\Models\Panel\AppointmentRequestController;

Route::group(['prefix' => '/', 'middleware' => ['auth:admin']], function() {
    Route::any('/', [GeneralController::class, 'index'])->name('panel.index');

    Route::group(['prefix' => '/user'], function() {
        Route::any('/', [UserController::class, 'list'])->name('panel.user_list');
        Route::get('/form/{unique?}', [UserController::class, 'form'])->name('panel.user_form');
        Route::post('/form/{unique?}', [UserController::class, 'saveForm'])->name('panel.user_save');
        Route::delete('/delete', [UserController::class, 'delete'])->name('panel.user_delete');
    });

    Route::group(['prefix' => '/comment'], function () {
        Route::any('/', [CommentController::class, 'list'])->name('panel.comment_list');
        Route::get('/form/{unique?}', [CommentController::class, 'form'])->name('panel.comment_form');
        Route::post('/form/{unique?}', [CommentController::class, 'save'])->name('panel.comment_save');
        Route::delete('/delete', [CommentController::class, 'delete'])->name('panel.comment_delete');
    });

    Route::group(['prefix' => '/admin'], function() {
        Route::any('/', [AdminController::class, 'list'])->name('panel.admin_list');
        Route::get('/form/{unique?}', [AdminController::class, 'form'])->name('panel.admin_form');
        Route::post('/form/{unique?}', [AdminController::class, 'save'])->name('panel.admin_save');
        Route::delete('/delete', [AdminController::class, 'delete'])->name('panel.admin_delete');
    });

    Route::group(['prefix' => '/sss'], function () {
        Route::any('/', [SSSController::class, 'list'])->name('panel.sss_list');
        Route::get('/form/{unique?}', [SSSController::class, 'form'])->name('panel.sss_form');
        Route::post('/form/{unique?}', [SSSController::class, 'save'])->name('panel.sss_save');
        Route::delete('/delete', [SSSController::class, 'delete'])->name('panel.sss_delete');
    });

    Route::group(['prefix' => '/team'], function () {
        Route::any('/', [TeamController::class, 'list'])->name('panel.team_list');
        Route::get('/form/{unique?}', [TeamController::class, 'form'])->name('panel.team_form');
        Route::post('/form/{unique?}', [TeamController::class, 'save'])->name('panel.team_save');
        Route::delete('/delete', [TeamController::class, 'delete'])->name('panel.team_delete');
    });

    Route::group(['prefix' => '/services'], function () {
        Route::any('/', [ServicesController::class, 'list'])->name('panel.services_list');
        Route::get('/form/{unique?}', [ServicesController::class, 'form'])->name('panel.services_form');
        Route::post('/form/{unique?}', [ServicesController::class, 'save'])->name('panel.services_save');
        Route::delete('/delete', [ServicesController::class, 'delete'])->name('panel.services_delete');
    });

    Route::group(['prefix' => '/blog'], function () {
        Route::any('/', [BlogController::class, 'list'])->name('panel.blog_list');
        Route::get('/form/{unique?}', [BlogController::class, 'form'])->name('panel.blog_form');
        Route::post('/form/{unique?}', [BlogController::class, 'save'])->name('panel.blog_save');
        Route::delete('/delete', [BlogController::class, 'delete'])->name('panel.blog_delete');
    });

    Route::group(['prefix' => '/blog_category'], function () {
        Route::any('/', [BlogCategoryController::class, 'list'])->name('panel.blog_category_list');
        Route::get('/form/{unique?}', [BlogCategoryController::class, 'form'])->name('panel.blog_category_form');
        Route::post('/form/{unique?}', [BlogCategoryController::class, 'save'])->name('panel.blog_category_save');
        Route::delete('/delete', [BlogCategoryController::class, 'delete'])->name('panel.blog_category_delete');
    });


    Route::group(['prefix' => '/article_category'], function () {
        Route::any('/', [ArticleCategoryController::class, 'list'])->name('panel.article_category_list');
        Route::get('/form/{unique?}', [ArticleCategoryController::class, 'form'])->name('panel.article_category_form');
        Route::post('/form/{unique?}', [ArticleCategoryController::class, 'save'])->name('panel.article_category_save');
        Route::delete('/delete', [ArticleCategoryController::class, 'delete'])->name('panel.article_category_delete');
    });

    Route::group(['prefix' => '/article'], function () {
        Route::any('/', [ArticleController::class, 'list'])->name('panel.article_list');
        Route::get('/form/{unique?}', [ArticleController::class, 'form'])->name('panel.article_form');
        Route::post('/form/{unique?}', [ArticleController::class, 'save'])->name('panel.article_save');
        Route::delete('/delete', [ArticleController::class, 'delete'])->name('panel.article_delete');
    });

    Route::group(['prefix' => '/appointment_request'], function () {
        Route::any('/', [AppointmentRequestController::class, 'list'])->name('panel.appointment_request_list');
        Route::get('/form/{unique?}', [AppointmentRequestController::class, 'form'])->name('panel.appointment_request_form');
        Route::post('/form/{unique?}', [AppointmentRequestController::class, 'save'])->name('panel.appointment_request_save');
        Route::delete('/delete', [AppointmentRequestController::class, 'delete'])->name('panel.appointment_request_delete');
    });

    Route::group(['prefix' => '/appointment'], function () {
        Route::any('/', [AppointmentController::class, 'list'])->name('panel.appointment_list');
        Route::get('/form/{unique?}', [AppointmentController::class, 'form'])->name('panel.appointment_form');
        Route::post('/form/{unique?}', [AppointmentController::class, 'save'])->name('panel.appointment_save');
        Route::delete('/delete', [AppointmentController::class, 'delete'])->name('panel.appointment_delete');
    });

    Route::group(['prefix' => 'settings'], function() {
        Route::get('form/{unique?}', [SettingController::class, 'form'])->name('panel.settings_form');
        Route::post('form/{unique?}', [SettingController::class, 'save'])->name('panel.settings_save');
    });

    Route::get('/profile', [AdminController::class, 'profile'])->name('panel.profile');
    Route::post('/profile', [AdminController::class, 'profile_save'])->name('panel.profile_save');
});

Route::get('/login', [AuthController::class, 'login'])->name('panel.login');
Route::post('/login', [AuthController::class, 'access'])->name('panel.access');
Route::get('/logout', [AuthController::class, 'logout'])->name('panel.logout');
