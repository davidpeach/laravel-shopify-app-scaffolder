# ESC App Scaffolder

Quick-starting shopify app development for Eastide Co.

## Usage

### Before scaffolding
Setup your local nginx conf for the app you are building.
Setup a development store in Shopify Partners.
Setup an app in Shopify Partners.
Update your `.env` file `APP_URL` value to be the "App URL" you set up in Partners.
e.g:
```bash
APP_URL=https://my-awesome-app.local
```

Add your env variables to you local app `.env` file:
```bash
SHOPIFY_AUTH_METHOD="app-bridge"
SHOPIFY_API_KEY="your_shopify_app_api_key_from_partners"
SHOPIFY_API_SECRET="your_shopify_app_api_secret_from_partners"
```


### Install

```bash
composer require --dev davidpeach/esc-app-scaffolder
```

### Run the artisan command

Run the following command, answering yes / no to the questions you are asked.

```bash
php artisan esc:scaffold
```
