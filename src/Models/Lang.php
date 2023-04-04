<?php

namespace PedramDavoodi\Localization\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lang extends Model
{
    use SoftDeletes;

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

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleted(function ($lang) {
            $lang->phrases()->delete();
        });
    }
}
