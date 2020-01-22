<?php

Route::resource('/student', 'Admin\StudentController');

Route::get('/', function () {
    return redirect('login');
});
Auth::routes();

Route::get('/home', function () {
    return redirect('');
});