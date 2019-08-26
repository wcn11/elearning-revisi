<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

        <!-- Page Heading -->
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <p class="h3 mb-2 text-dark-1000 badge badge-dark badge-primary float-right"><?php echo e($materi->pelajaran->nama_pelajaran); ?></p>
                    
                    <a href="<?php echo e(action('Student\MateriController@downloadPDF', $materi->kode_materi)); ?>"><button class="btn btn-secondary"><i class="fas fa-file-download"></i> Download</button></a>
                <h5 class="m-0 font-weight-bold text-dark text-center"><?php echo e($materi->judul_materi); ?></h5>
            </div>
            <div class="card-body">
                <?php echo $materi->materi; ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\mozart-elearning\resources\views/student/materi_read.blade.php ENDPATH**/ ?>