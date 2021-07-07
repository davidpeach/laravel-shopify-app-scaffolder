<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepBinary;
use Illuminate\Support\Facades\File;

class SetupJsAdminDirectory extends StepBinary
{
    public function question()
    {
        return "Would you like to setup the initial shopify admin directory?";
    }

    public function handle()
    {
        $this->setupJsAdmin();
        $this->replaceWebRoutesFile();
        $this->setupAdminBladeFile();
        $this->setupAdminController();
    }

    private function setupJsAdmin()
    {
        File::copyDirectory(
            __DIR__.'/../stubs/admin',
            resource_path('js/admin')
        );
    }

    private function replaceWebRoutesFile()
    {
        // Backup the existing routes/web.php
        file_put_contents(
            base_path('routes/web.php.bak'),
            file_get_contents(base_path('routes/web.php'))
        );

        // Create the new routes/web.php from stub
        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/../stubs/routes/web.php.stub')
        );
    }

    private function setupAdminBladeFile()
    {
        File::copy(
            __DIR__.'/../stubs/resources/views/app.blade.php.stub',
            resource_path('views/app.blade.php')
        );
    }

    private function setupAdminController()
    {
        File::makeDirectory(
            app_path('Http/Controllers/Admin')
        );

        File::copy(
            __DIR__.'/../stubs/app/Http/Controllers/Admin/ShopifyAdminController.php.stub',
            app_path('Http/Controllers/Admin/ShopifyAdminController.php')
        );
    }
}
