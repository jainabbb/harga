@extends('content/layouts-example/layouts-without-menu')

@section('title', 'SIKOMO')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')

@include('layouts.sections.createModals')

<!-- Form controls -->
<div class="col-md-12">
  <div class="card mb-4">
    <h4 class="card-header fw-bold" style="color: #082c6c">Rata-Rata Harga Pangan Kota Palembang</h4>
    <div class="card-body" style="color: black">
      <div class="row g-2">
        {{-- <div class="col mb-0">
          <form id="kecForm" action="" method="GET" class="px-0">
              @csrf
              <div class="form-group">
                  <strong for="kecSelect">Pilih Kecamatan</strong>
                  <select name="kec" id="kecSelect" class="form-select" style="color: black">
                      @foreach ($kecamatan as $kec)
                      <option value="{{ $kec->kode }}" {{ request()->query('kec') == $kec->kode ? 'selected' : '' }}>{{ $kec->nama }}
                      </option>
                      @endforeach
                  </select>
              </div>
              <input type="hidden" name="pasar" id="pasarHidden">
          </form>
        </div> --}}
        <div class="col mb-0">
          <form id="pasarForm" action="" method="GET" class="px-0">
              @csrf
              <div class="form-group">
                  <strong for="pasarSelect">Pilih Jenis Pasar</strong>
                  <select name="pasar" id="pasarSelect" class="form-select" style="color: black">
                      @foreach ($jenis_pasar as $key => $pasar)
                      <option value="{{ $key }}" {{ request()->query('pasar') == $key ? 'selected' : '' }}>{{ $pasar }}
                      </option>
                      @endforeach
                  </select>
              </div>
              {{-- <input type="hidden" name="kec" id="kecHidden"> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <!-- Total Revenue -->
  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Beras Selancar</h5>
            <img src="{{asset('assets/img/icons/unicons/rice.png')}}" width="30" class="mx-2">
          </div>
        </div>
        <div>
          <div id="incomeChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Beras Topi Koki</h5>
            <img src="{{asset('assets/img/icons/unicons/rice.png')}}" width="30" class="mx-2">
          </div>
        </div>
        <div>
          <div id="profileReportChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Daging Ayam Ras</h5>
          </div>
        </div>
        <div>
          <div id="totalRevenueChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Daging Sapi</h5>
          </div>
        </div>
        <div>
          <div id="sapiChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Cabai Merah Besar</h5>
          </div>
        </div>
        <div>
          <div id="cabeBesarChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Cabai Merah Keriting</h5>
          </div>
        </div>
        <div>
          <div id="cabeKeritingChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Cabai Rawit Merah</h5>
          </div>
        </div>
        <div>
          <div id="cabeRawitMerahChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Cabai Rawit Hijau</h5>
          </div>
        </div>
        <div>
          <div id="cabeRawitHijauChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Gula PSM</h5>
          </div>
        </div>
        <div>
          <div id="psmChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Gula Gulaku</h5>
          </div>
        </div>
        <div>
          <div id="gulakuChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Minyak Goreng Tropical</h5>
          </div>
        </div>
        <div>
          <div id="tropicalChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-lg-3 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="d-flex p-4 pt-3">
          <div class="d-flex align-items-center">
            <h5 class="mb-0 text-black ">Minyak Goreng Fortune</h5>
          </div>
        </div>
        <div>
          <div id="fortuneChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  var selancar = @json($selancar);
  var topi_koki = @json($topi_koki);
  var ayam = @json($ayam);
  var sapi = @json($sapi);
  var merah_besar = @json($merah_besar);
  var merah_keriting = @json($merah_keriting);
  var rawit_merah = @json($rawit_merah);
  var rawit_hijau = @json($rawit_hijau);
  var psm = @json($psm);
  var gulaku = @json($gulaku);
  var tropical = @json($tropical);
  var fortune = @json($fortune);
</script>

@endsection
