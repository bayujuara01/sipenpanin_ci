<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Keanggotaan</h1>
  <a href="<?= site_url('user/add'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Tambah Anggota</a>
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
            <th>No. Anggota</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>No. Telepon</th>
            <th class="text-table-hide"></th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No. Anggota</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>No. Telepon</th>
            <th class="text-table-hide"></th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?= $user->no_pengguna; ?></td>
              <td><?= $user->nama_pengguna; ?></td>
              <td><?= $user->tmp_lahir; ?></td>
              <td><?= $user->no_tlp; ?></td>
              <td class="text-table-hide"><?= $user->id_pengguna; ?></td>
              <td class="text-center">
                <a class="btn btn-primary btn-circle btn-sm mx-1"><i class="fas fa-info text-white"></i></a>
                <a href="<?= site_url('user/edit/' . $user->id_pengguna); ?>" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit text-white"></i></a>
                <a data-toggle="modal" data-target="#delete<?= $user->id_pengguna ?>" class="btn btn-danger btn-circle btn-sm mx-1"><i class="fas fa-trash text-white"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php echo ($this->session->flashdata('user_not_found')) ? $this->session->flashdata('user_not_found') : null; ?>

<!-- Delete Modal-->
<?php foreach ($users as $user) : ?>
  <?php if (count($users) <= 1) { ?>
    <div class="modal fade" id="delete<?= $user->id_pengguna ?>" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteUserModalLabel">Pengguna terakhir tidak dapat terhapus</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><?= $user->nama_pengguna ?> merupakan pengguna terakhir, sehingga tidak dapat dihapus.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Mengerti</button>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="modal fade" id="delete<?= $user->id_pengguna ?>" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="<?php echo site_url("user/delete/" . $user->id_pengguna); ?>">Konfirmasi</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?php endforeach; ?>