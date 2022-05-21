<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0"><?= $pages ?></a>
                    </li>
                  </ul>
                </div>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div>
                            <?php 
                            foreach($content as $row): ?>
                                <img data-enlargeable width="1000" style="cursor: zoom-in" src="<?= base_url('post/'.$row->picture) ?>" >
                            <?php endforeach; ?>
                            </div>
                          </div>
                        </div>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>