<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Subscriber;

class Subscribe extends Controller
{
    public function __invoke(SubscribeRequest $request)
    {
        $validated = $request->validated();

        $sub = Subscriber::where(['email' => $validated['who']])->first();
        if (null !== $sub) {
            Subscriber::create(['email' => $validated['who']]);
        }

        $request->session()->flash('success', 'You\'ve been successfully added! Stay tuned!');

        return back();
    }

}
