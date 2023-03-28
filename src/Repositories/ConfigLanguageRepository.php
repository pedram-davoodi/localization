<?php


namespace PedramDavoodi\Localization\Repositories;


class ConfigLanguageRepository implements LanguageRepositoryInterface
{

    /**
     * get default language
     */
    public function getDefaultLang(): string
    {
        return config('localization.drivers.config.default-lang');
    }

    /**
     * get message
     */
    public function get(string $key , string $lang = null): string
    {
        try {
            return __('local-messages.'.$key , [] , $lang ?? $this->getDefaultLang());
        }catch (\Exception $exception){
            return $key;
        }
    }

    /**
     * get list of available languages
     */
    public function getLangsList(int $paginate = null)
    {
        // TODO: Implement getLangsList() method.
    }
}
