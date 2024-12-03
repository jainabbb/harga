<?php

namespace App\Imports;

use Exception;
use App\Models\Harga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HargaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try{
            $duplikat = Harga::where('bulan', $row['bulan'])->where('tahun', $row['tahun'])
                                // ->where('kecamatan', $row['kode_kecamatan'])
                                ->where('pangan', $row['jenis_pangan'])
                                ->where('pasar', $row['jenis_pasar'])
                                ->first();
            if ($duplikat) {
                $duplikat->update(['harga' => $row['harga']]);
                return null;
            }
            return new Harga([
                'bulan' => $row['bulan'],
                'tahun' => $row['tahun'],
                // 'kecamatan' => $row['kode_kecamatan'],
                'pangan' => $row['jenis_pangan'],
                'pasar' => $row['jenis_pasar'],
                'harga' => $row['harga']
            ]);
        }catch(Exception $e){

        }
    }
}
