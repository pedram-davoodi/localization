<?php


namespace PedramDavoodi\Localization\Services;


use PedramDavoodi\Localization\LocalizationManager;
use PedramDavoodi\Localization\Repositories\language\LanguageRepositoryInterface;

class Localize
{
    private LocalizationManager $localizationManager;
    private LanguageRepositoryInterface $languageRepository;

    /**
     * Localize constructor.
     */
    public function __construct(LocalizationManager $localizationManager)
    {
        $this->localizationManager = $localizationManager;
        $this->setLanguageRepositoryInterface(config('localization.default-driver'));
    }

    /**
     * get message in order to selected or default language
     */
    public function get(string $key , string $lang = null , string $driver = null): string
    {
        if (!is_null($driver))
            $this->setLanguageRepositoryInterface($driver);

        return $this->languageRepository->get($key , $lang);
    }

    /**
     * set localization repository
     */
    private function setLanguageRepositoryInterface(string $driver) :void
    {
        $this->languageRepository = $this->localizationManager->getRepository($driver);
    }
}
