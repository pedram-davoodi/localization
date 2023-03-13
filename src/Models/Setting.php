<?php

namespace PedramDavoodi\Localization\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
    protected $table = 'lc_settings';

    public static function getDefaultLang()
    {
        return self::firstWhere('key' , 'default-lang');
    }
}
