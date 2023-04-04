<?php

namespace PedramDavoodi\Localization\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phrase extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'lc_phrases';

}
