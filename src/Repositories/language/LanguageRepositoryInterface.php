<?php


namespace PedramDavoodi\Localization\Repositories\language;


interface LanguageRepositoryInterface
{
    /**
     * get default language
     */
    public function getDefaultLang(): string;

    /**
     * get message
     */
    public function get(string $key , string $lang = null): string;
}
