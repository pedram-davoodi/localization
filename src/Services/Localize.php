<?php


namespace PedramDavoodi\Localization\Services;


use PedramDavoodi\Localization\Repositories\LanguageRepositoryInterface;

class Localize
{
    private LanguageRepositoryInterface $languageRepository;

    /**
     * Localize constructor.
     * @param LanguageRepositoryInterface $languageRepository
     */
    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * get message in order to selected or default language
     * 
     * @param $key
     * @param null $lang
     * @return string
     */
    public function get($key , $lang = null): string
    {
        return $this->languageRepository->get($key , $lang);
    }
}
