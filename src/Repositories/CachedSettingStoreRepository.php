<?php

namespace Leewillis77\SettingStore\Repositories;

use Leewillis77\SettingStore\Setting;
use Illuminate\Cache\Repository as CacheRepository;

class CachedSettingStoreRepository extends SettingStoreRepository
{
    const CACHE_PREFIX = '__ss__';

    /** @var CacheRepository */
    protected $cache;

    public function __construct(CacheRepository $cache)
    {
        $this->cache = $cache;
    }

    /** {@inheritdoc} */
    public function get(string $key, string $default = '') : string
    {
        return $this->cache->rememberForever(self::CACHE_PREFIX . $key, function () use ($key, $default) {
            return parent::get($key, $default);
        });
    }

    /** {@inheritdoc} */
    public function set(string $key, string $value) : string
    {
        $this->cache->forget(self::CACHE_KEY . $key);

        return parent::set($key, $value);
    }


    /** {@inheritdoc} */
    public function forget(string $key) : bool
    {
        $this->cache->forget(self::CACHE_KEY . $key);

        return parent::forget($key);
    }
}
