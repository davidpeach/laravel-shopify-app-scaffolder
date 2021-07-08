<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class SafetyCheck extends StepAlways
{
    public function handle($string, $next)
    {
        $message = $this->ask('<error> DANGER </error> - Are you absolutely sure you wish to run the scaffolder?');

        if (strtolower($message) === 'yes i certainly am') {
            return $next($string);
        }

        throw new \Exception('Esc scaffolding aborted.', 1);
    }
}
