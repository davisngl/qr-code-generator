<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('qr-code.index');
    }
}
