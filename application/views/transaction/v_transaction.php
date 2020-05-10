<div class="row">
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100">
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="date_transaction">Tanggal</label>
          </div>
          <div class="col">
            <input type="text" class="form-control" name="date_transaction" id="date_transaction">
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-3 mt-1">
            <label for="name_seller">Nama</label>
          </div>
          <div class="col">
            <input type="text" class="form-control" name="name_seller" id="name_seller" value="<?= $this->authentication->userLogin()->nama_pengguna; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mt-1">
            <label for="customer_transaction">Pelanggan</label>
          </div>
          <div class="col">
            <select class="form-control" name="customer_transaction" id="customer_transaction">
              <option value="1">Umum</option>
              <option value="2">Admin</option>
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
              <input type="text" class="form-control" placeholder="Kode" aria-label="Kode" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search fa-sm"></i></button>
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
            <button class="btn btn-block btn-primary">Add</button>
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
          <h5><b>SM2002090002</h5>
          <h1 class="text-dark"><sup>Rp. </sup><b>13000</b></h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-8 col-md-7">
    <div class="card border-left-primary shadow h-100">
      <div class="card-body">

      </div>
    </div>
  </div>
</div>