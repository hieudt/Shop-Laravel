<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Application;
use Closure;

class Maintenance
{
    protected $app;
    
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance() && (!$this->isAdminRequest($request) || !$this->isAdminIpAdress($request))) {
            return response('Website đang bảo trì', 503);
        }
        return $next($request);
    }
    private function isAdminIpAdress($request)
    {
        return !in_array($request->ip(), ['14.162.167.166', '42.112.111.20']);
    }
    private function isAdminRequest($request)
    {
        return ($request->is('quan-tri/*') or $request->is('dang-nhap'));
    }
}

