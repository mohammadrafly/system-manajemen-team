<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/logo.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo.png'); ?>">
  <title>
    PPDB Sepak Bola
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js'); ?>" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/soft-ui-dashboard.css?v=1.0.5'); ?>" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
        <?= $this->renderSection('content') ?>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> PPDB Sepak Bola.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/popper.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js'); ?>"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/soft-ui-dashboard.min.js?v=1.0.5'); ?>"></script>
</body>

</html>