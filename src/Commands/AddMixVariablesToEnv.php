<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class AddMixVariablesToEnv extends StepAlways
{
    public function handle()
    {
        $mixVars = file_get_contents(__DIR__ . '/../stubs/mixvars.env.stub');
        file_put_contents(base_path('.env'), $mixVars, FILE_APPEND);
    }
}
