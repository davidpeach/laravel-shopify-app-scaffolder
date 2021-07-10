# ESC App Scaffolder

Quick-starting shopify app development for Eastide Co.

## Installation

```bash
composer require --dev davidpeach/esc-app-scaffolder
```

## Before Usage

### Shopify Partner ID
One step will attempt to open a Chrome browser tab directly to Shopify Partners for you.

To enable it to do so, please add your Shopify Partner id into you project's `.env` file:
```bash
# For example
SHOPIFY_PARTNERS_ID=12345
```

### Setup your local Nginx configuration
Setup your local nginx configuration for the app you are building, so that it is available at a valid local URL.

You will also need a self-signed SSL certificate. This is a stipulation of Shopify and their Apps.

```bash
# Examples coming soon
```


## Usage

Run the following command, answering yes / no to the questions you are asked.

```bash
php artisan esc:utils:scaffold
```
