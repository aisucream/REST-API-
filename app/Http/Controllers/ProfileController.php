<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pageTitle = 'Profile';
        $icon = 'bi bi-person-circle';
        return view('profile', ['pageTitle' => $pageTitle, 'icon'=>$icon]);
    }
}
