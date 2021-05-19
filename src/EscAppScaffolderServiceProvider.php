<?php

namespace DavidPeach\EscAppScaffolder;

use DavidPeach\BaseCommand\BaseCommandServiceProvider;
use DavidPeach\EscAppScaffolder\EscScaffoldingCommand;
use Illuminate\Support\ServiceProvider;

class EscAppScaffolderServiceProvider extends BaseCommandServiceProvider
{
    public function registerArtisanCommand()
    {
        $this->commands([
            EscScaffoldingCommand::class,
        ]);
    }
}
