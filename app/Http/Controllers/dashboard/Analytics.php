<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Harga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;

class Analytics extends Controller
{
  protected $pasar = [
      1   => 'Pasar Tradisional',
      2   => 'Pasar Modern',
      3   => 'Pedagang Besar',
      4   => 'Produsen'
  ];

  public function index(Request $request)
  {
    $pasar = $request->pasar;
    // $kec = $request->kec;

    if ($pasar == null) {
        $pasar = 1;
    } else {
        $pasar = $pasar;
    }

    // if ($kec == null) {
    //     $kec = 10;
    // } else {
    //     $kec = $kec;
    // }

    $kecamatan = Kecamatan::all();

    $selancar = Harga::where('pangan', 1)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $topi_koki = Harga::where('pangan', 2)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $ayam = Harga::where('pangan', 3)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $sapi = Harga::where('pangan', 4)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $merah_besar = Harga::where('pangan', 5)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $merah_keriting = Harga::where('pangan', 6)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $rawit_merah = Harga::where('pangan', 7)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $rawit_hijau = Harga::where('pangan', 8)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $psm = Harga::where('pangan', 9)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $gulaku = Harga::where('pangan', 10)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $tropical = Harga::where('pangan', 11)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();

    $fortune = Harga::where('pangan', 12)->where('pasar', $pasar)
                  ->orderByDesc('tahun')
                  ->orderByDesc('bulan')
                  ->take(6)
                  ->get()->reverse()->values();
                  
    return view('content.dashboard.dashboards-analytics', [
      'jenis_pasar' => $this->pasar,
      // 'kecamatan' => $kecamatan,
      'selancar' => $selancar,
      'topi_koki' => $topi_koki,
      'ayam' => $ayam,
      'sapi' => $sapi,
      'merah_besar' => $merah_besar,
      'merah_keriting' => $merah_keriting,
      'rawit_merah' => $rawit_merah,
      'rawit_hijau' => $rawit_hijau,
      'psm' => $psm,
      'gulaku' => $gulaku,
      'tropical' => $tropical,
      'fortune' => $fortune,
    ]);
  }
}
