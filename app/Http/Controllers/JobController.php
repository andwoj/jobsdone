<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Carbon\Carbon;

class JobController extends Controller
{
    public function show(Job $job){
        return view('jobs.show')->with('job', $job);
    }

    public function index(){
        $jobs = Job::accomplished()->get();

        return view('jobs.index')->with('jobs', $jobs);
    }
}
