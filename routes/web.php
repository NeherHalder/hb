<?php

Route::group(['middleware' => 'language'], function () {
    // Frontend Routes
    Route::get('/', function () {
        return redirect('booking');
    });
    // Language Switcher
    Route::post('language/switcher', 'LanguageSwitcherController@update');

    // Auth Routes
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Auth\LoginController@login');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', 'Auth\DashboardController@dashboard');
        Route::get('auth/change-password', 'Auth\PasswordController@showForm');
        Route::post('auth/change-password', 'Auth\PasswordController@change');
        Route::get('logout', 'Auth\DashboardController@logout');
    });

    // Contact Routes
    Route::get('/contact', 'ContactController@index');
    Route::post('/contact', 'ContactController@store');

    // Booking Room Routes
    Route::get('/booking-rooms', 'BookingRoomsController@index');
    Route::get('/booking-rooms/{room}', 'BookingRoomsController@show');

    // Rules & Regulations Routes
    Route::get('/booking-room/{room}', 'BookingRoomsController@showRules');
    Route::get('/booking-room/{room}/download', 'BookingRoomsController@download');

    // Hall/Seminar Room Booking Routes
    Route::get('/booking', 'BookingsController@show');
    Route::post('/booking', 'BookingsController@store');
    Route::get('/booking/pay-order/{booking}', 'BookingRoomsController@payOrder')->name('payOrder');
    Route::get('/booking/pay-order/{booking}/print', 'BookingRoomsController@printPayOrder')->name('printPayOrder');
    Route::get('/booking/chalan/{booking}/print', 'BookingRoomsController@printChalan')->name('printChalan');

    // Admin Routes
    Route::group([
        'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']
    ], function () {
        Route::get('/dashboard', 'AdminController@dashboard');

        // Messages Routes
        Route::get('/messages', 'MessagesController@index');
        Route::get('/messages/{message}', 'MessagesController@show');
        Route::post('/messages/reply', 'MessagesController@reply');
        Route::delete('/messages/{message}', 'MessagesController@destroy');

        // Search Routes
        Route::get('/search', 'SearchController@index');

        // Booking management routes
        Route::get('/booking-management', 'BookingManagementController@index');
        Route::get('/booking-management/{booking}', 'BookingManagementController@show');
        Route::patch('booking-management/{booking}/status/update', 'BookingManagementController@toggleStatus');
    });

    // Super Admin Routes
    Route::group([
        'prefix' => 'super-admin', 'namespace' => 'SuperAdmin', 'middleware' => ['auth', 'superAdmin']
    ], function () {
        Route::get('/dashboard', 'SuperAdminController@dashboard');

        // User Management
        Route::get('/user-management', 'UserManagementController@index');
        Route::get('/user-management/create', 'UserManagementController@create');
        Route::post('/user-management', 'UserManagementController@store');
        Route::get('/user-management/{user}/edit', 'UserManagementController@edit');
        Route::patch('/user-management/{user}', 'UserManagementController@update');
        Route::patch('/user-management/status/{user}', 'UserManagementController@changeStatus');

        // Notification Routes
        Route::get('/notifications', 'NotificationsController@index');
        Route::get('/notifications/{booking}', 'NotificationsController@show');
    });

    Route::get('/test2', function () {
        return view('frontend.booking.pay-order');
    });
    Route::get('/booking-calendar', function () {
        return view('frontend.calendar');
    });
});
