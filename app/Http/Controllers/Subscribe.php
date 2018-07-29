<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Subscriber;
use Spatie\Newsletter\Newsletter;

class Subscribe extends Controller
{

    private $newsletter;


    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function __invoke(SubscribeRequest $request)
    {
        $validated = $request->validated();

        $sub = Subscriber::where(['email' => $validated['who']])->first();
        if (null !== $sub) {
            Subscriber::create(['email' => $validated['who']]);
            if (config('app.enable_newsletter')) {
                $this->newsletter->subscribe($validated['who']);
            }
        }

        $request->session()->flash('success', 'You\'ve been successfully added! Stay tuned!');

        return back();
    }

}
