<?php

namespace DavidPeach\ShopifyAppScaffolder;

use DavidPeach\BaseCommand\BaseCommandServiceProvider;

class ShopifyAppScaffolderServiceProvider extends BaseCommandServiceProvider
{
    public function registerArtisanCommand()
    {
        $this->commands([
            ShopifyAppScaffoldingCommand::class,
        ]);
    }
}
