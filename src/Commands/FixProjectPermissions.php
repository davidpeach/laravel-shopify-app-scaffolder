<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepBinary;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class FixProjectPermissions extends StepBinary
{
    private $user;
    private $workingDirectory;

    public function question()
    {
        return "Would you like to fix the project permissions";
    }

    public function handle()
    {
        $process = new Process(['whoami']);
        $process->run();
        $this->user = trim($process->getOutput());
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $process = new Process(['pwd']);
        $process->run();
        $this->workingDirectory = trim($process->getOutput());
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $process = new Process([
            'chown',
            '-R',
            $this->user . ':www-data',
            $this->workingDirectory,
        ]);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}
