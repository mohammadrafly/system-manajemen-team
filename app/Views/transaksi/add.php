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
                  <form class="forms-sample" method="POST" action="<?= base_url('dashboard/transaksi/store'); ?>">
                  <?= csrf_field() ?>
                    <div class="form-group">
                      <label for="exampleSelectGender">Pilih User</label>
                        <select name="id_user" class="form-control" id="exampleSelectGender">
                          <option value=""></option>
                          <?php foreach($content as $row): ?>
                          <option value="<?= $row['id'] ;?>"><?= $row['id'] ;?> -> <?= $row['nama'] ;?> </option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Tagihan</label>
                      <input name="tagihan" class="form-control" id="exampleInputName1" placeholder="Tagihan">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button
                  </form>
                </div>
              </div>
            </div>

<?= $this->endSection() ?>