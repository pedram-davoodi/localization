<?php

namespace PedramDavoodi\Localization\Models;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $guarded = [];
    protected $table = 'lc_langs';

    /**
     * Get all language in available in database
     */
    public static function getLanguageList(): array
    {
        return self::query()->select('lang')->groupBy('lang')->pluck('lang')->toArray();
    }
}
