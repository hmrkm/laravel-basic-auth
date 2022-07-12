<?php

namespace Meisterguild\LaravelBasicAuth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username = $request->getUser();
        $password = $request->getPassword();

        $basicAuthUsername = config('envbasicauth.username');
        $basicAuthPassword = config('envbasicauth.password');

        if (empty($basicAuthUsername) || empty($basicAuthPassword)) {
            return $next($request);
        }

        if ($username === $basicAuthUsername && $password === $basicAuthPassword) {
            return $next($request);
        }

        abort(401, "Enter username and password.", [
            header('WWW-Authenticate: Basic realm="Test Site"'),
            header('Content-Type: text/plain; charset=utf-8')
        ]);
    }
}
