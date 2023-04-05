<?php

namespace PedramDavoodi\Localization\Observers;

use PedramDavoodi\Localization\Models\Phrase;

class PhraseObserver
{
    /**
     * Handle the Phrase "created" event.
     */
    public function created(Phrase $phrase)
    {
        //
    }

    /**
     * Handle the Phrase "updated" event.
     */
    public function updated(Phrase $phrase)
    {
        //
    }

    /**
     * Handle the Phrase "deleted" event.
     */
    public function deleted(Phrase $phrase)
    {
        $phrase->update([
            'item' => time() . '::' . $phrase->item
        ]);
    }

    /**
     * Handle the Phrase "restored" event.
     */
    public function restored(Phrase $phrase)
    {
        //
    }

    /**
     * Handle the Phrase "force deleted" event.
     */
    public function forceDeleted(Phrase $phrase)
    {
        //
    }
}
