<?php

namespace App\Http\Controllers;

use App\DispatchJob;
use Illuminate\Http\Request;

class SingleBatch extends Controller
{
    public function __invoke(DispatchJob $job)
    {
        return view('single-job', ['dispatchGroup' => $job]);
    }
}
