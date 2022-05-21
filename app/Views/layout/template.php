<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PPDB Persikota FC</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/vendors/feather/feather.css') ;?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/mdi/css/materialdesignicons.min.css') ;?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/ti-icons/css/themify-icons.css') ;?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/typicons/typicons.css') ;?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/simple-line-icons/css/simple-line-icons.css') ;?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css') ;?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/css/vertical-layout-light/style.css') ;?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png') ;?>" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="<?= base_url('dashboard') ?>">
            <img src="<?= base_url('assets/images/logo.png') ;?>" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard') ?>">
            <img src="<?= base_url('assets/images/logo.png') ;?>" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Hi!, <span class="text-black fw-bold"><?= session()->get('username') ?></span></h1>
            <h3 class="welcome-sub-text">Selamat datang di System internal Persikota FC</h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if(session()->get('foto_diri') === NULL): ?>
                <img class="img-xs rounded-circle" src="<?= base_url('assets/images/default.png') ;?>" alt="Profile image"> </a>
              <?php elseif(session()->get('foto_diri')): ?>
                <img class="img-xs rounded-circle" src="<?= base_url('profile/'.session()->get('foto_diri')) ;?>" alt="Profile image"> </a>
              <?php endif ?>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
              <?php if(session()->get('foto_diri') === NULL): ?>
                <img class="img-xs rounded-circle" src="<?= base_url('assets/images/default.png') ;?>" alt="Profile image"> </a>
              <?php elseif(session()->get('foto_diri')): ?>
                <img class="img-xs rounded-circle" src="<?= base_url('profile/'.session()->get('foto_diri')) ;?>" alt="Profile image"> </a>
              <?php endif ?>
                <p class="mb-1 mt-3 font-weight-semibold"><?= session()->get('username') ?></p>
                <p class="fw-light text-muted mb-0"><?= session()->get('role') ?></p>
              </div>
              <a href="<?= base_url('dashboard/profile/saya/'.session()->get('id')) ?>" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
              <a href="<?= base_url('logout') ?>" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if(session()->get('role') === 'admin'): ?>
          <li class="nav-item nav-category">Data Master</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/user') ?>">
              <i class="menu-icon mdi mdi-account-multiple-outline"></i>
              <span class="menu-title">Master Users</span>
            </a>
            <a class="nav-link" href="<?= base_url('dashboard/post') ?>">
              <i class="menu-icon mdi mdi-blogger"></i>
              <span class="menu-title">Master Posts</span>
            </a>
          </li>
          <li class="nav-item nav-category">Work</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/kandidat') ?>">
              <i class="menu-icon mdi mdi-account-multiple-plus"></i>
              <span class="menu-title">Seleksi Kandidat</span>
            </a>
            <a class="nav-link" href="<?= base_url('dashboard/transaksi') ?>">
              <i class="menu-icon mdi mdi-cash-usd"></i>
              <span class="menu-title">Tagihan Pemain</span>
            </a>
          </li>
          <li class="nav-item nav-category">lainnya</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/strukturssb') ?>">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Struktur SSB</span>
            </a>
          </li>
          <?php elseif(session()->get('role') === 'siswa'): ?>
          <li class="nav-item nav-category">Menu</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/riwayatclub') ?>">
              <i class="menu-icon mdi mdi-account-multiple-outline"></i>
              <span class="menu-title">Riwayat Club</span>
            </a>
            <a class="nav-link" href="<?= base_url('dashboard/jadwal') ?>">
              <i class="menu-icon mdi mdi-timetable"></i>
              <span class="menu-title">Jadwal Latihan</span>
            </a>
            <a class="nav-link" href="<?= base_url('Dashboard/strukturSSBsiswa') ?>">
              <i class="menu-icon mdi mdi-account-network"></i>
              <span class="menu-title">Struktur SSB</span>
            </a>
            <a class="nav-link" href="<?= base_url('dashboard/tagihan/saya/'.session()->get('id')) ?>">
              <i class="menu-icon mdi mdi-clipboard-alert"></i>
              <span class="menu-title">Tagihan Anda</span>
            </a>
          </li>
          <?php elseif(session()->get('role') === 'unset'): ?>
          <li class="nav-item nav-category">Menu</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard/pendaftaran/id/'.session()->get('id')) ?>">
              <i class="menu-icon mdi mdi-account-multiple-outline"></i>
              <span class="menu-title">Pendaftaran</span>
            </a>
          </li>
          <?php endif ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <?= $this->renderSection('content') ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Made with ❤️ by PPDB Persikota FC </a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © <script>
                  document.write(new Date().getFullYear())
                </script>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ;?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ;?>"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/js/off-canvas.js') ;?>"></script>
  <script src="<?= base_url('assets/js/hoverable-collapse.js') ;?>"></script>
  <script src="<?= base_url('assets/js/template.js') ;?>"></script>
  <script src="<?= base_url('assets/js/settings.js') ;?>"></script>
  <script src="<?= base_url('assets/js/todolist.js') ;?>"></script>
  <script>
    $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
  var src = $(this).attr('src');
  var modal;

  function removeModal() {
    modal.remove();
    $('body').off('keyup.modal-close');
  }
  modal = $('<div>').css({
    background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
    backgroundSize: 'contain',
    width: '100%',
    height: '100%',
    position: 'fixed',
    zIndex: '10000',
    top: '0',
    left: '0',
    cursor: 'zoom-out'
  }).click(function() {
    removeModal();
  }).appendTo('body');
  //handling ESC
  $('body').on('keyup.modal-close', function(e) {
    if (e.key === 'Escape') {
      removeModal();
    }
  });
});
  </script>
  <!-- endinject -->
</body>

</html>
