<?php

namespace App\Http\Middleware;

use Closure;

class RouteLister
{
    public function handle($request, Closure $next)
    {
        if ($request->is('routes')) {
            $routes = app('router')->getRoutes();
            $output = '';
            foreach ($routes as $route) {
                $output .= $route->uri() . ' - ' . implode(',', $route->methods()) . "<br>";
            }
            return response($output);
        }

        return $next($request);
    }
}
