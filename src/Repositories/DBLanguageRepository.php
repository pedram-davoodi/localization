<?php


namespace PedramDavoodi\Localization\Repositories;


use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Models\Setting;

class DBLanguageRepository implements LanguageRepositoryInterface
{

    /**
     * get default language
     *
     * @return string
     */
    public function getDefaultLang(): string
    {
        $default_lang = Setting::getDefaultLang();

        return $default_lang ? $default_lang->values : "en";
    }

    /**
     * get message
     *
     * @param string $key
     * @param string|null $lang
     * @return string
     */
    public function get(string $key , string $lang = null): string
    {
        $lang = $lang ?? $this->getDefaultLang();

        $message = Lang::where('lang' , $lang)->firstWhere('item' , $key);

        return $message ? $message->value : $key;
    }
}
