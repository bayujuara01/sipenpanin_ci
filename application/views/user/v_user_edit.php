<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Keanggotaan</h1>
  <a href="<?= site_url('user'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-undo fa-sm text-white-50"></i> Kembali</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Pembaharuan Informasi Anggota</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 py-5 bg-primary text-white text-center ">
        <div class=" ">
          <div class="card-body">
            <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
            <h2 class="py-3">Someone <?= $user->id_pengguna ?></h2>
            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.

            </p>
          </div>
        </div>
      </div>
      <div class="col-md-8 py-5 border">
        <form id="form-add" action="<?= site_url('user/edit/' . $user->id_pengguna); ?>" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">No. Anggota</span>
                </div>
                <label for=no_user></label>
                <input type="text" value="<?= $user->no_pengguna ?>" class="form-control bg-light" name="no_user" id="no_user" readonly>
                <input type="hidden" name="id_user" value="<?= $user->id_pengguna ?>">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=fullname>Nama Lengkap*</label>
              <input type="text" class="form-control <?= form_error('fullname') ? "is-invalid" : ""; ?>" value="<?= set_value('fullname') ? set_value('fullname') : $user->nama_pengguna; ?>" name="fullname" id="fullname">
              <?= form_error('fullname', "<div class =\"invalid-feedback\">*", "</div>"); ?>

            </div>
            <div class="form-group col-md-6">
              <label for=username>Username*</label>
              <input type="text" class="form-control" value="<?= set_value('username') ? set_value('username') : $user->user_pengguna; ?>" name="username" id="username">
              <?= form_error('username', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=birth_date>Tanggal Lahir*</label>
              <input type="date" class="form-control" value="<?= set_value('birth_date') ? set_value('birth_date') : $user->tgl_lahir ?>" name="birth_date" id="birth_date">
              <?= form_error('birth_date', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
            <div class="form-group col-md-6">
              <label for=password>Password*</label><small class-text-gray-300> (Biarkan kosong jika tidak diganti)</small>
              <input type="password" class="form-control" name="password" id="password">
              <?= form_error('password', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=sex_user>Jenis Kelamin*</label>
              <select class="form-control" name="sex_user" id="sex_user">
                <option value="1" <?php
                                  if (set_value('sex_user')) {
                                    if (set_value('sex_user') == 1) {
                                      echo "selected";
                                    }
                                  } else {
                                    if ($user->jk_pengguna == 'laki-laki') {
                                      echo "selected";
                                    }
                                  }
                                  ?>>Laki-laki</option>
                <option value="2" <?php
                                  if (set_value('sex_user')) {
                                    if (set_value('sex_user') == 2) {
                                      echo "selected";
                                    }
                                  } else {
                                    if ($user->jk_pengguna == 'perempuan') {
                                      echo "selected";
                                    }
                                  }
                                  ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for=password_confirm>Konfirmasi Password</label><small class-text-gray-300> (Biarkan kosong jika tidak diganti)</small>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm">
              <?= form_error('password_confirm', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="birth_place_group">Tempat Lahir*</label>
              <div class="input-group" id="birth_place_group">
                <?php $birth_place = explode(", ", $user->tmp_lahir); ?>
                <input type="text" class="form-control" name="birth_city" value="<?= set_value('birth_city') ? set_value('birth_city') : $birth_place[0]  ?>" id="birth_city" placeholder="Kabupaten/Kota">
                <input type="text" class="form-control" name="birth_province" value="<?= set_value('birth_province') ? set_value('birth_province') : $birth_place[1] ?>" id="birth_province" placeholder="Provinsi">
              </div>
              <?= form_error('birth_city', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
            <div class="form-group col-md-6">
              <label for=role_user>Jenis Akun*</label>
              <select class="form-control" name="role_user" id="role_user">
                <option value="1" <?= set_value('role_user') == 1 ? "selected" : $user->role_id == 1 ? "selected" : null ?>>Admin</option>
                <option value="2" <?= set_value('role_user') == 2 ? "selected" : $user->role_id == 2 ? "selected" : null ?>>Bagian Penjualan</option>
                <option value="3" <?= set_value('role_user') == 3 ? "selected" : $user->role_id == 3 ? "selected" : null ?>>Anggota</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=no_telp>No. Telepon*</label>
              <input type="number" value="<?= set_value('no_telp') ? set_value('no_telp') : $user->no_tlp ?>" class="form-control" name="no_telp" id="no_telp">
              <?= form_error('no_telp', "<small class=\"form-text text-danger\">*", "</small>") ?>

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="address_user">Alamat</label>
              <textarea id="address_user" name="address_user" cols="40" rows="4" class="form-control"><?= $user->alamat_pengguna; ?></textarea>
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
  </div>
</div>