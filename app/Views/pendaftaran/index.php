<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $pages ?></h4>
                  <form class="form-sample" method="POST" action="<?= base_url('dashboard/pendaftaran/kirim'); ?>" enctype="multipart/form-data">
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
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Posisi Pemain</label>
                          <div class="col-sm-9">
                            <select name="posisi_pemain" class="form-control">
                              <option selected value="<?= $content['posisi_pemain'] ?>"><?= $content['posisi_pemain'] ?></option>
                              <option value="Goalkeeper">Goalkeeper</option>
                              <option value="Back">Back</option>
                              <option value="Midfielder">Midfielder</option>
                              <option value="Forward">Forward</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Riwayat Penyakit</label>
                          <div class="col-sm-9">
                          <?php if(session()->get('riwayat_penyakit') === NULL): ?>
                            <img src="<?= base_url('assets/images/default.png') ;?>" width="100px">
                          <?php elseif(session()->get('riwayat_penyakit')): ?>
                            <img src="<?= base_url('profile/'.$content['riwayat_penyakit']) ?>" width="100px">
                          <?php endif ?>
                            <input class="form-control" type="file" name="riwayat_penyakit" value="<?= $content['riwayat_penyakit'] ?>"/>
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
                            <img src="<?= base_url('assets/images/default.png') ;?>" width="100px">
                          <?php elseif(session()->get('foto_diri')): ?>
                            <img src="<?= base_url('profile/'.$content['foto_diri']) ?>" width="100px">
                          <?php endif ?>
                            <input class="form-control" type="file" name="foto_diri" value="<?= $content['foto_diri'] ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">TTL</label>
                          <div class="col-sm-9">
                            <input name="ttl" class="form-controll" type="text" id="datepicker" value="<?= $content['ttl'] ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Foto Akte</label>
                          <div class="col-sm-9">
                          <?php if(session()->get('foto_akte') === NULL): ?>
                            <img src="<?= base_url('assets/images/default.png') ;?>" width="100px">
                          <?php elseif(session()->get('foto_akte')): ?>
                            <img src="<?= base_url('profile/'.$content['foto_akte']) ?>" width="100px">
                          <?php endif ?>
                            <input class="form-control" type="file" name="foto_akte" value="<?= $content['foto_akte'] ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-9">
                                    <?php if($content['status'] === 'pending'): ?>
                                      <span class="badge bg-warning text-white"><?= $content['status'] ?></span>
                                    <?php elseif($content['status'] === 'diterima'): ?>
                                      <span class="badge bg-success text-white"><?= $content['status'] ?></span>
                                    <?php elseif($content['status'] === 'ditolak'): ?>
                                      <span class="badge bg-danger text-white"><?= $content['status'] ?></span>
                                    <?php endif ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                            <input type="text" name="note" class="form-control" value="<?= $content['note'] ?>" disabled/>
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