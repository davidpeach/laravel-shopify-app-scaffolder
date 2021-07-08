<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Symfony\Component\Process\Process;

class ComposerInstall extends StepAlways
{
    public function handle($string, $next)
    {
        $process = new Process([
            'composer',
            'install',
        ]);

        $process->start();

        $process->waitUntil(function ($type, $output) {
            return strpos($output, 'Package manifest generated successfully') !== false;
        });

        $this->report($process->getOutput());

        return $next($string);
    }
}
