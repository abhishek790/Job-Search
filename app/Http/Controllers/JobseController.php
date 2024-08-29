<?php

namespace App\Http\Controllers;

use App\Models\Jobse;
use Illuminate\Http\Request;

class JobseController extends Controller
{

    public function index(Request $request)
    {
        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');
        return view('job.index', ['jobs' => Jobse::with('employer')->latest()->filter($filters)->get()]);
    }




    public function show(Jobse $job)
    {
        return view('job.show', ['job' => $job->load('employer.jobses')]);
    }


}
