<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Qe_prepare;
use App\Models\Qe_rekons;
use  App\Models\Designator_prepare;
use DB;
class QeController extends BaseController
{
    public function add(Request $request) {
       
        // $id_qe_prepare = $request->input('id_qe_prepare');
        $NIK = $request->input('NIK');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $no_tiket = $request->input('no_tiket');
        $nama_lokasi = $request->input('nama_lokasi');
        $sto = $request->input('sto');
        $tanggal_kejadian = $request->input('tanggal_kejadian');
        $foto_prepare = $request->input('foto_prepare');
        $mitra = $request->input('mitra');
        $type_qe = $request->input('type_qe');
        $status_qe = $request->input('status_qe');

        $id_designator = $request->input('id_designator');
        $designator = $request->input('designator');
        $volume = $request->input('volume');

        $cek = DB::table('qe_prepares')
        ->where('no_tiket',$no_tiket)->first();

        if($cek)
        {
            echo "gagal";
        }
        else {
            if($request->file('foto_prepare')) {
                $name = time().$request->file('foto_prepare')->getClientOriginalName();
                $request->file('foto_prepare')->move('uploads',$name);
    
                $foto_prepare =url('uploads','/'.$name);
            }

            
                $add = DB::table('qe_prepares')->insert($data=[
                    // 'id_qe_prepare' => $id_qe_prepare,
                    'NIK' => $NIK ,
                    'latitude' => $latitude ,
                    'longitude' => $longitude,
                    'no_tiket' => $no_tiket,
                    'nama_lokasi' => $nama_lokasi ,
                    'sto' => $sto ,
                    'tanggal_kejadian' => $tanggal_kejadian,
                    'foto_prepare' => $foto_prepare,
                    'mitra' => $mitra ,
                    'type_qe' => $type_qe ,
                    'status_qe' => $status_qe,
               ]);

            //    for($i=0;$i<30;$i++) {
               
            //     $data_desig = [
            //         // 'id_designator' => $id_designator[$i],
            //         'designator' => $designator[$i],
            //         'volume' => $volume[$i],
            //     ];

            // foreach($request->$designator as $key->$designator) {

            //     $data_desig = new multiinsert();

            //     $data->designator = $designator;
            // }

            $datas = $request->all();
            if(count(array($datas['designator']>0))) {

                foreach((array) $datas as $value) {

                    $datass = array(
                        'id_qe_prepare' => $no_tiket,
                        'designator' => $datas['designator'],
                        'volume' => $datas['volume'],
                    );
                    DB::table('designator_prepares')->insert($datass);
                }
            }
               
               //}
               

           return response()->json($data);
        }
        
    }


    function get($id) {

        $get = DB::table('qe_prepares')
        ->where('no_tiket',$id)
        ->get();
        return response()->json($get);
    }


    function add_qe_rekon(Request $request) {

        $id_qe_prepare = $request->input('id_qe_prepare');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $nama_lokasi = $request->input('nama_lokasi');
        $sto = $request->input('sto');
        $tanggal_kejadian = $request->input('tanggal_kejadian');
        $mitra = $request->input('mitra');
        $foto_finish = $request->input('foto_finish');
        $status = $request->input('status');

        if($request->file('foto_finish')) {
            $name = time().$request->file('foto_finish')->getClientOriginalName();
            $request->file('foto_finish')->move('uploads',$name);

            $foto_finish =url('uploads','/'.$name);
        }

        
        $add = DB::table('qe_rekons')->insert($data=[
            'id_qe_prepare' => $id_qe_prepare,
            'id_qe_prepare' => $id_qe_prepare ,
            'latitude' => $latitude ,
            'longitude' => $longitude,
            'nama_lokasi' => $nama_lokasi ,
            'sto' => $sto ,
            'tanggal_kejadian' => $tanggal_kejadian,
            'foto_finish' => $foto_finish,
            'mitra' => $mitra ,
            'status' => $status,
       ]);

       return response()->json($data);

    }


    function getdata_qe_prepare(Request $request) {

        $no_tiket = $request->input('no_tiket');
       
        return DB::table('qe_prepares')
        ->select(DB::raw('
        qe_prepares.no_tiket,
        NIK,
        latitude,
        longitude,
        nama_lokasi,
        sto,
        tanggal_kejadian,
        mitra,
        type_qe,
        status_qe,
        designator
        '))
        ->join('designator_prepares','qe_prepares.no_tiket','=','designator_prepares.id_qe_prepare')
        ->where('designator_prepares.id_qe_prepare','=',$no_tiket)
        ->get();
       }
    }
    // public function login(Request $request) {
        
    // }

