<?php


namespace PedramDavoodi\Localization\Services;


use PedramDavoodi\Localization\LocalizationManager;
use PedramDavoodi\Localization\Repositories\LanguageRepositoryInterface;

class Localize
{
    private LanguageRepositoryInterface $languageRepository;

    /**
     * Localize constructor.
     */
    public function __construct(LocalizationManager $languageManger)
    {
        $this->languageRepository = $languageManger->getRepository(config('localization.default-driver'));
    }

    /**
     * get message in order to selected or default language
     */
    public function get(string $key , string $lang = null): string
    {
        return $this->languageRepository->get($key , $lang);
    }
}
