<?php

namespace PedramDavoodi\Localization\Repositories;

use Illuminate\Support\Facades\Cache;

class CacheLanguageRepository implements LanguageRepositoryInterface
{
    /**
     * get default language
     */
    public function getDefaultLang(): string
    {
        if (!is_null($default_lang = Cache::get("lc-default-lang")))
            return $default_lang;

        $default_lang = (new DBLanguageRepository)->getDefaultLang();
        Cache::put("lc-default-lang" , $default_lang , now()->addDays(10));

        return $default_lang;
    }

    /**
     * get message
     */
    public function get(string $key , string $lang = null): string {
        if (!is_null($cache_message = Cache::get("lc".$lang.".".$key)))
            return $cache_message;

        $db_message = (new DBLanguageRepository)->get($key , $lang);
        Cache::put("lc".$lang.".".$key , $db_message , now()->addMinutes(60));

        return $db_message;
    }

    /**
     * get list of available languages
     */
    public function getLangsList(int $paginate = null)
    {
        // TODO: Implement getLangsList() method.
    }
}
