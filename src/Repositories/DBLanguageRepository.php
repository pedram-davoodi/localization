<?php


namespace PedramDavoodi\Localization\Repositories;


use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Models\Phrase;
use PedramDavoodi\Localization\Models\Setting;
use function React\Promise\all;

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

        $message = Phrase::where('lang' , $lang)->firstWhere('item' , $key);

        return $message ? $message->value : $key;
    }

    /**
     * get list of available languages
     */
    public function getLangsList(int $paginate = null)
    {
        return Lang::when(!is_null($paginate), function ($q) use ($paginate) {
            return $q->paginate($paginate);
        } , function ($q){
            return $q->get();
        });
    }
}
