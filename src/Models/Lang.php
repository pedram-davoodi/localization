<?php

namespace PedramDavoodi\Localization\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lang extends Model
{
    protected $guarded = [];
    protected $table = 'lc_langs';
    public $timestamps = [];


    /**
     * the phrases those belong to specific language
     */
    public function phrases(): HasMany
    {
        return $this->hasMany(Phrase::class , 'lang' , 'lang');
    }
}
