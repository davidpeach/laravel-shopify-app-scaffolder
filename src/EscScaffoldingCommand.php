<?php

namespace DavidPeach\EscAppScaffolder;

use DavidPeach\BaseCommand\Commands\BaseCommand;
use DavidPeach\EscAppScaffolder\Commands\SetupEscShopifyPackage;

class EscScaffoldingCommand extends BaseCommand
{
    protected $signature = 'esc:scaffold';

    protected $commands = [
        SetupEscShopifyPackage::class,
    ];
}