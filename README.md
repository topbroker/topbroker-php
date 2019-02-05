topbroker-php
 
PHP bindings to the TopBroker API

## Installation

This library supports PHP 7.1 and later

## Usage
Initialize your client using your access token:

```php
use TopBroker\TopBrokerApi;
$topbroker = new TopBrokerApi('<insert_api_username_token_here>', '<insert_api_password_token_here>');
```

## Estates

### Estate listing
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
<https://app.topbroker.lt/api-docs/#/estates/countEstate>
```php
$topbroker->estates->getCount(['user_id' => 123]);
```

### Get All available Estates Custom Fields 
<https://app.topbroker.lt/api-docs/#/estates/getEstateCustomFields>
```php
$topbroker->estates->getCustomFields([]);
```

### Get Attributes for specific Estate Type
<https://app.topbroker.lt/api-docs/#/estates/getEstateCustomFields>
```php
$topbroker->estates->getAttributes('commercial');
$topbroker->estates->getAttributes('flat');
$topbroker->estates->getAttributes('site');
$topbroker->estates->getAttributes('house');
```

### Create a Estate
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
<https://app.topbroker.lt/api-docs/#/estates/getEstate>
```php
$topbroker->estates->getItem(12345);
```

### Update Estate
<https://app.topbroker.lt/api-docs/#/estates/updateEstates>
```php
$topbroker->estates->updateItem(12345, [
  'name' => 'Johnny NewName', 
  'custom_fields' => ['c_f_c_company_name' => 'Company ABC']
  ]);
```

### Assign Estate to Estate 
<https://app.topbroker.lt/api-docs/#/estates/assignEstateToEstate>
```php
$topbroker->estates->assignEstate(12345, ['estate_id' => 2928]);
```

### Get Assigned Estate List
<https://app.topbroker.lt/api-docs/#/estates/listAssignedEstates>
```php
$topbroker->estates->getAssignedEstateList(12345);
```

### Assign Contact to Estate
<https://app.topbroker.lt/api-docs/#/estates/assignContactToEstate>
```php
$topbroker->estates->assignContact(12345, ['contact_id' => 3453]);
```

### Get Assigned Contact List
<https://app.topbroker.lt/api-docs/#/estates/listAssignedContacts>
```php
$topbroker->estates->getAssignedContactList(12345);
```

### Change Estate Privacy
<https://app.topbroker.lt/api-docs/#/estates/changePrivacy>
```php
$topbroker->estates->changePrivacy(12345, ['privacy_level' => 'public']);
```

### Change Estate Owner
<https://app.topbroker.lt/api-docs/#/estates/changeOwner>
```php
$topbroker->estates->changeOwner(12345, ['user_id' => 1]);
```

### Delete Estate
soft-delete, record will be stored in Settings->Trashbin 
where users will be able to recovery records

<https://app.topbroker.lt/api-docs/#/estates/deleteEstate>
```php
$topbroker->estates->deleteItem(12345);
```


## Locations
Various location based records related directly to Estate and Inquiry records.
Also can be used in Custom Fields in any record.

Location record hierarchy:
Municipality -> City -> Block (District) -> Street

### Municipalities
<https://app.topbroker.lt/api-docs/#/municipalities/getMunicipalities>
```php
$topbroker->locations->getMunicipalities([]);
```

### Cities
<https://app.topbroker.lt/api-docs/#/cities/getCities>
```php
/** List of cities located in specific municipality */
$topbroker->locations->getCities(['municipality_id' => 123]);
```

### Blocks (Districts)
<https://app.topbroker.lt/api-docs/#/blocks/getBlocks>
```php
/** List of districts located in specific city */
$topbroker->locations->getBlocks(['city_id' => 123]);
```

### Streets
<https://app.topbroker.lt/api-docs/#/streets/getStreets>
```php
/** List of street located in specific city, containing Flat type estates and minimum price 100K */
$topbroker->locations->getStreets([
  'city_id' => 123, 'for_sale ' => true, 
  'price_to' => 100000, 'estate_type' => ['flat']
  ]);
```

### Locations
Location is flattened hierarchy records of Municipality, City, Block and Street.
Mainly used in Inquiry records. Also is used in Custom Fields 'location' type records values

<https://app.topbroker.lt/api-docs/#/locations/getLocations>
```php
$topbroker->locations->getList([]);
```

### Location Item by ID
<https://app.topbroker.lt/api-docs/#/locations/getLocation>
```php
$topbroker->locations->getItem(1234);
```


## Contacts

### Get Contact List
<https://app.topbroker.lt/api-docs/#/contacts/getContacts>
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
```

### Count Contacts By User ID
<https://app.topbroker.lt/api-docs/#/contacts/countContacts>
```php
$topbroker->contacts->getCount(['user_id' => 123]);
```

### Contact Custom Field list
<https://app.topbroker.lt/api-docs/#/contacts/getEstateCustomFields>
```php
$topbroker->contacts->getCustomFields([]);
```

### Create a Contact 
<https://app.topbroker.lt/api-docs/#/contacts/createContact>
```php
$topbroker->contacts->createItem([
  'contact_type' => 'physical_person', 
  'name' => 'John Doe','user_id' => 123, 
  'custom_fields' => [
    'c_f_c_company_name' => 'Company XYZ', 
    'c_f_c_company_size' => '5-10']
    ]);
```

### Get Contact by ID
<https://app.topbroker.lt/api-docs/#/contacts/getContact>
```php
$topbroker->contacts->getItem(12345);
```

### Update Contact 
<https://app.topbroker.lt/api-docs/#/contacts/updateContact>
```php
$topbroker->contacts->updateItem(12345, [
  'name' => 'Johnny NewName', 
  'custom_fields' => ['c_f_c_company_name' => 'Company ABC']
  ]);
```

### Assign Estate to Contact
<https://app.topbroker.lt/api-docs/#/contacts/assignEstateToContact>
```php
$topbroker->contacts->assignEstate(12345, ['estate_id' => 2928]);
```

### Get Assigned Estate List 
<https://app.topbroker.lt/api-docs/#/contacts/listAssignedEstates>
```php
$topbroker->contacts->getAssignedEstateList(12345);
```

### Assign Contact to Contact
<https://app.topbroker.lt/api-docs/#/contacts/assignContactToContact>
```php
$topbroker->contacts->assignContact(12345, ['contact_id' => 3453]);
```

### Get Assigned Contact List 
<https://app.topbroker.lt/api-docs/#/contacts/listAssignedContacts>
```php
$topbroker->contacts->getAssignedContactList(12345);
```

### Change Contact Owner
<https://app.topbroker.lt/api-docs/#/contacts/changeOwner>
```php
$topbroker->contacts->changeOwner(12345, ['user_id' => 1]);
```

### Delete Contact
soft-delete, record will be stored in Settings->Trashbin 
where users will be able to recovery records

<https://app.topbroker.lt/api-docs/#/contacts/deleteContact>
```php
$topbroker->contacts->deleteItem(12345);
```