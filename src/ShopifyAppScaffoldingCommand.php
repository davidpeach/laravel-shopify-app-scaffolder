<?php

namespace DavidPeach\ShopifyAppScaffolder;

use DavidPeach\BaseCommand\Commands\BaseCommand;
use DavidPeach\ShopifyAppScaffolder\Commands\AddMixVariablesToEnv;
use DavidPeach\ShopifyAppScaffolder\Commands\ComposerInstall;
use DavidPeach\ShopifyAppScaffolder\Commands\FixProjectPermissions;
use DavidPeach\ShopifyAppScaffolder\Commands\PartnersSetupWalkThrough;
use DavidPeach\ShopifyAppScaffolder\Commands\ScaffoldPhpTesting;
use DavidPeach\ShopifyAppScaffolder\Commands\SetupEscShopifyPackage;
use DavidPeach\ShopifyAppScaffolder\Commands\SetupJSLibsAndConfig;
use DavidPeach\ShopifyAppScaffolder\Commands\SetupJsAdminDirectory;
use DavidPeach\ShopifyAppScaffolder\Commands\DetermineDatabaseSetup;
use DavidPeach\ShopifyAppScaffolder\Commands\MigrateAndSeed;
use DavidPeach\ShopifyAppScaffolder\Commands\OpenAppInChromeBrowser;
use DavidPeach\ShopifyAppScaffolder\Commands\OpenPartnersForLogin;
use DavidPeach\ShopifyAppScaffolder\Commands\ReloadEnv;
use DavidPeach\ShopifyAppScaffolder\Commands\RunNpmDev;
use DavidPeach\ShopifyAppScaffolder\Commands\SafetyCheck;

class ShopifyAppScaffoldingCommand extends BaseCommand
{
    protected $signature = 'peach:shopify:scaffold';

    protected $commands = [
        SafetyCheck::class,
        SetupEscShopifyPackage::class,
        OpenPartnersForLogin::class,
        PartnersSetupWalkThrough::class,
        DetermineDatabaseSetup::class,
        AddMixVariablesToEnv::class,
        ReloadEnv::class,
        ScaffoldPhpTesting::class,
        SetupJsAdminDirectory::class,
        SetupJSLibsAndConfig::class,
        ComposerInstall::class,
        RunNpmDev::class,
        MigrateAndSeed::class,
        FixProjectPermissions::class,
        OpenAppInChromeBrowser::class,
    ];
}
