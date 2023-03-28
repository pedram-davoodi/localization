<?php


namespace PedramDavoodi\Localization\Repositories;


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

    /**
     * get list of available languages
     */
    public function getLangsList(int $paginate = null);
}
