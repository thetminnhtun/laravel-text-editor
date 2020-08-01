<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/summernote');
Route::resource('/summernote', 'SummernoteController');