<?php


namespace PedramDavoodi\Localization\Repositories;


class ConfigLanguageRepository implements LanguageRepositoryInterface
{

    /**
     * get default language
     *
     * @return string
     */
    public function getDefaultLang(): string
    {
        return config('localization.default-lang');
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
        try {
            return __('local-messages.'.$key , [] , $lang ?? $this->getDefaultLang());
        }catch (\Exception $exception){
            return $key;
        }
    }
}
