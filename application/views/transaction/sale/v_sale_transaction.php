<div class="row">
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100">
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="date_transaction">Tanggal</label>
          </div>
          <div class="col">
            <input type="text" value="<?= date('d/m/Y') ?>" class="form-control" name="date_transaction" id="date_transaction">
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="name_seller">Kasir</label>
          </div>
          <div class="col">
            <input type="text" class="form-control" name="name_seller" id="name_seller" value="<?= $this->authentication->userLogin()->nama_pengguna; ?>" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mt-1">
            <label for="customer_transaction">Pelanggan</label>
          </div>
          <div class="col">
            <select class="form-control" name="customer_transaction" id="customer_transaction">
              <?php foreach ($customers as $customer) : ?>
                <option value="<?= $customer->id_customer; ?>"><?= ucwords($customer->nama_customer); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100">
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="date_transaction">Kode</label>
          </div>
          <div class="col">
            <div class="input-group">
              <input type="text" class="form-control" id="code_product" name="code_product" placeholder="Kode" aria-label="Kode" aria-describedby="basic-addon2">
              <input type="hidden" id="id_product" value="">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addItemModal"><i class="fas fa-search fa-sm"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="qty_product">Qty</label>
          </div>
          <div class="col">
            <input type="number" class="form-control" name="qty_product" id="qty_product" value="1">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col mt">
            <button class="btn btn-block btn-primary" id="btn_add">Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-bottom-info shadow h-100">
      <div class="card-body">
        <div class="d-flex align-items-end flex-column">

          <h6 class="text-info">Invoice</h6>
          <h5><b><?= $invoice; ?></h5>
          <h1 class="text-dark"><sup>Rp. </sup><b id="text_total_cart_main">13000</b></h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8 col-md-7">
    <div class="card border-left-primary shadow">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-sm table-bordered" id="dataCart" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody id="data_cart">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-bottom-success shadow h-100">
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="date_transaction"><b class="text-dark">Total</b></label>
          </div>
          <div class="col">
            <input type="number" value="13000" class="form-control bg-white text-dark" name="date_transaction" id="date_transaction" readonly>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="name_seller"><b class="text-success">Bayar</b></label>
          </div>
          <div class="col">
            <input type="number" class="form-control form-control-lg border-success text-success" name="name_seller" id="name_seller">
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-3">
          </div>
          <div class="col-md-9">
            <button id="btn_submit_buy" class="btn btn-block btn-success" style="height: 70px">Bayar</button>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-3">
          </div>
          <div class="col-md-9">
            <button id="btn_cancel_buy" class="btn btn-block btn-sm btn-danger">Batal</button>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="name_seller"><b class="text-warning">Kembalian</b></label>
          </div>
          <div class="col">
            <input type="number" class="form-control bg-white border-warning text-warning" name="name_seller" id="name_seller" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Area -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addItemModalLabel">Tambah Item</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-sm table-bordered" id="dataAddProduct" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Unit</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="data_category">
            </tbody>
          </table>
        </div>

        <div class="modal-footer">
          <!-- <button class="btn btn-secondary" id="btn_cancel" type="button" data-dismiss="modal">Batal</button>
          <button id="btn_add_unit" class="btn btn-success" name="add" type="button" data-dismiss="modal">Submit</button> -->
        </div>
      </div>
    </div>
  </div>
</div>