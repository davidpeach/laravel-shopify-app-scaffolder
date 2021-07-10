<?php

namespace DavidPeach\EscAppScaffolder;

use DavidPeach\BaseCommand\Commands\BaseCommand;
use DavidPeach\EscAppScaffolder\Commands\AddMixVariablesToEnv;
use DavidPeach\EscAppScaffolder\Commands\ComposerInstall;
use DavidPeach\EscAppScaffolder\Commands\FixProjectPermissions;
use DavidPeach\EscAppScaffolder\Commands\PartnersSetupWalkThrough;
use DavidPeach\EscAppScaffolder\Commands\ScaffoldPhpTesting;
use DavidPeach\EscAppScaffolder\Commands\SetupEscShopifyPackage;
use DavidPeach\EscAppScaffolder\Commands\SetupJSLibsAndConfig;
use DavidPeach\EscAppScaffolder\Commands\SetupJsAdminDirectory;
use DavidPeach\EscAppScaffolder\Commands\DetermineDatabaseSetup;
use DavidPeach\EscAppScaffolder\Commands\MigrateAndSeed;
use DavidPeach\EscAppScaffolder\Commands\OpenAppInChromeBrowser;
use DavidPeach\EscAppScaffolder\Commands\OpenPartnersForLogin;
use DavidPeach\EscAppScaffolder\Commands\ReloadEnv;
use DavidPeach\EscAppScaffolder\Commands\RunNpmDev;
use DavidPeach\EscAppScaffolder\Commands\SafetyCheck;

class EscScaffoldingCommand extends BaseCommand
{
    protected $signature = 'esc:utils:scaffold';

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
