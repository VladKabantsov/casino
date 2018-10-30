<?php

namespace App\Http\Controllers;

use http\Env\Request;

class CompletedRoundController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validated();
    }
}
