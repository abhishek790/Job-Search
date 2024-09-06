<?php

namespace App\Http\Controllers;

use App\Models\Jobse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{

    public function create(Jobse $job)
    {
        Gate::authorize('apply', $job);
        return view('job_applications.create', ['job' => $job]);
    }


    public function store(Request $request, Jobse $job)
    {
        $validatedData = $request->validate([
            'expected_salary' => 'required|numeric',
            'cv' => 'required|file|mimes:pdf|max:2048'

        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        $job->jobApplications()->create([
            'user_id' => auth()->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);
        return redirect()->route('jobs.show', ['job' => $job->id])->with('success', 'Job Application submitted');
    }


}
