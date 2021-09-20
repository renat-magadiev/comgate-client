[![Build Status](https://travis-ci.org/renat-magadiev/comgate-client.svg?branch=master)](https://travis-ci.org/renat-magadiev/comgate-client) [![Coverage Status](https://coveralls.io/repos/github/renat-magadiev/comgate-client/badge.svg?branch=master)](https://coveralls.io/github/renat-magadiev/comgate-client?branch=master)

# Comgate API client
Comgate API client wrapper

This package allow you to create payment using Comgate API and get redirect URL to your customers

Requirements
-------------
- PHP 7.0 or higher
- [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle)

Installation
------------
```sh
$ composer require andrejro2/comgate-client
```


Basic usage
------------

```php
use Comgate\Client;
use Comgate\Request\CreatePayment;

$client = new Client('merchant', true, 'secret');
$createPayment = new CreatePayment(1000, 'orderId', 'test@test.cz', 'Product name');

$createPaymentResponse = $client->send($createPayment);

$redirectUrl = $createPaymentResponse->getRedirectUrl();

```

`CreatePayment` class has the same props as described in Comgate [documentation](https://platebnibrana.comgate.cz/cz/protokol-api#sidemenu-link-12)