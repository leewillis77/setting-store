# Setting Store
Laravel 5.5+ package to provide a simple model / facade for key/value storage.

## Installation
Add the package to your Laravel project using composer:

```bash
$ composer require leewillis77/setting-store
```

## Configuration
Publish the database migration using the following artisan command:

```bash
$ php artisan vendor:publish --provider="Leewillis77\SettingStore\Providers\ServiceProvider" --tag="migrations"  
```

Run the migration to create the storage table.

```bash
$ php artisan migrate
```

## Usage

#### Store a (string) setting value
```php
// Set a value for the key 'foo'
SettingStore::set('foo', 'bar');
```

#### Store a (non-string) setting value
```php
// Set a value for the key 'foo'. The value will be serialized before storing.
SettingStore::setSerialized('foo', ['bar']);
```

#### Retrieve a (string) setting value

```php
// Retrieve a value for the key 'foo'
$value = SettingStore::get('foo');
```

#### Retrieve a (string) setting, with a fallback value

```php
// Retrieve a value for the key 'foo', or value 'foobar' if not found
$value = SettingStore::get('foo', 'foobar');
```

#### Retrieve a (non-string) setting value

```php
// Retrieve a value for the key 'foo'. The value will be unserialized before being returned.
SettingStore::getSerialized('foo');
```

#### Retrieve a (non-string) setting value, with a fallback

```php
// Retrieve a value for the key 'foo'
SettingStore::getSerialized('foo', ['bar']);
```

### Accessing the SettingStore
You can access the SettingStore using the `SettingStore` facade, e.g.

```php
$value = SettingStore::get('foo');
```

Alternatively, you can inject the repository into your controllers, e.g.

```php
<?php

use Leewillis77\SettingStore\Repositories\SettingStoreRepository;

public function myControllerAction(SettingStoreRepository $settingStore)
{
    $value = $settingStore->get('foo');

}
```

You can also retrieve the repository from the service container.

```php
<?php

$settingStore = App::make('setting_store');
$value = $settingStore->get('foo');
```
