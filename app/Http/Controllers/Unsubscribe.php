<?php declare(strict_types=1);


namespace App\Http\Controllers;


use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Newsletter\Newsletter;

final class Unsubscribe extends Controller
{

    private $newsletter;


    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }


    public function __invoke(Request $request, Subscriber $subscriber)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        if (config('app.enable_newsletter')) {
            $this->newsletter->delete($subscriber->email);
        }

        Subscriber::destroy($subscriber->id);

        return Response::create('', Response::HTTP_NO_CONTENT);
    }

}