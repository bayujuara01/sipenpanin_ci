<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Data Produk</h1>
  <a href="#add" data-toggle="modal" id="btn_show_add" data-target="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Produk</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered" id="dataProduct" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
            <th class="text-table-hide"></th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
            <th class="text-table-hide"></th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody id="data_product">
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Delete Product -->
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
          <input type="hidden" name="id_product" id="id_product" value="">
        </form>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button id="btn_delete_product" class="btn btn-danger" type="button" data-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Add Product -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby=addProductModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=addProductModalLabel">Tambah Produk</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <form id="form-add" action="" method="POST">
              <div class="form-group col-md">
                <label for="code_product">Kode Produk</label>
                <input type="text" class="form-control" name="code_product" id="code_product">
              </div>
              <div class="form-group col-md">
                <label for=name_product>Nama Produk</label>
                <input type="text" value="" class="form-control bg-light" name="name_product" id="name_product">
                <input type="hidden" value="" name="id_product_add" id="id_product_add">
              </div>
              <div class="form-group col-md">
                <label for=category_product>Kategori</label>
                <select class="form-control" name="category_product" id="category_product"></select>
              </div>
              <div class="form-group col-md">
                <label for=buy_product>Harga Beli</label>
                <input type="number" value="" class="form-control bg-light" name="buy_product" id="buy_product">
              </div>
              <div class="form-group col-md">
                <label for=sell_product>Harga Jual</label>
                <input type="number" value="" class="form-control bg-light" name="sell_product" id="sell_product">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="btn_cancel" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_add_product" class="btn btn-success" name="add" type="button" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Product -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md">
            <form id="form-edit" action="" method="POST">
              <div class="form-group col-md">
                <label for="code_edit_product">Kode Produk</label>
                <input type="text" class="form-control" name="code_edit_product" id="code_edit_product">
              </div>
              <div class="form-group col-md">
                <label for=name_edit_product>Nama Produk</label>
                <input type="text" value="" class="form-control bg-light" name="name_edit_product" id="name_edit_product">
                <input type="hidden" value="" name="id_product_edit" id="id_product_edit">
              </div>
              <div class="form-group col-md">
                <label for=category_product_edit>Kategori</label>
                <select class="form-control" name="category_product_edit" id="category_product_edit"></select>
              </div>
              <div class="form-group col-md">
                <label for=buy_edit_product>Harga Beli</label>
                <input type="number" value="" class="form-control bg-light" name="buy_edit_product" id="buy_edit_product">
              </div>
              <div class="form-group col-md">
                <label for=sell_edit_product>Harga Jual</label>
                <input type="number" value="" class="form-control bg-light" name="sell_edit_product" id="sell_edit_product">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="btn_cancel" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_edit_product" class="btn btn-success" name="add" type="button" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>