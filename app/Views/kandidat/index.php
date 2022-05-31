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
                                <th>Gender</th>
                                <th>Nomor HP</th>
                                <th>Waktu Lahir</th>
                                <th>Foto Diri</th>
                                <th>Foto Akte</th>
                                <th>Riwayat Penyakit</th>
                                <th>Posisi Pemain</th>
                                <th>Status Pemain</th>
                                <th>Keterangan</th>
                                <th>Joined</th>
                                <th>Option</th>
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
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['nomor_hp']; ?></td>
                                <td><?php echo $row['ttl']; ?></td>
                                <td><?php echo $row['foto_diri']; ?></td>
                                <td><?php echo $row['foto_akte']; ?></td>
                                <td><?php echo $row['riwayat_penyakit']; ?></td>
                                <td><?php echo $row['posisi_pemain']; ?></td>
                                <td>
                                    <?php if($row['status'] === 'pending'): ?>
                                      <span class="badge bg-warning text-white"><?= $row['status'] ?></span>
                                    <?php elseif($row['status'] === 'diterima'): ?>
                                      <span class="badge bg-success text-white"><?= $row['status'] ?></span>
                                    <?php elseif($row['status'] === 'ditolak'): ?>
                                      <span class="badge bg-danger text-white"><?= $row['status'] ?></span>
                                    <?php endif ?>
                                </td>
                                <td><?php echo $row['note'] ?></td>
                                <td><?= $row['created_at']; ?></td>
                                <td>
                                    <a href="<?= base_url('dashboard/kandidat/edit/'.$row['id']); ?>" class="btn-sm btn-warning text-white"><i class="mdi mdi-eye"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                      </table>
                    <?= $pengguna->links('content', 'bootstrap_pagination'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>