<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function contactInfoList()
    {
        return view('settings.contact-list');
    }

    public function studioList()
    {
        
    }
}
