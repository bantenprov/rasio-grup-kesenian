<?php

namespace Bantenprov\RasioGrupKesenian\Models\Bantenprov\RasioGrupKesenian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RasioGrupKesenian extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'angka_melek_hurufs';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
