<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use carbon\Carbon;
use App\Helpers\Alert;
use App\Models\KatalogModel;
use App\Models\KategoriModel;

class KatalogController extends Controller
{
    public function getListKatalog(Request $request)
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
        
        $kategori = $request->kategori;
        $ukuran = $request->ukuran;
        $harga = $request->harga;
        $katalog = KatalogModel::getListKatalog($kategori, $ukuran, $harga);

        $passing = array(
            'alert' => $showalert,
            'katalog' => $katalog,
            'kategori' => $kategori,
            'ukuran' => $ukuran,
            'harga' => $harga,
        );

        return view('katalog.listKatalog', $passing);
    }

    public function formAddKatalog(Request $request)
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

        return view('katalog.formAdd', $passing);
    }

    public function prosesAddKatalog(Request $request)
    {
        $data = array(
            'kategori_id' => $request->kategori_id,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        );
        KatalogModel::insert($data);
        return redirect('/katalog/list')->with('alertSuccess', 'Data Berhasil Ditambahkan');
    }

    public function formEditKatalog(Request $request)
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
        $katalog = KatalogModel::getKatalogById($request->id);

        $passing = array(
            'alert' => $showalert,
            'kategori' => $kategori,
            'katalog' => $katalog,
        );

        return view('katalog.formEdit', $passing);
    }

    public function prosesEditKatalog(Request $request)
    {
        $data = array(
            'kategori_id' => $request->kategori_id,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'updated_at' => Carbon::now()->toDateTimeString(),
        );
        KatalogModel::where('id', $request->id)->update($data);
        return redirect('/katalog/list')->with('alertSuccess', 'Data Berhasil Ditambahkan');
    }

    public function prosesDeleteKatalog(Request $request)
    {
        KatalogModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
