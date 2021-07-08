<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepBinary;

class ScaffoldPhpTesting extends StepBinary
{
    public function question()
    {
        return 'Would you like to setup PHP Tests for this project?';
    }

    public function handle($string, $next)
    {
        $this->createEscTestCaseFile();

        return $next($string);
    }

    private function createEscTestCaseFile()
    {
        $this->updateFile(
            base_path('tests/TestCase.php'),
            'use CreatesApplication;',
            file_get_contents(__DIR__ . '/../stubs/TestCaseUtilityMethods.stub')
        );
    }
}
