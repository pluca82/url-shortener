<?php

use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return view('test');
});

Route::post('/create', [UrlController::class, 'create']);
Route::get('/{shortUrl}', [UrlController::class, 'redirect']);
