<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
  <h1 class="h3 mb-4 text-gray-800">Keanggotaan</h1>
  <a href="<?= site_url('user'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-undo fa-sm text-white-50"></i> Kembali</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
  </div>
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
        <form id="form-add" action="<?= site_url('user/add/new'); ?>" enctype="multipart/form-data" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">No. Anggota</span>
                </div>
                <label for=no_user></label>
                <input type="text" value="<?php echo (string) (round(microtime(true) * 100)); ?>" class="form-control bg-light" name="no_user" id="no_user" readonly>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=fullname>Nama Lengkap*</label>
              <input type="text" class="form-control <?= form_error('fullname') ? "is-invalid" : ""; ?>" value="<?= set_value('fullname') ?>" name="fullname" id="fullname">
              <?= form_error('fullname', "<div class =\"invalid-feedback\">*", "</div>"); ?>

            </div>
            <div class="form-group col-md-6">
              <label for=username>Username*</label>
              <input type="text" class="form-control" value="<?= set_value('username') ?>" name="username" id="username">
              <?= form_error('username', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=birth_date>Tanggal Lahir*</label>
              <input type="date" class="form-control" value="<?= set_value('birth_date') ?>" name="birth_date" id="birth_date">
              <?= form_error('birth_date', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
            <div class="form-group col-md-6">
              <label for=password>Password*</label>
              <input type="password" class="form-control" name="password" id="password">
              <?= form_error('password', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=sex_user>Jenis Kelamin*</label>
              <select class="form-control" name="sex_user" id="sex_user">
                <option value="1" <?= set_value('sex_user') == 1 ? "selected" : null ?>>Laki-laki</option>
                <option value="2" <?= set_value('sex_user') == 2 ? "selected" : null ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for=password_confirm>Konfirmasi Password</label>
              <input type="password" class="form-control" name="password_confirm" id="password_confirm">
              <?= form_error('password_confirm', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="birth_place_group">Tempat Lahir*</label>
              <div class="input-group" id="birth_place_group">
                <input type="text" class="form-control" name="birth_province" value="<?= set_value('birth_province') ?>" id="birth_province" placeholder="Provinsi">
                <input type="text" class="form-control" name="birth_city" value="<?= set_value('birth_city') ?>" id="birth_city" placeholder="Kabupaten/Kota">
              </div>
              <?= form_error('birth_city', "<small class=\"form-text text-danger\">*", "</small>") ?>
            </div>
            <div class="form-group col-md-6">
              <label for=role_user>Jenis Akun*</label>
              <select class="form-control" name="role_user" id="role_user">
                <option value="1" <?= set_value('role_user') == 1 ? "selected" : null ?>>Admin</option>
                <option value="2" <?= set_value('role_user') == 2 ? "selected" : null ?>>Bagian Penjualan</option>
                <option value="3" <?= set_value('role_user') == 3 ? "selected" : null ?>>Anggota</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for=no_telp>No. Telepon*</label>
              <input type="number" value="<?= set_value('no_telp') ?>" class="form-control" name="no_telp" id="no_telp">
              <?= form_error('no_telp', "<div class=\"invalid-feedback\">*", "</div>") ?>

            </div>
            <div class="form-group col-md-6">
              <label for="customFile">Foto Profil</label>
              <div id="customFile" class="custom-file">
                <input type="file" class="form-control" name="profile_user" id="profile_user">
                <!-- <label class="custom-file-label" for="profile_user">Choose file...</label> -->
              </div>

            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="address_user">Alamat</label>
              <textarea id="address_user" name="address_user" cols="40" rows="4" class="form-control"></textarea>
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