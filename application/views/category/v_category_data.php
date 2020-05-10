<!-- Page Heading -->
<div class="d-sm-flex col-md-8 align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Data Kategori</h1>
  <a href="#add" data-toggle="modal" id="btn_show_add" data-target="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Kategori</a>
</div>

<!-- DataTales Example -->
<div class="card col-md-8 shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered" id="dataCategory" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Kategori</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Kategori</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody id="data_category">
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Delete Category -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCategoryModalLabel">Yakin ingin menghapus kategori ini ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <form>
          <input type="hidden" name="id_category" id="id_category" value="">
        </form>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button id="btn_delete_category" class="btn btn-danger" type="button" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Category -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <form id="form-add" action="" method="POST">
              <div class="form-group col-md">
                <label for="name_category">Nama</label>
                <input type="text" class="form-control" name="name_category" id="name_category">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="btn_cancel" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_add_category" class="btn btn-success" name="add" type="button" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Category -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryModalLabel">Pembaharuan Data Kategori</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <form id="form-edit" action="" method="POST">
              <div class="form-group col-md">
                <label for="name_edit_category">Nama</label>
                <input type="text" class="form-control" name="name_edit_category" id="name_edit_category">
                <input type="hidden" name="id_category_edit" id="id_category_edit">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="btn_cancel" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_edit_category" class="btn btn-success" name="add" type="button" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>