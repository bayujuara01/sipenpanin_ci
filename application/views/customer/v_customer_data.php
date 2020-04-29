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
      <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
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
        <tbody>
          <?php
          $index = 1;
          foreach ($customers as $customer) : ?>
            <tr>
              <td><?= $index++ ?></td>
              <td><?= $customer->nama_customer; ?></td>
              <td><?= $customer->alamat_customer; ?></td>
              <td><?= $customer->telp_customer; ?></td>
              <td class="text-table-hide"><?= $user->id_pengguna; ?></td>
              <td class="text-center">
                <a class="btn btn-primary btn-circle btn-sm mx-1"><i class="fas fa-info text-white"></i></a>
                <a href="<?= site_url('user/edit/' . $customer->id_customer); ?>" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
                <a data-toggle="modal" data-target="#delete<?= $customer->id_customer ?>" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Insert Modal -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCustomerModalLabel">Tambah Pelanggan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <!-- <a class="btn btn-primary" href="<?php echo site_url("customer/delete/" . $customer->id_customer); ?>">Konfirmasi</a> -->
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<?php foreach ($customers as $customer) : ?>
  <div class="modal fade" id="delete<?= $customer->id_customer ?>" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?php echo site_url("customer/delete/" . $customer->id_customer); ?>">Konfirmasi</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>