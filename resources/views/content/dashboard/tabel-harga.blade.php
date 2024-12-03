@extends('content/layouts-example/layouts-without-menu')

@section('title', 'SIKOMO')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
<link
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.1/fc-4.2.2/fh-3.3.2/kt-2.9.0/r-2.4.1/rg-1.3.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/sr-1.2.2/datatables.min.css"
    rel="stylesheet" />
@endsection

@section('page-style')
<!-- Page -->
<style>
  .page-item.active .page-link, .page-item.active .page-link:hover {
      background-color: #082c6c !important
  }
</style>
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('content')

@include('layouts.sections.createModals')

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditTitle" style="color: #082c6c">Edit Harga</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" enctype="multipart/form-data">
          <div class="modal-body">
              @csrf
              <div class="row">
                <div class="col mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="number" class="form-control" name="harga" required id="harga">
                  <input type="hidden" name="id_harga" id="id_harga">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="btn-submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>

<!-- Form controls -->
<div class="col-md-12">
  <div class="card mb-4">
    <h4 class="card-header" style="color: #082c6c">Rata-Rata Harga Pangan Kota Palembang</h4>
    <div class="card-body">
      <div class="row g-2">
        <div class="table-responsive text-nowrap">
            <table class="table" id="tabelharga">
                <thead>
                    <tr>
                        {{-- <th>Kecamatan</th> --}}
                        <th>Jenis Pasar</th>
                        <th>Komoditas</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($data as $harga)
                        <tr>
                            {{-- <td>{{ $harga->kec->nama }}</td> --}}
                            <td>{{ $pasar[$harga->pasar] }}</td>
                            <td>{{ $komoditas[$harga->pangan] }}</td>
                            <td>{{ $bulan[$harga->bulan] }}</td>
                            <td>{{ $harga->tahun }}</td>
                            <td>{{ $harga->harga }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-edit" data-bs-toggle="modal"
                                data-bs-target="#modalEdit" data-id="{{ $harga->id }}" data-harga="{{ $harga->harga }}">
                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/datatables.min.js"></script>
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script>
    $("#tabelharga").dataTable({
        dom: "Blfrtip",
        buttons: 
        [
            {
                extend: "excel",
                className: "btn-success btn-sm mb-3",
                text: '<i class="bx bx-spreadsheet"></i> Excel',
            }
        ],
    });
    // $('.pagination .active .page-link').css('background-color', '#082c6c')

    $('.btn-edit').on("click", function () {
        $('#id_harga').val($(this).data('id'))
        $('#harga').val($(this).data('harga'))
    });

    $('#btn-submit').on("click", function (e) {
      e.preventDefault();

      $.ajax({
        url: `/harga/${$('#id_harga').val()}`,
        type: "PUT",
        cache: false,
        data: {
            _token: $("meta[name='csrf-token']").attr("content"),
            harga: $('#harga').val()
        },
        success: function (response) {
            location.reload();
        },
        error: function (error) {

        },
      });
    });
</script>

@endsection
