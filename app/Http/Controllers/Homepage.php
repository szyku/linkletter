<?php

namespace App\Http\Controllers;

use App\DispatchJob;
use Illuminate\Http\Request;

final class Homepage extends Controller
{

    public function __invoke(Request $request)
    {
        $itemsPerPage = config('view.items_per_batch');
        $groups = DispatchJob::take($itemsPerPage)->where('dispatched', true)->orderBy('id', 'desc')->get();

        return view('dispatch-group.dispatch-group-list', ['dispatchGroups' => $groups]);
    }

}
