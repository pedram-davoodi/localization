<?php

namespace PedramDavoodi\Localization\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
    protected $table = 'lc_settings';

    /**
     * get default lang store in db
     */
    public static function getDefaultLang(): Setting
    {
        return self::firstWhere('key' , 'default-lang');
    }
}
