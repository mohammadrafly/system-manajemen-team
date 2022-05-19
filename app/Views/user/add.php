<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $pages; ?></h4>
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
                  <form class="forms-sample" method="POST" action="<?= base_url('dashboard/user/store'); ?>">
                  <?= csrf_field() ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Nama">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" name="username" class="form-control" id="exampleInputName1" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Konfirmasi Password</label>
                      <input type="password" name="password_conf" class="form-control" id="exampleInputPassword4" placeholder="Konfirmasi Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Nomor HP</label>
                      <input type="tel" name="nomor_hp" class="form-control" id="exampleInputName1" placeholder="Nomor HP">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control" id="exampleSelectGender">
                          <option value="laki-laki">Laki-Laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Role</label>
                        <select name="role" class="form-control" id="exampleSelectGender">
                          <option value="admin">Admin</option>
                          <option value="siswa">siswa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button
                  </form>
                </div>
              </div>
            </div>

<?= $this->endSection() ?>