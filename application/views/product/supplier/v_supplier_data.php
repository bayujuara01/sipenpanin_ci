<!-- Page Heading -->
<div class="d-sm-flex col-lg-12 col-md-12 align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Data Supplier</h1>
  <a href="#add" data-toggle="modal" id="btn_show_add" data-target="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Supplier</a>
</div>

<div class="card col-lg-12 col-md-12 shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Supplier</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered" id="dataSupplier" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Supplier</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Nama Supplier</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody id="data_supplier">
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Delete Supplier -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteSupplierModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteSupplierModalLabel">Yakin ingin menghapus supplier ini ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <form>
          <input type="hidden" name="id_supplier" id="id_supplier" value="">
        </form>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button id="btn_delete_supplier" class="btn btn-danger" type="button" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Supplier -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSupplierModalLabel">Tambah Supplier</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <form id="form-add" action="" method="POST">
              <div class="form-group col-md">
                <label for="name_supplier">Nama</label>
                <input type="text" class="form-control" name="name_supplier" id="name_supplier">
              </div>
              <div class="form-group col-md">
                <label for="telp_supplier">Telp. Supplier</label>
                <input type="text" class="form-control" name="telp_supplier" id="telp_supplier">
              </div>
              <div class="form-group col-md">
                <label for="address_supplier">Alamat</label>
                <input type="text" class="form-control" name="address_supplier" id="address_supplier">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="btn_cancel" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_add_supplier" class="btn btn-success" name="add" type="button" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Supplier -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editSupplierModalLabel">Pembaharuan Data Supplier</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <form id="form-edit" action="" method="POST">
              <div class="form-group col-md">
                <label for="name_edit_supplier">Nama</label>
                <input type="text" class="form-control" name="name_edit_supplier" id="name_edit_supplier">
                <input type="hidden" name="id_supplier_edit" id="id_supplier_edit">
              </div>
              <div class="form-group col-md">
                <label for="telp_edit_supplier">Telp. Supplier</label>
                <input type="text" class="form-control" name="telp_edit_supplier" id="telp_edit_supplier">
              </div>
              <div class="form-group col-md">
                <label for="address_edit_supplier">Alamat</label>
                <input type="text" class="form-control" name="address_edit_supplier" id="address_edit_supplier">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="btn_cancel" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_edit_supplier" class="btn btn-success" name="add" type="button" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>