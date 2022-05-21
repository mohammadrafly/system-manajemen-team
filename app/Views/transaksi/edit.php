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
                  <form class="forms-sample" method="POST" action="<?= base_url('dashboard/transaksi/update'); ?>">
                  <?= csrf_field() ?>
                    <input name="id_transaksi" class="form-control" value="<?= $content['id_transaksi'] ?>" hidden>
                    <input name="id_transaksi" class="form-control" value="<?= $content['id_transaksi'] ?>" disabled>
                    <div class="form-group">
                      <label for="exampleInputName1">Tagihan</label>
                      <input name="tagihan" class="form-control" id="exampleInputName1" placeholder="Deskripsi" value="<?= $content['tagihan'] ?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Status Transaksi</label>
                        <select name="status_transaksi" class="form-control" id="exampleSelectGender">
                          <option selected value="<?= $content['status_transaksi'] ?>"><?= $content['status_transaksi'] ?></option>
                          <option value="UNPAID">UNPAID</option>
                          <option value="PAID">PAID</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button
                  </form>
                </div>
              </div>
            </div>

<?= $this->endSection() ?>