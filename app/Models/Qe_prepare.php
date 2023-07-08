<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Qe_prepare extends model
{
    protected $fillable = [
        'id_qe_prepare','NIK','latitude','longitude','no_tiket','nama_lokasi','sto','tanggal_kejadian','foto_prepare','mitra','type_qe','status_qe'

    ];
    protected $hidden = [
        'id_qe_prepare',
        'NIK'
    ];
}