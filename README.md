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

/** Get Contact List */
$topbroker->contacts->getList([]);

/** Get Contact List By User ID */
$topbroker->contacts->getList(['user_id' => 123]);

/** Get Contact List By Custom Field */
$topbroker->contacts->getList(['custom_fields' => ['c_f_c_company_name' => 'Company XYZ', 'c_f_c_company_size' => '5-10']]);

/** Get Contact Count By User ID */
$topbroker->contacts->getCount(['user_id' => 123]);

/** Get Contact Count By User ID */
$topbroker->contacts->getCustomFields([]);

/** Create a Contact */
$topbroker->contacts->createItem(['contact_type' => 'physical_person', 'name' => 'John Doe','user_id' => 123, 'custom_fields' => ['c_f_c_company_name' => 'Company XYZ', 'c_f_c_company_size' => '5-10']]);

/** Get Contact by ID */
$topbroker->contacts->getItem(12345);

/** Update Contact */
$topbroker->contacts->updateItem(12345, ['name' => 'Johnny NewName', 'custom_fields' => ['c_f_c_company_name' => 'Company ABC']]);

/** Assign Estate to Contact */
$topbroker->contacts->assignEstate(12345, ['estate_id' => 2928]);

/** Get Assigned Estate List */
$topbroker->contacts->getAssignedEstateList(12345);

/** Assign Contact to Contact */
$topbroker->contacts->assignContact(12345, ['contact_id' => 3453]);

/** Get Assigned Contact List */
$topbroker->contacts->getAssignedContactList(12345);

/** Change Contact Owner */
$topbroker->contacts->changeOwner(12345, ['user_id' => 1]);

/** Delete Contact (soft-delete, record will be stored in trashbin where users will be able to recovery records) */
$topbroker->contacts->deleteItem(12345);