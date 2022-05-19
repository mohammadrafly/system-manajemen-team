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
                  <form class="forms-sample" method="POST" action="<?= base_url('dashboard/post/store'); ?>" enctype="multipart/form-data">
                  <?= csrf_field() ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Judul</label>
                      <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Judul">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Deskripsi</label>
                      <textarea name="content" class="form-control" id="exampleInputName1" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Gambar</label>
                        <div class="input-group mb-3">
                            <input name="pict" type="file" class="form-control" id="inputGroupFile02">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Kategori</label>
                        <select name="category" class="form-control" id="exampleSelectGender">
                          <option value="riwayat">Riwayat</option>
                          <option value="jadwal">Jadwal</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Waktu Latihan</label>
                      <input name="waktu" class="form-controll" type="text" id="datepicker">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button
                  </form>
                </div>
              </div>
            </div>

<?= $this->endSection() ?>