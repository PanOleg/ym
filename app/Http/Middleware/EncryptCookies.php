<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
{
    protected $except = [];

    public function handle($request, Closure $next)
    {
        return parent::handle($request, $next);
    }
}
