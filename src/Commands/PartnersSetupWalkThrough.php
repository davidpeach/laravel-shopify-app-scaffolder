<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class PartnersSetupWalkThrough extends StepAlways
{
    public function handle($string, $next)
    {
        $this->report('Head to partners app creation');
        $this->report('add your App Name e.g. esc-your_name-project_name');

        $this->confirm('Confirm you have entered the app name into partners');

        // Ask app url
        $appUrl = $this->ask('What is your app url?');
        $appUrl = $this->ensurePrefixedWith($appUrl, 'https://');

        $this->report('<comment>' . $appUrl . '/app</comment>');
        $this->confirm('Paste the full url into the App URL field in parters then press enter');

        // Add url to the .env file
        $envFileContents = file_get_contents(base_path('.env'));
        $envFileContents = str_replace('APP_URL', '#APP_URL', $envFileContents);
        file_put_contents(base_path('.env'), $envFileContents);
        file_put_contents(base_path('.env'), 'APP_URL=' . $appUrl . PHP_EOL, FILE_APPEND);

        // give developer whitelist apis to paste into partners.
        $format = "<comment>%s/oauth\n%s/oauth/\n%s/oauth/done\n%s/oauth/done/</comment>";
        $this->report(vsprintf($format, [$appUrl, $appUrl, $appUrl, $appUrl]));
        $this->confirm('Press enter when you have pasted the four urls into "Allowed redirection URL(s)" textarea.');

        // Ask developer for Api key and secret from partners and add to .env file.
        $apiKey = $this->ask('What is your Shopify App Api Key?');
        $apiSecret = $this->ask('What is your Shopify App Api Secret?');
        $format = PHP_EOL . 'SHOPIFY_AUTH_METHOD="app-bridge"' . PHP_EOL . 'SHOPIFY_API_KEY="%s"' . PHP_EOL . 'SHOPIFY_API_SECRET="%s"' . PHP_EOL;
        file_put_contents(base_path('.env'), vsprintf($format, [$apiKey, $apiSecret]), FILE_APPEND);

        return $next($string);
    }
}
