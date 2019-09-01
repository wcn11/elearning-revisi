 <?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h3 mb-2 text-gray-800">Daftar Mata Pelajaran Mentor</p>
    <p class="mb-4">Pilih mata pelajaran utuk dapat mulai belajar</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Mentor</h6>
        </div>
        <div class="card-body">

            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-10-tab" data-toggle="pill" href="#pills-10" role="tab"
                        aria-controls="pills-10" aria-selected="true">Kelas 10</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-11-tab" data-toggle="pill" href="#pills-11" role="tab"
                        aria-controls="pills-11" aria-selected="false">Kelas 11</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-12-tab" data-toggle="pill" href="#pills-12" role="tab"
                        aria-controls="pills-12" aria-selected="false">Kelas 12</a>
                </li>
            </ul>

            <hr>

            <div class="tab-content" id="pills-tabContent">

                
                <div class="tab-pane fade show active" id="pills-10" role="tabpanel" aria-labelledby="pills-10-tab">

                    <div class="row">

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Status Kelas</th>
                                    <th scope="col">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody class="data-mapel">
                                <?php $__currentLoopData = $mp10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m10_key => $m10): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><?php echo e($m10_key + 1); ?></td>
                                    <td><?php echo e($m10->mp_ke_mapel->nama_pelajaran); ?></td>
                                    <td>
                                        <?php if($m10->mp_ke_ms->count() >= $m10->kuota): ?>
                                        <span class="badge badge-danger">KELAS PENUH</span>
                                        <?php else: ?>
                                        <span class="badge badge-success">KELAS TERSEDIA</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($m10->mp_ke_ms->count() >= $m10->kuota): ?>
                                        <?php if(in_array($m10->kode_mentor_pelajaran, $ms_array)): ?>
                                        <button class="btn btn-danger btn-sm btn-tinggalkan"
                                            data-kmp="<?php echo e($m10->kode_mentor_pelajaran); ?>"><i
                                                class="fas fa-sign-out-alt"></i>
                                            Tinggalkan
                                            Kelas</button>
                                        <?php else: ?>
                                        <span class="badge badge-danger">KELAS PENUH</span>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <?php if(in_array($m10->kode_mentor_pelajaran, $ms_array)): ?>
                                        <button class="btn btn-danger btn-sm btn-tinggalkan"
                                            data-kmp="<?php echo e($m10->kode_mentor_pelajaran); ?>"><i
                                                class="fas fa-sign-out-alt"></i>
                                            Tinggalkan
                                            Kelas</button>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('student.ambil_kelas', [$m10->id_mentor, $m10->kode_mentor_pelajaran])); ?>"
                                            class="btn btn-success btn-sm"><i class="fas fa-door-open"></i>
                                            Ambil
                                            Kelas</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <form class="kelas-<?php echo e($m10->kode_mentor_pelajaran); ?>"
                                        action="<?php echo e(route('student.unfollow', $m10->kode_mentor_pelajaran)); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>

                </div>
                

                
                <div class="tab-pane fade" id="pills-11" role="tabpanel" aria-labelledby="pills-11-tab">

                    <div class="row">

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Status Kelas</th>
                                    <th scope="col">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody class="data-mapel">
                                <?php $__currentLoopData = $mp11; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m11_key => $m11): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($m11_key + 1); ?></td>
                                    <td><?php echo e($m11->mp_ke_mapel->nama_pelajaran); ?></td>
                                    <td>
                                        <?php if($m11->mp_ke_ms->count() >= $m11->kuota): ?>
                                        <span class="badge badge-danger">KELAS PENUH</span>
                                        <?php else: ?>
                                        <span class="badge badge-success">KELAS TERSEDIA</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($m11->mp_ke_ms->count() >= $m11->kuota): ?>
                                        <?php if(in_array($m11->kode_mentor_pelajaran, $ms_array)): ?>
                                        <button class="btn btn-danger btn-sm btn-tinggalkan"
                                            data-kmp="<?php echo e($m11->kode_mentor_pelajaran); ?>"><i
                                                class="fas fa-sign-out-alt"></i>
                                            Tinggalkan
                                            Kelas</button>
                                        <?php else: ?>
                                        <span class="badge badge-danger">KELAS PENUH</span>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <?php if(in_array($m11->kode_mentor_pelajaran, $ms_array)): ?>
                                        <button class="btn btn-danger btn-sm btn-tinggalkan"
                                            data-kmp="<?php echo e($m11->kode_mentor_pelajaran); ?>"><i
                                                class="fas fa-sign-out-alt"></i>
                                            Tinggalkan
                                            Kelas</button>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('student.ambil_kelas', [$m11->id_mentor, $m11->kode_mentor_pelajaran])); ?>"
                                            class="btn btn-success btn-sm"><i class="fas fa-door-open"></i>
                                            Ambil
                                            Kelas</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <form class="kelas-<?php echo e($m11->kode_mentor_pelajaran); ?>"
                                        action="<?php echo e(route('student.unfollow', $m11->kode_mentor_pelajaran)); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>

                </div>
                

                
                <div class="tab-pane fade" id="pills-12" role="tabpanel" aria-labelledby="pills-12-tab">

                    <div class="row">

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Status Kelas</th>
                                    <th scope="col">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody class="data-mapel">
                                <?php $__currentLoopData = $mp12; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m12_key => $m12): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($m12_key + 1); ?></td>
                                    <td><?php echo e($m12->mp_ke_mapel->nama_pelajaran); ?></td>
                                    <td>
                                        <?php if($m12->mp_ke_ms->count() >= $m12->kuota): ?>
                                        <span class="badge badge-danger">KELAS PENUH</span>
                                        <?php else: ?>
                                        <span class="badge badge-success">KELAS TERSEDIA</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($m12->mp_ke_ms->count() >= $m12->kuota): ?>
                                        <?php if(in_array($m12->kode_mentor_pelajaran, $ms_array)): ?>
                                        <button class="btn btn-danger btn-sm btn-tinggalkan"
                                            data-kmp="<?php echo e($m12->kode_mentor_pelajaran); ?>"><i
                                                class="fas fa-sign-out-alt"></i>
                                            Tinggalkan
                                            Kelas</button>
                                        <?php else: ?>
                                        <span class="badge badge-danger">KELAS PENUH</span>
                                        <?php endif; ?>
                                        <?php else: ?>
                                        <?php if(in_array($m12->kode_mentor_pelajaran, $ms_array)): ?>
                                        <button class="btn btn-danger btn-sm btn-tinggalkan"
                                            data-kmp="<?php echo e($m12->kode_mentor_pelajaran); ?>"><i
                                                class="fas fa-sign-out-alt"></i>
                                            Tinggalkan
                                            Kelas</button>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('student.ambil_kelas', [$m12->id_mentor, $m12->kode_mentor_pelajaran])); ?>"
                                            class="btn btn-success btn-sm"><i class="fas fa-door-open"></i>
                                            Ambil
                                            Kelas</a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <form class="kelas-<?php echo e($m12->kode_mentor_pelajaran); ?>"
                                        action="<?php echo e(route('student.unfollow', $m12->kode_mentor_pelajaran)); ?>"
                                        method="post">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>

                </div>
                

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>
<style>
    .profil {
        min-height: 150%;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>


<script>
    $(document).ready(function(){

        $(document).on("click", ".btn-tinggalkan", function(){
            var kmp = $(this).attr("data-kmp");

            Swal.fire({
        title: 'Peringatan',
        type: "warning",
        text: "Meninggalkan Kelas Ini, seluruh data mengenai Pelajaran Pada Kelas Ini Akan Terhapus Seutuhnya!",
        showConfirmButton: true,
        confirmButtonText: "Keluar Kelas",
        confirmButtonColor: "red",
        showCancelButton: true,
        cancelButtonText: "Tetap Dikelas",
        animation: false,
        customClass: {
            popup: 'animated shake'
        }
    }).then((result) => {
        if(result.value){
            $(".kelas-" + kmp).submit();
        }
    });
        });

    });
</script>

<?php if(Session::has("tambah_kelas")): ?>
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "success",
        text: "Anda berhasil mengambil kelas!",
        animation: false,
        customClass: {
            popup: 'animated tada'
        }
    });
</script>
<?php endif; ?>

<?php if(Session::has("berhasil_unfollow")): ?>
<script>
    Swal.fire({
        title: 'Berhasil',
        type: "info",
        text: "Anda telah keluar kelas",
        animation: false,
        customClass: {
            popup: 'animated shake'
        }
    });
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wahyu/Desktop/mozart-elearning/resources/views/student/mapel_mentor.blade.php ENDPATH**/ ?>