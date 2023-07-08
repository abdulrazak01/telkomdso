<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Type_List extends model
{
    protected $fillable = [
        'nama'

    ];
    protected $hidden = [
        'id_qe'
    ];
}