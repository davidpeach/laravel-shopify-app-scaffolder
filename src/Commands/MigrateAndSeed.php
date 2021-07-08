<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Symfony\Component\Process\Process;

class MigrateAndSeed extends StepAlways
{
    public function handle($string, $next)
    {
        $process = new Process([
            'php',
            'artisan',
            'migrate:fresh',
        ]);

        $process->start();

        $process->waitUntil(function ($type, $output) {
            return strpos($output, 'Migrated:  2019_08_19_000000_create_failed_jobs_table') !== false;
        });

        $this->report($process->getOutput());

        $process = new Process([
            'php',
            'artisan',
            'db:seed',
        ]);
        $process->start();
        $process->waitUntil(function ($type, $output) {
            return strpos($output, 'Database seeding completed successfully') !== false;
        });

        $this->report($process->getOutput());

        return $next($string);
    }
}
