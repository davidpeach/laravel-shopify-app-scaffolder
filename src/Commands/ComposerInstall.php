<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class ComposerInstall extends StepAlways
{
    public function handle($feedback, $next)
    {
        $feedback->feedback('Composer Install', 'Installing packages via composer.');

        $output = $this->asyncProcess(
            ['composer', 'install'],
            function ($string) {
                return strpos($string, 'Package manifest generated successfully') !== false;
            }
        );

        $feedback->advance('', '✅ Packages installed.');

        return $next($feedback);
    }
}
