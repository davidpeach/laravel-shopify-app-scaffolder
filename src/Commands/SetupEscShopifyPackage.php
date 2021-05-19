<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;
use Symfony\Component\Process\Process;

class SetupEscShopifyPackage extends StepAlways
{
	const PACKAGE_STRING = 'esc/shopify:v3.x-dev';
	const SEARCH_STRING  = 'App\Providers\RouteServiceProvider::class,';
	const PROVIDER_PATH  = 'Esc\Shopify\Providers\APIServiceProvider::class,';

	public function handle()
	{
		$this->installPackage();
		$this->updateConfig();
		$this->publishAssets();
	}

	private function installPackage()
	{
		$process = new Process([
			'composer',
			'require',
			self::PACKAGE_STRING,
		]);

		$process->run();

		$this->report($process->getOutput());
	}

	private function updateConfig()
	{
		$configFileContents = file_get_contents(
			base_path('config/app.php')
		);

		if (! strpos($configFileContents, self::PROVIDER_PATH) !== false) {
			$configFileContents = str_replace(
				self::SEARCH_STRING,
				self::SEARCH_STRING . "\n\n        " . self::PROVIDER_PATH,
				$configFileContents
			);
			file_put_contents(base_path('config/app.php'), $configFileContents);
			$this->report('Laravel config file updated with Esc Shopify service provider');
		} else {
			$this->report('Laravel config already contains the Esc Shopify service provider');
		}
	}

	private function publishAssets()
	{
		$process = new Process([
			'php',
			'artisan',
			'vendor:publish',
			'--provider=Esc\Shopify\Providers\APIServiceProvider',
		]);

		$process->run();

		$this->report($process->getOutput());
	}
}