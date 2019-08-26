
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Mozart')); ?> | Master</title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(URL::to('bootstrap/dist/css/bootstrap.min.css')); ?>" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet"  type="text/css">

  <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
</head>
<style>
  .icon-colored{
    width: 30px;
  }
  .password-salah,
    .password_tidak_sama,
    .password_sama{
        display: none;
    }
    #accordionSidebar{
      background-image:linear-gradient(180deg,#56bb7a 10%,#1ea26e 100%)
      }
</style>
<?php echo $__env->yieldContent('scriptcss'); ?>
<body id="page-top">

    <?php if(Session::has("belum_verifikasi")): ?>
    <div class="alert alert-danger alert-dismissible fade show mb-0 text-center alert-konfirmasi" role="alert">
        <strong>E-mail belum dikonfirmasi!</strong> Anda Harus Segera Mengkonfirmasi Alamat Email.
        <a href="javascript:void(0)" class="font-weight-bold text-danger btn-kirim-email">Kirim ulang</a> E-mail Konfirmasi.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> <?php echo csrf_field(); ?>
        <input type="hidden" name="email_mentor" value="<?php echo e(Auth::guard('master')->user()->email); ?>">
    </div>
  <?php endif; ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Mozart <sup>E-learning</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
      <a class="nav-link" href="<?php echo e(route('master.dashboard')); ?>">
          <img src="https://img.icons8.com/color/48/000000/home.png" class="icon-colored">
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pengaturan
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/master/mentor">

          <img src="https://img.icons8.com/color/48/000000/school-director.png" class="icon-colored">
          <span>Mentor</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/master/student">
          <img src="https://img.icons8.com/color/48/000000/student-male.png" class="icon-colored">
          <span>Student</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/master/mapel">
          <img src="https://img.icons8.com/officel/40/000000/courses.png" class="icon-colored">
          <span>Mapel</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/master/materi">
          <img src="https://img.icons8.com/color/48/000000/e-learning.png" class="icon-colored">
          <span>Materi</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="/master/soal">
          <img src="https://img.icons8.com/color/48/000000/multiple-choice.png" class="icon-colored">
          <span>Soal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::guard('master')->user()->username); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo e(url('/images/user/admin.jpg')); ?>">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href=".modal-ganti-password" data-toggle="modal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ubah password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <?php echo $__env->yieldContent('main-content'); ?>

      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mozart 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Siap untuk pergi ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" dibawah jika anda ingin mengakhiri sesi ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="javascript::void()" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a>
          <form id="logout" action="<?php echo e(route('master.logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
          </form>
        </div>
      </div>
    </div>
  </div>


  

<div class="modal fade  modal-ganti-password" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col text-center">
                    <h4>Ganti Password</h4>
                </div>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="card">
                <div class="card-body">

                <div class="form-group row">
                    <label for="oldPassword" class="col-md-12 col-form-label text-left"><?php echo e(__('Password lama')); ?></label>

                    <span class="password-salah w-100 text-danger text-center">Password yang anda masukkan saat ini salah</span>
                    <div class="col-md-12">
                        <input id="current_password" type="password" class="form-control" name="current_password" required autofocus>

                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label text-left"><?php echo e(__('Password baru')); ?></label>

                    <span class=" w-100 text-danger text-center password_sama text-center">Password baru anda tidak boleh sama dengan password lama anda!</span>
                    <span class=" password_tidak_sama w-100 text-danger password_tidak_sama text-center">Password baru anda tidak sama dengan password Konfirmasi!</span>
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password_baru" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-12 col-form-label text-left"><?php echo e(__('Konfirmasi password baru')); ?></label>

                    <div class="col-md-12">
                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-12">
                        <button type="button" class="btn btn-info btn-ganti-password">
                                    <?php echo e(__('Ganti Password')); ?>

                                </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

  <!-- Core plugin JavaScript-->
  

  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>
<script>

$(".btn-ganti-password").click(function() {

$(".current_password").hide();
$(".password_sama").hide()
$(".password_tidak_sama").hide();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    type: "post",
    url: "<?php echo e(url('/master/password/change')); ?>",
    data: {
        current_password: $("[name='current_password']").val(),
        password_baru: $("[name='password_baru']").val(),
        password_confirmation: $("[name='password_confirmation']").val()
    },
    success: function(hasil) {
        // console.log(hasil.stat/sus_password);
        if(hasil.status_password == "salah"){
            $(".password-salah").show();
            $(".password_tidak_sama").hide();
            $(".password_sama").hide();
        }else if(hasil.status_password == "konfirmasi_tidak_sama"){
            $(".password_tidak_sama").show();
            $(".password-salah").hide();
            $(".password_sama").hide();
        }else if(hasil.status_password == "password_sama_dengan_lama"){
            $(".password_sama").show();
            $(".password_tidak_sama").hide();
            $(".password-salah").hide();
        }else if(hasil.status_password == "berhasil"){
            Swal.fire(
                'Berhasil!',
                'Berhasil ubah password!',
                'success'
            )
            location.reload();
        }else if(hasil.status_password == "kosong"){
          Swal.fire(
                'Gagal!',
                'Harap isi bidang yang kosong!',
                'error'
            )
        }
    }
});
});

</script>


  <?php echo $__env->yieldContent('scriptjs'); ?>
</body>
</html>






<?php /**PATH D:\mozart-elearning\resources\views/master/layouts/app.blade.php ENDPATH**/ ?>