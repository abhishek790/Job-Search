<?php

namespace App\Http\Controllers;

use App\Models\Jobse;
use Illuminate\Http\Request;

class JobseController extends Controller
{

    public function index(Request $request)
    {
        $jobs = Jobse::query();
        $jobs->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%');
            });
        })->when(request('min_salary'), function ($query) {
            $query->where('salary', '>=', request('min_salary'));
        })->when(request('max_salary'), function ($query) {
            $query->where('salary', '<=', request('max_salary'));
        })->when(request('experience'), function ($query) {
            $query->where('experience', request('experience'));
        })->when(request('category'), function ($query) {
            $query->where('category', request('category'));
        });
        return view('job.index', ['jobs' => $jobs->get()]);
    }




    public function show(Jobse $job)
    {
        return view('job.show', ['job' => $job]);
    }


}
