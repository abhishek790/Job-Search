<?php

namespace App\Http\Controllers;

use App\Models\Jobse;
use Illuminate\Http\Request;

class JobseController extends Controller
{

    public function index()
    {
        return view('job.index', ['jobs' => Jobse::all()]);
    }




    public function show(Jobse $job)
    {
        return view('job.show', ['job' => $job]);
    }


}
