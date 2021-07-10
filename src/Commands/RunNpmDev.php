<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class RunNpmDev extends StepAlways
{
    public function handle($feedback, $next)
    {
        $feedback->feedback('NPM compiling', 'Compiling your front-end assets with npm.');

        $output = $this->asyncProcess(
            ['npm', 'run', 'dev'],
            function ($string) {
                return true;
            }
        );

        $feedback->advance('', '✅ Front-end assets compiled.');

        return $next($feedback);
    }
}
