<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?= $pages; ?></h4>
                  <?php if (!empty(session()->getFlashdata('error'))) : ?>
                      <div class="alert alert-warning alert-dismissible fade show" status="alert">
                          <?php echo session()->getFlashdata('error'); ?>
                      </div>
                  <?php endif; ?>
                  <?php if (!empty(session()->getFlashdata('success'))) : ?>
                      <div class="alert alert-success alert-dismissible fade show" status="alert">
                          <?php echo session()->getFlashdata('success'); ?>
                      </div>
                  <?php endif; ?>
                  <form class="forms-sample" method="POST" action="<?= base_url('dashboard/kandidat/update'); ?>">
                  <?= csrf_field() ?>
                    <input hidden type="number" name="id" class="form-control" id="exampleInputName1" value="<?= $data['id']; ?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Nama" value="<?= $data['nama']; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <select name="gender" class="form-control" id="exampleSelectGender" disabled>
                          <option selected value="<?= $data['gender']; ?>"><?= $data['gender']; ?></option>
                          <option value="perempuan">Perempuan</option>
                          <option value="laki-laki">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Nomor HP</label>
                      <input type="tel" name="nomor_hp" class="form-control" id="exampleInputName1" value="<?= $data['nomor_hp']; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Waktu Lahir</label>
                      <input class="form-control" id="exampleInputName1" value="<?= $data['ttl']; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Foto Diri</label>
                      <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('profile/'.$data['foto_diri']) ?>" style="width:100%;max-width:300px">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Foto Akte</label>
                      <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('profile/'.$data['foto_akte']) ?>" style="width:100%;max-width:300px">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Riwayat Penyakit</label>
                      <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('profile/'.$data['riwayat_penyakit']) ?>" style="width:100%;max-width:300px">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Posisi Pemain</label>
                      <input class="form-control" id="exampleInputName1" value="<?= $data['posisi_pemain']; ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Role (ganti role ke siswa jika diterima)</label>
                        <select name="role" class="form-control" id="exampleSelectGender">
                          <option value="<?= $data['role']; ?>"><?= $data['role']; ?></option>
                          <option value="unset">Unset</option>
                          <option value="siswa">Siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Status Pemain</label>
                        <select name="status" class="form-control" id="exampleSelectGender">
                          <option value="<?= $data['status']; ?>"><?= $data['status']; ?></option>
                          <option value="diterima">Diterima</option>
                          <option value="ditolak">Ditolak</option>
                          <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Keterangan</label>
                      <textarea name="note" class="form-control" id="exampleInputName1" placeholder="Keterangan" value="<?= $data['note']; ?>"><?= $data['note']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button
                  </form>
                </div>
              </div>
            </div>

<?= $this->endSection() ?>