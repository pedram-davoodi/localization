<?php

namespace PedramDavoodi\Localization\Providers;

use App\Observers\PhraseObserver;
use Illuminate\Support\ServiceProvider;
use PedramDavoodi\Localization\Models\Lang;
use PedramDavoodi\Localization\Models\Phrase;
use PedramDavoodi\Localization\Observers\LangObserver;

class EventServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Lang::observe(LangObserver::class);
        Phrase::observe(PhraseObserver::class);
    }
}
