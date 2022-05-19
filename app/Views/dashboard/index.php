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
                <?php if (session()->get('role') === 'admin'): ?>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
            
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                              <div class="card-body">
                                <div class="col-sm-8">
                                  <h3 class="text-white upgrade-info mb-0">
                                    Menuju tak terbatas <span class="fw-bold">&</span> melampauinya
                                  </h3>
                                  <a href="#" class="btn btn-info upgrade-btn">Jadilah seorang pro player bola!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div> 
                  </div>
                </div>
                <?php elseif(session()->get('role') === 'siswa'): ?>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                              <div class="card-body">
                                <div class="col-sm-8">
                                  <h3 class="text-white upgrade-info mb-0">
                                    Menuju tak terbatas <span class="fw-bold">&</span> melampauinya
                                  </h3>
                                  <a href="#" class="btn btn-info upgrade-btn">Jadilah seorang pro player bola!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                <?php elseif(session()->get('role') === 'unset'): ?>
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                              <div class="card-body">
                                <div class="col-sm-8">
                                  <h3 class="text-white upgrade-info mb-0">
                                    Menuju tak terbatas <span class="fw-bold">&</span> melampauinya
                                  </h3>
                                  <a href="#" class="btn btn-info upgrade-btn">Jadilah seorang pro player bola!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                <?php endif ?>
              </div>
            </div>
          </div>

<?= $this->endSection() ?>