<?php


namespace PedramDavoodi\Localization\Repositories;


interface LanguageRepositoryInterface
{
    public function getDefaultLang(): string;

    public function get(string $key , string $lang = null): string;
}
