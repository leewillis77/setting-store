<?php

namespace Leewillis77\SettingStore\Repositories;

use Leewillis77\SettingStore\Setting;

class SettingStoreRepository
{
    /**
     * Retrieve a setting by key.
     *
     * @param  string $key     The key to retrieve.
     * @param  string $default The default value to return if setting not found.
     *
     * @return string          The setting's value, or $default if not found.
     */
    public function get(string $key, string $default = '') : string
    {
        $result = Setting::where('key', $key)->first();
        if (is_null($result)) {
            return $default;
        }

        return $result->value;
    }

    /**
     * Retrieve a serialized setting by key.
     *
     * @param  string $key     The key to retrieve.
     * @param  mixed  $default The default value to return if setting not found.
     *
     * @return mixed           The setting's value, or $default if not found.
     */
    public function getSerialized(string $key, $default = '')
    {
        $result = $this->get($key);
        if ($result === '') {
            return $default;
        }
        return unserialize($result);
    }

    /**
     * Create, or update a setting by key.
     *
     * @param string $key   The key to create, or update.
     * @param string $value The value to set for this key.
     *
     * @return string       The value set.
     */
    public function set(string $key, string $value) : string
    {
        $current = Setting::where('key', $key)->first();
        if (!is_null($current)) {
            $current->value = $value;
            $current->save();

            return $value;
        }
        $new = Setting::create([
            'key'   => $key,
            'value' => $value,
        ]);
        return $value;
    }

    /**
     * Create, or update a serialized setting by key.
     *
     * @param string $key   The key to create, or update.
     * @param mixed  $value The value to set for this key.
     *
     * @return mixed        The value set.
     */
    public function setSerialized(string $key, $value)
    {
        $this->set($key, serialize($value));
        return $value;
    }

    /**
     * Forget a setting by key.
     *
     * @param  string $key  The key to forget.
     *
     * @return bool
     */
    public function forget(string $key) : bool
    {
        $result = Setting::where('key', $key)->first();
        if (! is_null($result)) {
            $value = $result->value;
            $result->delete();
        }
        return true;
    }

    /**
     * Return all current settings.
     *
     * @return IlluminateSupportCollection [description]
     */
    public function all() : Illuminate\Support\Collection
    {
        return Setting::all();
    }
}
