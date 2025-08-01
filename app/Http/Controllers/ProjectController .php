<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Your logic here
        $projects = []; // or fetch from database
        return view('projects.index', compact('projects'));
    }
}