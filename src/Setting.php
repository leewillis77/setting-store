<?php

namespace Leewillis77\SettingStore;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'setting_store';

    /**
     * Define the fillable properties.
     * @var array  The fillable properties.
     */
    protected $fillable = [
        'key',
        'value'
    ];
}
