<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class RunNpmDev extends StepAlways
{
    public function handle($string, $next)
    {
        $process = new Process([
            'npm',
            'run',
            'dev',
        ]);

        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $next($string);
    }
}
