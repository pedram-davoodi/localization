<?php

namespace PedramDavoodi\Localization\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['validation' , 'key'];
    protected $table = 'lc_settings';
    public $timestamps = [];

    /**
     * Setting keys in database
     */
    public const SETTING_KEYS = [
        'default-lang' => 'default-lang',
        'lang-cache' => 'lang-cache-time',
        'phrase-cache' => 'phrase-cache-time',
    ];

    /**
     * get default lang store in db
     */
    public static function getSetting($key): string
    {
        return self::firstWhere('key' , $key)->values;
    }
}
