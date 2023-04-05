<?php


namespace PedramDavoodi\Localization\Repositories\language;

abstract class AbstractLanguageRepository
{
    /**
     * get default language
     */
    public function getDefaultLang(): ?string{
        if (isset($_COOKIE['lc-default-lang']))
            return $_COOKIE['lc-default-lang'];
        return null;
    }

    /**
     * get message
     */
    abstract public function get(string $key , string $lang = null): string;
}
