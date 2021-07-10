<?php

namespace DavidPeach\EscAppScaffolder\Commands;

use DavidPeach\BaseCommand\StepAlways;

class DetermineDatabaseSetup extends StepAlways
{
    public function question()
    {
        return 'Do you want to setup your database connection in the .env file?';
    }

    public function handle($feedback, $next)
    {
        $feedback->feedback('Database configuration', 'Tell us about your local database connection details.');

        $dbName = $this->ask('What is the name of your database?');
        $dbUser = $this->ask('What is your database user name?');
        $dbPass = $this->ask('What is your database password?');

        $fileContents = file_get_contents(base_path('.env'));

        $fileContents = str_replace('DB_DATABASE=laravel', 'DB_DATABASE=' . $dbName, $fileContents);
        $fileContents = str_replace('DB_USERNAME=root', 'DB_USERNAME=' . $dbUser, $fileContents);
        $fileContents = str_replace('DB_PASSWORD=', 'DB_PASSWORD=' . $dbPass, $fileContents);

        file_put_contents(base_path('.env'), $fileContents);

        $feedback->advance('', '✅ Database configuration done.');

        return $next($feedback);
    }
}