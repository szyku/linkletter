<?php declare(strict_types=1);


namespace App\Http\Controllers;


use App\DispatchJob;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class LoadExtra extends Controller
{
    public function __invoke(Request $request)
    {
        $itemsPerBatch = config('view.items_per_batch');
        $validated = $request->validate([
            'offset' => 'required|numeric|gt:0',
        ]);
        $jobs = DispatchJob::where('dispatched', true)
            ->take($itemsPerBatch)
            ->orderBy('id', 'desc')
            ->offset($validated['offset'])
            ->get();

        if($jobs->count() === 0) {
            return Response::create('', Response::HTTP_NO_CONTENT);
        }

        return view('link-load', [
            'dispatchGroups' => $jobs,
            'nextOffset' => $validated['offset'] + $itemsPerBatch,
        ]);
    }

}