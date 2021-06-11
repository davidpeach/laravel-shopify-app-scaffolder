<?php

namespace DavidPeach\EscAppScaffolder;

use DavidPeach\BaseCommand\Commands\BaseCommand;
use DavidPeach\EscAppScaffolder\Commands\ScaffoldPhpTesting;
use DavidPeach\EscAppScaffolder\Commands\SetupEscShopifyPackage;

class EscScaffoldingCommand extends BaseCommand
{
    protected $signature = 'esc:scaffold';

    protected $commands = [
        // SetupEscShopifyPackage::class,
        // Setup Shopify webhooks in esc_config
        // base tests
        ScaffoldPhpTesting::class
        // Setup JS Libs and Config
            // Webpack.mix config
            // resources/js/types.d.ts
            // polaris shim
            // vue shim
            // setup admin folder with demo polaris scaffolds
            // setup app folder with demo setup
    ];
}
