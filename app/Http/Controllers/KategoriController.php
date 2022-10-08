<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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

        return view('kategori.listKategori', $passing);
    }

    public function formEditKategori(Request $request)
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
        
        $kategori = KategoriModel::where('id', $request->id)->get();

        $passing = array(
            'alert' => $showalert,
            'kategori' => $kategori,
        );

        return view('kategori.formEdit', $passing);
    }

    public function prosesAddKategori(Request $request)
    {
        $data = array(
            'kategori' => $request->kategori,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        );
        KategoriModel::insert($data);
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Ditambahkan');
    }

    public function prosesEditKategori(Request $request)
    {
        $data = array(
            'kategori' => $request->kategori,
            'updated_at' => Carbon::now()->toDateTimeString(),
        );
        KategoriModel::where('id', $request->id)->update($data);
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Ditambahkan');
    }

    public function prosesDeleteKategori(Request $request)
    {
        KategoriModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
