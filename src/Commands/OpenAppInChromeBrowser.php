<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Symfony\Component\Process\Process;

class OpenAppInChromeBrowser extends StepAlways
{
    public function handle($feedback, $next)
    {
        $feedback->feedback('Final Installation.', 'Installing your app into your dev store and opening in a chrome browser.');

        $process = new Process([
            'google-chrome',
            '--new-tab',
            config('app.url') . '/app',
        ]);

        $process->run();

        $feedback->advance('', '✅ App opening in chrome browser');

        return $next($feedback);
    }
}
