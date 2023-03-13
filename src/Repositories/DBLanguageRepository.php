<?php


namespace PedramDavoodi\Localization\Repositories;


use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Models\Setting;

class DBLanguageRepository implements LanguageRepositoryInterface
{

    /**
     * get default language
     */
    public function getDefaultLang(): string
    {
        $default_lang = Setting::getDefaultLang();

        return $default_lang ? $default_lang->values : "en";
    }

    /**
     * get message
     */
    public function get(string $key , string $lang = null): string
    {
        $lang = $lang ?? $this->getDefaultLang();

        $message = Lang::where('lang' , $lang)->firstWhere('item' , $key);

        return $message ? $message->value : $key;
    }
}
