<?php

use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return view('url-shortener');
});

Route::post('/create', [UrlController::class, 'create']);
Route::get('/{shortUrl}', [UrlController::class, 'redirect']);
