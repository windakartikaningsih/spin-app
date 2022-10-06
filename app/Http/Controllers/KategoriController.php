<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Alert;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function getListKategori(Request $request)
    {
        $alert = $request->session()->get('alert');
        $alertSuccess = $request->session()->get('alertSuccess');
        $alertInfo = $request->session()->get('alertInfo');
        if($alertSuccess){
            $showalert = Alert::alertSuccess($alertSuccess);
        }else if($alertInfo){
            $showalert = Alert::alertinfo($alertInfo);
        }else{
            $showalert = Alert::alertDanger($alert);
        }
        
        $kategori = KategoriModel::get();

        $passing = array(
            'alert' => $showalert,
            'kategori' => $kategori,
        );

        return view('Kategori.listKategori', $passing);
    }
}
