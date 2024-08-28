<?php

use App\Http\Controllers\JobseController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));

Route::resource('jobs', JobseController::class)->only(['index', 'show']);
