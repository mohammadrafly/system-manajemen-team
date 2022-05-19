<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $pages ?></h4>
                  <form class="form-sample" method="POST" action="<?= base_url('dashboard/profile/saya/update'); ?>" enctype="multipart/form-data">
                  <?= csrf_field() ?>
                    <p class="card-description">
                      Personal info 
                    </p>
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
                    <input class="form-control" placeholder="ID" name="id" value="<?= $content['id'] ?>" hidden/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" value="<?= $content['nama'] ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input class="form-control" name="username" placeholder="Username" value="<?= $content['username'] ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select name="gender" class="form-control">
                              <option selected value="<?= $content['gender'] ?>"><?= $content['gender'] ?></option>
                              <option value="laki-laki">Laki-laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Role</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="Role" name="role" value="<?= $content['role'] ?>" disabled/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor HP</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="Nomor HP" name="nomor_hp" value="<?= $content['nomor_hp'] ?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto Diri</label>
                          <div class="col-sm-9">
                          <?php if(session()->get('foto_diri') === NULL): ?>
                            <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('assets/images/default.png') ;?>" width="100px">
                          <?php elseif(session()->get('foto_diri')): ?>
                            <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('profile/'.$content['foto_diri']) ?>" width="100px">
                          <?php endif ?>
                            <input class="form-control" type="file" name="foto_diri" value="<?= $content['foto_diri'] ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>

<?= $this->endSection() ?>