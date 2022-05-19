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
                  <form class="forms-sample" method="POST" action="<?= base_url('dashboard/user/update'); ?>">
                  <?= csrf_field() ?>
                    <input hidden type="number" name="id" class="form-control" id="exampleInputName1" value="<?= $data['id']; ?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Nama" value="<?= $data['nama']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Username</label>
                      <input type="text" name="username" class="form-control" id="exampleInputName1" placeholder="Username" value="<?= $data['username']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Nomor HP</label>
                      <input type="tel" name="nomor_hp" class="form-control" id="exampleInputName1" placeholder="Nomor HP" value="<?= $data['nomor_hp']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control" id="exampleSelectGender">
                          <option selected value="<?= $data['gender']; ?>"><?= $data['gender']; ?></option>
                          <option value="perempuan">Perempuan</option>
                          <option value="laki-laki">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Role</label>
                        <select name="role" class="form-control" id="exampleSelectGender">
                          <option value="<?= $data['role']; ?>"><?= $data['role']; ?></option>
                          <option value="siswa">Siswa</option>
                          <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button
                  </form>
                </div>
              </div>
            </div>

<?= $this->endSection() ?>