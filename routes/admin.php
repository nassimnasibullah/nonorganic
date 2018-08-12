<?php

Route::get('/home', 'AdminAuth\DashboardController@dashboard')->name('home');
Route::put('/paid/{id}', 'AdminAuth\SaleController@update')->name('paid');
Route::resource('/admin', 'AdminAuth\AdminController');
Route::resource('/sales', 'AdminAuth\SaleController');
Route::resource('/category', 'AdminAuth\CategoryController');
Route::resource('/product', 'AdminAuth\ProductController');
Route::resource('/customer', 'AdminAuth\CustomerController');
Route::resource('/courier', 'AdminAuth\CourierController');
Route::resource('/payment', 'AdminAuth\PaymentController');
Route::resource('/slider', 'AdminAuth\SliderController');
Route::get('/generateNota/{id}', 'AdminAuth\ReportController@generateNota');
Route::get('/generateSalesReport', 'AdminAuth\ReportController@generateReports');
Route::get('/sale/show/{id}', 'AdminAuth\SaleController@show');
Route::delete('/sale/del/{id}', 'AdminAuth\SaleController@destroy')->name('sale.del');


