<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Symfony\Component\Process\Process;

class OpenAppInChromeBrowser extends StepAlways
{
    public function handle($string, $next)
    {
        $process = new Process([
            'google-chrome',
            '--new-tab',
            config('app.url') . '/app',
        ]);

        $process->run();

        return $next($string);
    }
}
