<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Dotenv\Dotenv;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;

class ReloadEnv extends StepAlways
{
    public function handle($string, $next)
    {
        with(Dotenv::create(app()->environmentPath(), app()->environmentFile()))->overload();
        with(new LoadConfiguration())->bootstrap(app());

        return $next($string);
    }
}
