<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Qe_rekons extends model
{
    protected $fillable = [
        'id_qe_prepare','latitude','longitude','nama_lokasi','sto','tanggal_kejadian','foto_finish','mitra','status'

    ];
    protected $hidden = [
        'id_qe_prepare',
        'NIK'
    ];
}