<?php

namespace PedramDavoodi\Localization\Observers;

use PedramDavoodi\Localization\Models\Lang;

class LangObserver
{
    /**
     * Handle the Lang "created" event.
     */
    public function created(Lang $lang)
    {
    }

    /**
     * Handle the Lang "updated" event.
     *
     */
    public function updated(Lang $lang)
    {
        //
    }

    /**
     * Handle the Lang "deleted" event.
     */
    public function deleted(Lang $lang)
    {
        dd('sadasd');
    }

    /**
     * Handle the Lang "restored" event.
     */
    public function restored(Lang $lang)
    {
        //
    }

    /**
     * Handle the Lang "force deleted" event.
     */
    public function forceDeleted(Lang $lang)
    {
        //
    }
}
