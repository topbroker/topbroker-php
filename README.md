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

## Estates

### Estate listing
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/getEstates>

```php
/** Get Estate List */ 
$topbroker->estates->getList([]);

/** Get Estate List Flat and Houses, 
 * Minimum 50 sq. m area, sort by price from highest to lowest  */
$topbroker->estates->getList([
  'estate_type' => ['house', 'flat'], '
  area_min' => 50, 
  'sort_by' => 'price', 'sort_to' => 'desc',
  'per_page' => 10, 'page' => 1 ]);

/** Get Estate List By Custom Field */
$topbroker->estates->getList(['custom_fields' => [
  'c_f_e_zymos' => ['Naujiena', 'Top']]
  ]);
```

### Get Estate Count By User ID
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/countEstate>
```php
$topbroker->estates->getCount(['user_id' => 123]);
```

### Get All available Estates Custom Fields 
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/getEstateCustomFields>
```php
$topbroker->estates->getCustomFields([]);
```

### Get Attributes for specific Estate Type
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/getEstateCustomFields>
```php
$topbroker->estates->getAttributes('commercial');
$topbroker->estates->getAttributes('flat');
$topbroker->estates->getAttributes('site');
$topbroker->estates->getAttributes('house');
```

### Create a Estate
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/createEstates>
```php
$topbroker->estates->createItem([
  'contact_type' => 'physical_person', 
  'name' => 'John Doe','user_id' => 123, 
  'custom_fields' => [
    'c_f_c_company_name' => 'Company XYZ', 
    'c_f_c_company_size' => '5-10']
    ]);
```

### Get Estate by ID
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/getEstate>
```php
$topbroker->estates->getItem(12345);
```

### Update Estate
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/updateEstates>
```php
$topbroker->estates->updateItem(12345, [
  'name' => 'Johnny NewName', 
  'custom_fields' => ['c_f_c_company_name' => 'Company ABC']
  ]);
```

### Assign Estate to Estate 
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/assignEstateToEstate>
```php
$topbroker->estates->assignEstate(12345, ['estate_id' => 2928]);
```

### Get Assigned Estate List
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/listAssignedEstates>
```php
$topbroker->estates->getAssignedEstateList(12345);
```

### Assign Contact to Estate
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/assignContactToEstate>
```php
$topbroker->estates->assignContact(12345, ['contact_id' => 3453]);
```

### Get Assigned Contact List
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/listAssignedContacts>
```php
$topbroker->estates->getAssignedContactList(12345);
```

### Change Estate Privacy
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/changePrivacy>
```php
$topbroker->estates->changePrivacy(12345, ['privacy_level' => 'public']);
```

### Change Estate Owner
List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/changeOwner>
```php
$topbroker->estates->changeOwner(12345, ['user_id' => 1]);
```

### Delete Estate
soft-delete, record will be stored in Settings->Trashbin 
where users will be able to recovery records

List of all available params:
<https://app.topbroker.lt/api-docs/#/estates/deleteEstate>
```php
$topbroker->estates->deleteItem(12345);
```

## Contacts
```php

/** Get Contact List */
$topbroker->contacts->getList([]);

/** Get Contact List By User ID */
$topbroker->contacts->getList(['user_id' => 123]);

/** Get Contact List By Custom Field */
$topbroker->contacts->getList(['custom_fields' => [
  'c_f_c_company_name' => 'Company XYZ', 
  'c_f_c_company_size' => '5-10']
  ]);

/** Get Contact Count By User ID */
$topbroker->contacts->getCount(['user_id' => 123]);

/** Get Contact Count By User ID */
$topbroker->contacts->getCustomFields([]);

/** Create a Contact */
$topbroker->contacts->createItem([
  'contact_type' => 'physical_person', 
  'name' => 'John Doe','user_id' => 123, 
  'custom_fields' => [
    'c_f_c_company_name' => 'Company XYZ', 
    'c_f_c_company_size' => '5-10']
    ]);

/** Get Contact by ID */
$topbroker->contacts->getItem(12345);

/** Update Contact */
$topbroker->contacts->updateItem(12345, [
  'name' => 'Johnny NewName', 
  'custom_fields' => ['c_f_c_company_name' => 'Company ABC']
  ]);

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

/** Delete Contact (soft-delete, 
 * record will be stored in Settings->Trashbin where users 
 * will be able to recovery records) */
$topbroker->contacts->deleteItem(12345);