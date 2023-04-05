<?php


namespace PedramDavoodi\Localization\Services;


use PedramDavoodi\Localization\LocalizationManager;
use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Repositories\language\AbstractLanguageRepository;

class Localize
{
    private LocalizationManager $localizationManager;
    private AbstractLanguageRepository  $languageRepository;

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
     * change default lang for a user by session
     */
    public function changeDefaultLanguageByCookie($lang):bool
    {
        if (Lang::whereLang($lang)->exists()) {
            setcookie('lc-default-lang' , $lang);
            return true;
        }
        return false;
    }

    /**
     * set localization repository
     */
    private function setLanguageRepositoryInterface(string $driver) :void
    {
        $this->languageRepository = $this->localizationManager->getRepository($driver);
    }
}
