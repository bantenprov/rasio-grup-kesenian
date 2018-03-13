<?php

namespace Bantenprov\RasioGrupKesenian\Models\Bantenprov\RasioGrupKesenian;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RasioGrupKesenian extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'rasio_grup_kesenians';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
