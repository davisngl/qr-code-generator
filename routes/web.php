<?php

use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Nothing to see here.";
});

Route::get('/qr-code', QrCodeController::class);
