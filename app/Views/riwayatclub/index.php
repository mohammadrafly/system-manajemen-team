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
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($content): ?>
                            <?php 
                            $no = 1;
                            foreach($content as $row): ?>
                            <tr>
                                <?php if($row['category'] === 'riwayat'): ?>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['content']; ?></td>
                                    <td>
                                        <img data-enlargeable width="100" style="cursor: zoom-in" src="<?= base_url('post/'.$row['pict']) ?>">
                                    </td>
                                <?php elseif($row['category'] === 'jadwal'): ?>
                                <?php endif ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                      </table>
                    <?= $post->links('content', 'bootstrap_pagination'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>