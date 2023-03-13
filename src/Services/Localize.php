<?php


namespace PedramDavoodi\Localization\Services;


use PedramDavoodi\Localization\Repositories\LanguageRepositoryInterface;

class Localize
{
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function get($key , $lang = null): string
    {
        return $this->languageRepository->get($key , $lang);
    }
}
