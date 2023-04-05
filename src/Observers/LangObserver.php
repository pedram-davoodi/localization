<?php

namespace PedramDavoodi\Localization\Observers;

use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Repositories\language\CacheLanguageRepository;

class LangObserver
{
    private CacheLanguageRepository $cache_language_repository;

    public function __construct()
    {
        $this->cache_language_repository = new CacheLanguageRepository();
    }

    /**
     * Handle the Lang "created" event.
     */
    public function created(Lang $lang)
    {
        $this->cache_language_repository->setLangCache($lang->lang);
    }

    /**
     * Handle the Lang "updated" event.
     *
     */
    public function updated(Lang $lang)
    {
        $this->cache_language_repository->clearLangCache($lang->getOriginal('lang'));
        $this->cache_language_repository->setLangCache($lang->lang);
    }

    /**
     * Handle the Lang "deleted" event.
     */
    public function deleted(Lang $lang)
    {
        $this->cache_language_repository->clearLangCache($lang->lang);
        $lang->update([
            'lang' => time() . '::' . $lang->lang
        ]);
    }

    /**
     * Handle the Lang "restored" event.
     */
    public function restored(Lang $lang)
    {
        //TODO
    }

    /**
     * Handle the Lang "force deleted" event.
     */
    public function forceDeleted(Lang $lang)
    {
        //TODO
    }
}
