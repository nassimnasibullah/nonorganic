<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('customer')->user();

    //dd($users);

    return view('customer.home');
})->name('home');

Route::resource('cart', 'CustomerAuth\CartController');
Route::delete('emptyCart', 'CustomerAuth\CartController@emptyCart');
Route::get('courier/{id}', 'CustomerAuth\CartController@select_courier');
Route::post('checkout', 'CustomerAuth\CartController@checkout');
Route::get('getCityByProvince/{id}', 'CustomerAuth\CartController@getCityByProvince');
Route::get('getShippingCost/{to}/{courier}', 'CustomerAuth\CartController@getShippingCost');
Route::get('tes', 'CustomerAuth\CartController@tes');



