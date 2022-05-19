<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url('assets/images/logo.png') ;?>" alt="logo">
              </div>
              <h4>Daftar PPDB</h4>
              <h6 class="fw-light">Daftar PPDB Persikota FC</h6>
                  <?php if (!empty(session()->getFlashdata('error'))) : ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('error'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (!empty(session()->getFlashdata('success'))) : ?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('success'); ?>
                      </div>
                  <?php endif; ?>
              <form class="pt-3" method="POST" action="<?= base_url('register/proced'); ?>">
              <?= csrf_field() ?>
                <div class="form-group">
                  <input type="test" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" name="password_conf" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Konfirmasi Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
                </div>

                <div class="text-center mt-4 fw-light">
                  Sudah punya akun? <a href="<?= base_url('/') ;?>" class="text-primary">Masuk</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

<?= $this->endSection() ?>