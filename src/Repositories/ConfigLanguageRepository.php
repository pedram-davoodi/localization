<?php


namespace PedramDavoodi\Localization\Repositories;


class ConfigLanguageRepository implements LanguageRepositoryInterface
{

    public function getDefaultLang(): string
    {
        return config('localization.default-lang');
    }

    public function get(string $key , string $lang = null): string
    {
        try {
            return __('local-messages.'.$key , [] , $lang ?? $this->getDefaultLang());
        }catch (\Exception $exception){
            return $key;
        }
    }
}
