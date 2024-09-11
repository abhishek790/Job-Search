<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{

    public function index()
    {
        return view(
            'my_job_applications.index',
            [
                'applications' => auth()->user()->jobApplications()
                    ->with([
                        'jobse' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary'),
                        'jobse.employer'
                    ])
                    ->latest()->get()


            ]
        );
    }


    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();
        return redirect()->back()->with('success', 'Job Application removed');
    }
}
