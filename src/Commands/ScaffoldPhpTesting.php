<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class ScaffoldPhpTesting extends StepAlways
{
    public function question()
    {
        return 'Would you like to setup PHP Tests for this project?';
    }

    public function handle($feedback, $next)
    {
        $feedback->feedback('PHP Testing scaffolding', 'Setting up PHP test helpers.');

        $this->createEscTestCaseFile();

        $feedback->feedback('', '✅ Testing helpers added.');

        return $next($feedback);
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
