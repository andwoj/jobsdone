<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function show(Job $job){
        return view('jobs.show')->with('job', $job);
    }
}
