<!-- Modal User -->
<div class="modal fade" id="modalUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalUserTitle" style="color: #082c6c">Tambah Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="user" enctype="multipart/form-data"
          class="needs-validation" novalidate="" name="userForm">
          <div class="modal-body form-group">
              @csrf
              <div class="row">
                <div class="col mb-3">
                  <label for="nama" class="form-label text-dark">Nama</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="email" class="form-label text-dark">Email</label>
                  <input type="email" class="form-control" name="email" required>
                </div>
              </div>
              <div class="row">
                <div class="col mb-3">
                  <label for="role" class="form-label text-dark">Role</label>
                  <select name="role" id="role" class="form-select" style="color: darkslategray" required>
                    <option selected disabled>Pilih Role</option>
                    <option value="operator">Operator</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Import -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle" style="color: #082c6c">Input Data Harga</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="harga" enctype="multipart/form-data"
          class="needs-validation" novalidate="">
          <div class="modal-body">
              <p class="mt-3">
                  {{-- <span class="badge alert-primary mr-2"><i class="bx bx-info-circle"></i></span> --}}
                  Untuk melakukan import data harga silahkan download format
                  {{-- <br> --}}
                  <a href="{{ asset('assets/document/format-input-data-harga.xlsx') }}"
                      class="link-primary font-weight-bold" download>
                      <i class="bx bxs-download"></i> disini
                  </a>.
              </p>
              @csrf
              <div class="row">
                <div class="col mb-3">
                  <label for="file" class="form-label">File</label>
                  <input type="file" class="form-control" name="file" accept=".xlsx" required>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
</div>