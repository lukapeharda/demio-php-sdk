# Demio API PHP SDK

## Installation via Composer

The recommended way to install Demio API PHP SDK is with Composer. 

    curl -sS https://getcomposer.org/installer | php


You can add Demio API PHP SDK as a dependency using the composer.phar CLI:

    php composer.phar require demio/demio-api-php-sdk:~1.0

Alternatively, you can specify demio-api-php-sdk as a dependency in your project's existing **composer.json** file:

    {  
        "require": {  
            "demio/demio-api-php-sdk": "~1.0"  
        }  
    }  

After installing, you need to require Composer's autoloader:

    require 'vendor/autoload.php';

You can find out more on how to install Composer, configure autoloading, and other best-practices for defining dependencies at [https://getcomposer.org](getcomposer.org).

## Initialization

    require 'vendor/autoload.php';
    
    // Api Key and Secret
    $api_key = 'IG8a1PUHxa49rn3q250LVVkF84p5w03L';
    $api_secret = '1Wf20cConSV1zFiw';
    
    // Demio Client initialization
    $client = new \Demio\Client($api_key, $api_secret);

### Ping

    $response = $client->ping();
    
    