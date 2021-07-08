<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Symfony\Component\Process\Process;

class SetupEscShopifyPackage extends StepAlways
{
    const PACKAGE_STRING = 'esc/shopify:v3.x-dev';
    const SEARCH_STRING = 'App\Providers\RouteServiceProvider::class,';
    const INSERT_STRING = 'Esc\Shopify\Providers\APIServiceProvider::class,';

    public function handle($string, $next)
    {
        $this->installPackage();
        $this->updateConfig();
        $this->publishAssets();
        $this->createShopModel();
        $this->addShopifyUserTraitToUserModel();

        return $next($string);
    }

    private function installPackage()
    {
        $process = new Process([
            'composer',
            'require',
            self::PACKAGE_STRING,
        ]);

        $process->start();

        $process->waitUntil(function ($type, $output) {
            return strpos($output, 'Package manifest generated successfully') !== false;
        });

        $this->report($process->getOutput());
    }

    private function updateConfig()
    {
        $this->updateFile(
            base_path('config/app.php'),
            self::SEARCH_STRING,
            "\n\n        " . self::INSERT_STRING
        );
    }

    private function publishAssets()
    {
        $process = new Process([
            'php',
            'artisan',
            'vendor:publish',
            '--provider=Esc\Shopify\Providers\APIServiceProvider',
        ]);

        $process->start();

        $process->waitUntil(function ($type, $output) {
            return strpos($output, 'Publishing complete') !== false;
        });

        $this->report($process->getOutput());
    }

    private function createShopModel()
    {
        file_put_contents(
            app_path('Shop.php'),
            file_get_contents(__DIR__ . '/../stubs/App_Shop.stub')
        );
    }

    private function addShopifyUserTraitToUserModel()
    {
        $this->updateFile(
            app_path('User.php'),
            'use Illuminate\Notifications\Notifiable;',
            'use Esc\Shopify\Traits\ShopifyUser;'
        );

        $this->updateFile(
            app_path('User.php'),
            'use Notifiable;',
            "\n    " . 'use ShopifyUser;'
        );
    }
}
