<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>
  <a href="#add" data-toggle="modal" data-target="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Pelanggan</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Pelanggan</h6>
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
        <button id="btn_delete_customer" class="btn btn-danger" type="button" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Customer -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCustomerModalLabel">Tambah Pelanggan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <form id="form-add" action="" method="POST">
              <div class="form-group col-md">
                <label for="name_customer">Nama</label>
                <input type="text" class="form-control" name="name_customer" id="name_customer">
              </div>
              <div class="form-group col-md">
                <label for="telp_customer">No. Telepon</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">+62</span>
                  </div>
                  <label for=no_user></label>
                  <input type="number" value="" class="form-control bg-light" name="telp_customer" id="telp_customer">
                  <input type="hidden" value="" name="id_customer_edit" id="id_customer_edit">
                </div>
              </div>
              <div class="form-group col-md">
                <label for=address_customer>Alamat</label>
                <div class="form-group">
                  <textarea class="form-control" type="text" name="address_customer" id="address_customer" rows="3"></textarea>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_add_customer" class="btn btn-success" type="button" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>