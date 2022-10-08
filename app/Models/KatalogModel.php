<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogModel extends Model
{
    protected $table = 'katalog';
    protected $guarded = [];

    public function getListKatalog($kategori, $ukuran, $harga)
    {
        $katalog = new KatalogModel;
        if($kategori != NULL || $ukuran != NULL || $harga != NULL)
        {
            $query = $katalog
            ->select('katalog.*', 'katalog.id as katalog_id', 'kategori.*', 'kategori.id as kategori_id')
            ->leftJoin('kategori', 'kategori.id', '=', 'katalog.kategori_id');

            if($kategori != NULL)
            {
                $query->where('kategori', 'like', '%'.$kategori.'%');
            }

            if($ukuran != NULL)
            {
                $query->where('ukuran', $ukuran);
            }

            if($harga != NULL)
            {
                $query->where('harga', $harga);
            }

            $data = $query->get();
            return $data;
        }else{
            $data = $katalog
            ->select('katalog.*', 'katalog.id as katalog_id', 'kategori.*', 'kategori.id as kategori_id')
            ->leftJoin('kategori', 'kategori.id', '=', 'katalog.kategori_id')
            ->get();
            return $data;
        }
    }

    public function getKatalogById($id)
    {
        $katalog = new KatalogModel;
        $data = $katalog
        ->select('katalog.*', 'katalog.id as katalog_id', 'kategori.*', 'kategori.id as kategori_id')
        ->leftJoin('kategori', 'kategori.id', '=', 'katalog.kategori_id')
        ->where('katalog.id', $id)
        ->first();
        return $data;
    }
}
