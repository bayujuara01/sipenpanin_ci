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
      <form id="form-add" action="<?= site_url('user/add/new'); ?>" method="POST">
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
          <button type="submit" id="btn-submit-form" class="btn btn-success"><i class="fas fa-paper-plane fa-sm text-white-50"></i> Submit</button>
        </div>
        <script>

        </script>
      </form>
    </div>
  </div>
</div>