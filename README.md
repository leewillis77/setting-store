# Setting Store
Laravel 5.5+ package to provide a simple model / facade for key/value storage.

## Treeware
If you use this package in production, we ask that you [**buy the world some trees**](https://ecologi.com/ademtisoftware?gift-trees) to thank us for our work. By contributing to our forest you’ll be creating employment for local families and restoring wildlife habitats.

<a href="https://ecologi.com/ademtisoftware?gift-trees" rel="nofollow noopener noreferrer" target="_blank">
<img src="https://toolkit.ecologi.com/badges/cpw/5e3abd8bd52a6300171beadb?black=true&landscape=true" alt="We offset our carbon footprint via Ecologi" width="200">
</a>

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

# Treeware

You're free to use this package, but if it makes it to your production environment you are required to buy the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to <a rel="nofollow" href="https://www.bbc.co.uk/news/science-environment-48870920">plant trees</a>. If you support this package and contribute to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees here [offset.earth/ademtisoftware](https://offset.earth/ademtisoftware?gift-trees)

Read more about Treeware at [treeware.earth](http://treeware.earth)
