<?php


namespace PedramDavoodi\Localization\Repositories;


interface LanguageRepositoryInterface
{
    /**
     * get default language
     *
     * @return string
     */
    public function getDefaultLang(): string;

    /**
     * get message
     *
     * @param string $key
     * @param string|null $lang
     * @return string
     */
    public function get(string $key , string $lang = null): string;
}
