<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Qe_rekons extends model
{
    protected $fillable = [
        'id_designator','designator','volume'

    ];
    protected $hidden = [
        'id_qe_prepare',
        'NIK'
    ];
}