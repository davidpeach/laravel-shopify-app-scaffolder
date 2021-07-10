<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Dotenv\Dotenv;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;

class ReloadEnv extends StepAlways
{
    public function handle($feedback, $next)
    {
        $feedback->feedback('Reloading .env', 'Reloading your .env file.');

        with(Dotenv::create(app()->environmentPath(), app()->environmentFile()))->overload();
        with(new LoadConfiguration())->bootstrap(app());

        $feedback->advance('', '✅ .env file reloaded');

        return $next($feedback);
    }
}
