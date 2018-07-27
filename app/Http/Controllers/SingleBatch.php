<?php

namespace App\Http\Controllers;

use App\DispatchJob;
use Illuminate\Http\Request;

class SingleBatch extends Controller
{
    public function __invoke(int $id)
    {
        $job = DispatchJob::where('dispatched', true)->findOrFail($id);

        return view('single-job', ['dispatchGroup' => $job]);
    }
}
