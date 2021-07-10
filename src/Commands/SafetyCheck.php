<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class SafetyCheck extends StepAlways
{
    public function handle($feedback, $next)
    {
        $feedback->caution('Only run in a fresh Laravel 6 codebase.' . PHP_EOL . 'Running these commands will make many changes to aspects of your project files.');
        $message = $this->ask('Are you absolutely sure you wish to run the scaffolder?');

        if (strtolower($message) === 'yes') {
            $feedback->advance('Confirmation', '✅ About to begin tasks');
            return $next($feedback);
        }
        $feedback->abort();
    }
}
