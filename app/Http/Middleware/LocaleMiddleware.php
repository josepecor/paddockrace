<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;


class LocaleMiddleware
{

    public function handle( $request, Closure $next)
    {
        // available language in template array
        $availLocale = ['en' => 'en','es' => 'es'];

        // Locale is enabled and allowed to be change
        if (session()->has('locale') && array_key_exists(session()->get('locale'), $availLocale)) {
            // Set the Laravel locale
            app()->setLocale(session()->get('locale'));
        }
        else{
            $preferredLanguage = Request::getPreferredLanguage(config('app.supported_locales'));

            if(Str($preferredLanguage)->substr(-2,2)->upper() == Str("ES")->upper())
                app()->setLocale('es');
            else
                app()->setLocale('en');
        }

        return $next($request);
    }
}

