<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KadetDashboard extends BaseController
{
    public function index()
    {
        return view('Kadet/Dashboard');
    }
}
