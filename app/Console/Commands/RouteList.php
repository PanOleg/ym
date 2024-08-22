<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RouteList extends Command
{
    protected $signature = 'route:list';
    protected $description = 'Display all registered routes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $routes = app('router')->getRoutes();
        foreach ($routes as $route) {
            $this->info($route->uri() . ' - ' . implode(',', $route->methods()));
        }
    }
}
