<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-bs-toggle="tab" role="tab" aria-controls="overview" aria-selected="true"><?= $pages; ?></a>
                    </li>
                    <li class="nav-item">
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
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="<?= base_url('dashboard/transaksi/add'); ?>" class="btn btn-otline-dark align-items-center"><i class="icon-plus"></i> Add transaksi</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>Status Transaksi</th>
                                <th>Dibuat Pada</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($content): ?>
                            <?php 
                            $no = 1;
                            foreach($content as $row): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo number_to_currency($row['tagihan'], 'IDR'); ?></td>
                                <td>
                                    <?php if($row['status_transaksi'] === 'BELUM BAYAR'): ?>
                                      <span class="badge bg-danger text-white"><?= $row['status_transaksi'] ?></span>
                                    <?php elseif($row['status_transaksi'] === 'SUDAH BAYAR'): ?>
                                      <span class="badge bg-success text-white"><?= $row['status_transaksi'] ?></span>
                                    <?php endif ?>
                                </td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="<?= base_url('dashboard/transaksi/edit/'.$row['id_transaksi']); ?>" class="btn-sm btn-warning text-white"><i class="mdi mdi-table-edit"></i></a>
                                    <a href="<?= base_url('dashboard/transaksi/delete/'.$row['id_transaksi']); ?>" class="btn-sm btn-danger text-white"><i class="mdi mdi-delete-forever"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                      </table>
                    <?= $pager->links('content', 'bootstrap_pagination'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>