<?php


namespace PedramDavoodi\Localization\Repositories\language;

class FileLanguageRepository implements LanguageRepositoryInterface
{

    /**
     * get default language
     */
    public function getDefaultLang(): string
    {
        return config('localization.drivers.file.default-lang');
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
}
