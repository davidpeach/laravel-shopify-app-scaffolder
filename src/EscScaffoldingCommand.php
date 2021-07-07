<?php

namespace DavidPeach\EscAppScaffolder;

use DavidPeach\BaseCommand\Commands\BaseCommand;
use DavidPeach\EscAppScaffolder\Commands\AddMixVariablesToEnv;
use DavidPeach\EscAppScaffolder\Commands\FixProjectPermissions;
use DavidPeach\EscAppScaffolder\Commands\PartnersSetupWalkThrough;
use DavidPeach\EscAppScaffolder\Commands\ScaffoldPhpTesting;
use DavidPeach\EscAppScaffolder\Commands\SetupEscShopifyPackage;
use DavidPeach\EscAppScaffolder\Commands\SetupJSLibsAndConfig;
use DavidPeach\EscAppScaffolder\Commands\SetupJsAdminDirectory;
use DavidPeach\EscAppScaffolder\Commands\DetermineDatabaseSetup;

class EscScaffoldingCommand extends BaseCommand
{
    protected $signature = 'esc:scaffold';

    protected $commands = [
        SetupEscShopifyPackage::class,
        PartnersSetupWalkThrough::class,
        AddMixVariablesToEnv::class,
        ScaffoldPhpTesting::class,
        SetupJsAdminDirectory::class,
        SetupJSLibsAndConfig::class,
        FixProjectPermissions::class,
        DetermineDatabaseSetup::class,
        // setup demo polaris scaffolds <- separate package for generators
        // Setup Shopify webhooks in esc_config <- separate package for configs.
    ];
}
