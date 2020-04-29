<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>
  <a href="#add" data-toggle="modal" data-target="#addCustomer" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Pelanggan</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered" id="dataCustomer" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th class="text-table-hide"></th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th class="text-table-hide"></th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody id="data_customer">
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Delete Customer -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModalLabel">Yakin ingin menghapus ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <form>
          <input type="hidden" name="id_customer" id="id_customer" value="">
        </form>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button id="btn_delete_customer" class="btn btn-danger" type="button" data-dismiss="modal">Konfirmasi</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Customer
<div class="card-body">
  <div class="row">
    <div class="col-md-4 py-5 bg-primary text-white text-center ">
      <div class=" ">
        <div class="card-body">
          <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
          <h2 class="py-3">Anggota Baru</h2>
          <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.

          </p>
        </div>
      </div>
    </div>
    <div class="col-md-8 py-5 border">
      <h4 class="pb-4">Isi form berikut ini</h4>
      <form id="form-add" action="" method="POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">No. Anggota</span>
              </div>
              <label for=no_user></label>
              <input type="text" value="" class="form-control bg-light" name="no_user" id="no_user" readonly>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for=fullname>Nama Lengkap*</label>
            <input type="text" class="form-control" value="" name="fullname" id="fullname">
           

          </div>
          <div class="form-group col-md-6">
            <label for=username>Username*</label>
            <input type="text" class="form-control" value="" name="username" id="username">
            
          </div>
        </div>
        <div class="form-row">
          <button type="submit" id="btn-submit-form" class="btn btn-success"><i class="fas fa-paper-plane fa-sm text-white-50"></i> Submit</button>
        </div>
        <script>

        </script>
      </form>
    </div>
  </div>
</div> -->