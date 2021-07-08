<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class AddMixVariablesToEnv extends StepAlways
{
    public function handle($string, $next)
    {
        file_put_contents(
            base_path('.env'),
            file_get_contents(__DIR__ . '/../stubs/mixvars.env.stub'),
            FILE_APPEND
        );

        return $next($string);
    }
}
