<?php

namespace Pterodactyl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pterodactyl\Models\User;
use Symfony\Component\HttpFoundation\Response;

class HeaderAuthentication
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!config('auth.header.enabled', false)) {
            return $next($request);
        }

        $usernameHeader = config('auth.header.username_header', 'X-Auth-Username');
        $emailHeader = config('auth.header.email_header', 'X-Auth-Email');

        $username = $request->header($usernameHeader);
        $email = $request->header($emailHeader);

        if (!$username || !$email) {
            return $next($request);
        }

        $user = User::where('email', $email)->first();

        if (!$user && config('auth.header.auto_create', false)) {
            $user = User::create([
                'username' => $username,
                'email' => $email,
                'name_first' => $username,
                'name_last' => '',
                'password' => bcrypt(str_random(32)),
                'root_admin' => false,
            ]);
        }

        if ($user) {
            Auth::login($user);
        }

        return $next($request);
    }
} 