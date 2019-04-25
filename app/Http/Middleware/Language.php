<?php

namespace App\Http\Middleware;

use App;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('applocale')) {
            $configLanguage = config('languages')[session('applocale')];
            setlocale(LC_TIME, $configLanguage[1] . '.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(session('applocale'));
        } else {
            session()->put('applocale', config('app.fallback_locale'));
            setlocale(LC_TIME, 'es_ES.utf8');
            Carbon::setLocale(session('applocale'));
            App::setLocale(config('app.fallback_locale'));

        }
        return $next($request);
    }
}
