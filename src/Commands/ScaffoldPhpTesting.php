<?php
namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepBinary;
use Symfony\Component\Process\Process;

class ScaffoldPhpTesting extends StepBinary
{
    public function question()
    {
        return "Would you like to setup PHP Tests for this project?";
    }

    public function handle()
    {
        $this->createEscTestCaseFile();
    }

    private function createEscTestCaseFile()
    {
        $this->updateFile(
            base_path('tests/TestCase.php'),
            "use CreatesApplication;",
            file_get_contents(__DIR__ . '/../stubs/TestCaseUtilityMethods.stub')
        );
    }
}
