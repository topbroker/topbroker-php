topbroker-php
 
PHP bindings to the TopBroker API

## Installation

This library supports PHP 7.1 and later

## Clients
Initialize your client using your access token:

```php
use TopBroker\TopBrokerApi;
$topbroker = new TopBrokerApi('<insert_api_username_token_here>', '<insert_api_password_token_here>');
```

## Contacts
```php
/** Create a Contact */
$new_contact = $topbroker->contacts->createItem(['name' => 'John Doe','user_id' => 1, 'custom_fields' => ['c_f_c_company_name' => 'Company XYZ', 'c_f_c_company_size' => '5-10']]);



