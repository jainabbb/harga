<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Imports\HargaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class HargaController extends Controller
{
    protected $komoditas = [
        1   => 'Beras Selancar',
        2   => 'Beras Topi Koki',
        3   => 'Daging Ayam Ras',
        4   => 'Daging Sapi',
        5   => 'Cabai Merah Besar',
        6   => 'Cabai Merah Keriting',
        7   => 'Cabai Rawit Merah',
        8   => 'Cabai Rawit Hijau',
        9   => 'Gula PSM',
        10  => 'Gula Gulaku',
        11  => 'Minyak Goreng Tropical',
        12  => 'Minyak Goreng Fortune'
    ];

    protected $pasar = [
        1   => 'Pasar Tradisional',
        2   => 'Pasar Modern',
        3   => 'Pedagang Besar',
        4   => 'Produsen'
    ];

    protected $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    public function index()
    {
        $this->authorize('admin');
        $data = Harga::all();
        return view('content.dashboard.tabel-harga', [
            'data' => $data,
            'komoditas' => $this->komoditas,
            'pasar' => $this->pasar,
            'bulan' => $this->bulan
        ]);
    }

    public function store(Request $request)
    {
        $validateFile = $request->validate([
            'file' => 'required|mimes::xls,xlsx'
        ]);

        $file = $request->file('file');
        $file_name = rand().$file->getClientOriginalName();
        $file->move(storage_path('/document/upload/'), $file_name);

        $header = (new HeadingRowImport)->toArray(storage_path('/document/upload/').$file_name);

        $rules = [
            'bulan',
            'tahun',
            'jenis_pasar',
            'jenis_pangan',
            'harga'
        ];

        foreach($rules as $rule){
            if(!in_array($rule, $header[0][0])){
               return back()
               ->with('status', 'Gagal mengimpor data, format file tidak sesuai. Silahkan unduh format yang telah disediakan.')
               ->with('alert-type', 'danger');
            }
        }

        Excel::import(new HargaImport, storage_path('/document/upload/').$file_name);
        File::delete(storage_path('/document/upload/').$file_name);
        return back()->with('status', 'Berhasil mengimpor data Wilayah Kerja.')->with('alert-type', 'success');
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');

        Harga::where('id', $id)->update(['harga' => $request->harga]);

        $request->session()->put('status', 'Berhasil memperbarui nilai.');
        $request->session()->put('alert-type', 'success');

        return response()->json([
            'success'   => true,
            'message'   => 'Data Berhasil Diperbarui'
        ]);
    }
}
