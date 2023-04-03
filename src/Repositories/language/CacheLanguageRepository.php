<?php

namespace PedramDavoodi\Localization\Repositories\language;

use Illuminate\Support\Facades\Cache;
use PedramDavoodi\Localization\Models\Phrase;

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

        $lang = $lang?:$this->getDefaultLang();

        if (!is_null($cache_message = Cache::tags(['lc' , $lang])->get($key)))
            return $cache_message;

        $db_message = (new DBLanguageRepository)->get($key , $lang);
        Cache::tags(['lc' , $lang])->put($key , $db_message , now()->addMinutes(60));

        return $db_message;
    }

    /**
     * clear phrases for a specific lang
     */
    public function clearLangCache($lang)
    {
        Cache::tags(['lc' , $lang])->clear();
    }

    /**
     * set phrases for a specific lang
     */
    public function setLangCache($lang)
    {
        Phrase::whereLang($lang)->get()->each(function ($phrase) use ($lang){
            Cache::tags(['lc' , $lang])->put($phrase->item , $phrase->value , now()->addMinutes(60));
        });
    }
}
