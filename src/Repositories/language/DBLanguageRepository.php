<?php


namespace PedramDavoodi\Localization\Repositories\language;


use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Models\Phrase;
use PedramDavoodi\Localization\Models\Setting;

class DBLanguageRepository implements LanguageRepositoryInterface,EditableLanguageRepositoryInterface
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

        $message = Phrase::where('lang' , $lang)->firstWhere('item' , $key);

        return $message ? $message->value : $key;
    }

    /**
     * get list of available languages
     */
    public function index(int $paginate = null)
    {
        return Lang::when(!is_null($paginate), function ($q) use ($paginate) {
            return $q->paginate($paginate);
        } , function ($q){
            return $q->get();
        });
    }

    /**
     * edit a language
     */
    public function edit(int $lang_id)
    {
        // TODO: Implement edit() method.
    }
}
