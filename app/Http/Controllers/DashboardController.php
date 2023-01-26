<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $projects=Project::allowed()->get();
        //$projects=Project::all();
        return view('pages.dashboard',compact('projects'));
    }

   
}
