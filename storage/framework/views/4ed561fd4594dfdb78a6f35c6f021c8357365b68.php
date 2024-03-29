 <?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Soal Editor</h1>

    <p class="">Update makalah anda dengan sebaik baiknya, dan biarkan pada muridmu membacanya kembali.</p>

        <div class="clearfix">

            <button class="btn btn-success btn-lg mb-4 mr-4 btn-upload float-right">Update soal</button>

        </div>

    <div class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Judul soal</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo e($soal_judul->judul); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pelajaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php echo e($soal_judul->pelajaran->nama_pelajaran); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form class="form form-soal" action="<?php echo e(route('mentor.soal_update')); ?>" class="col-md-12" method="POST">
            <?php echo csrf_field(); ?>

            <div class="pesan-error"></div>
            <div class="card-body" id="container-soal">
                <h6 class="m-0 font-weight-bold text-info">Form Soal </h6>
            <?php for($i = 0; $i < $soal_judul->jumlah_soal; $i++): ?>

            <input type="hidden" name="kode_soal[]" value="<?php echo e($soal[$i]['kode_soal']); ?>">
            <input type="hidden" name="kode_judul_soal" value="<?php echo e($soal_judul->kode_judul_soal); ?>">

            <br>
                <div class="row">
                    <div class="col-md-6 grid-margin">
                        <div class="form-group ">
                            <div class=" bg-danger pesan-error"></div>
                            <label for="pertanyaan-i">Pertanyaan <?php echo e($i+1); ?><span class="text-danger control-label">*</span></label>
                                <textarea required="required" name="pertanyaan[]" class="form-control pertanyaan" id="pertanyaan-<?php echo e($i); ?>" aria-describedby="textHelp" placeholder="Enter text"><?php echo $soal[$i]['pertanyaan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtext1">Pilihan ke 1   <span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo e($soal[$i]['pilihan1']); ?>" required="required" name="pilihan1[]" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter text">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputtext1">Pilihan ke 2   <span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo e($soal[$i]['pilihan2']); ?>" required="required" name="pilihan2[]" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtext1">Pilihan ke 3   <span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo e($soal[$i]['pilihan3']); ?>" required="required" name="pilihan3[]" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtext1">Pilihan ke 4   <span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo e($soal[$i]['pilihan4']); ?>" required="required" name="pilihan4[]" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtext1">Pilihan ke 5   <span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo e($soal[$i]['pilihan5']); ?>" required="required" name="pilihan5[]" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtext1">Pilihan Benar<span class="text-danger">*</span></label>
                            <select class="form-control" name="pilihan_benar[]" required="required">
                                <?php for($a = 0; $a < 5; $a++): ?>
                                    
                                    <option value="<?php echo e($a+1); ?>" <?php if($soal[$i]['pilihan_benar'] == $a+1): ?> selected="selected" <?php endif; ?> > Pilihan <?php echo e($a + 1); ?> </option>
                                <?php endfor; ?>
                            </select>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    
                <br>
                </div>
            <?php endfor; ?>
        </form>
        <br>
        </div>
    </div>
    </form>
</div>

<input type="hidden" id="jumlah-soal" value="<?php echo e($soal_judul->jumlah_soal); ?>">

<?php $__env->stopSection(); ?> <?php $__env->startSection('scriptcss'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

<style>
    #publish:hover {
        cursor: pointer;
    }
    .notif{
        position: fixed;
        top: 0%;
        z-index: 99;
    }
</style>
<?php $__env->stopSection(); ?> <?php $__env->startSection('scriptjs'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        var jam = today.getHours();
        var menit = today.getMinutes();
        var detik = today.getSeconds();

        var jumlah_soal = $("#jumlah-soal").val();

        today = dd + '/' + mm + '/' + yyyy + " | " + jam + ":" + menit + ":" + detik;
        $("#tanggal").val(today);


        for(var a = 0; a < $("#jumlah-soal").val(); a++){
            $("#pertanyaan-" + a).summernote({
                height: 250, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true // set focus to editable area after initializing summernote
            });
        }


        // $('.summernote').summernote({
        //     height: 600, // set editor height
        //     minHeight: null, // set minimum height of editor
        //     maxHeight: null, // set maximum height of editor
        //     focus: true // set focus to editable area after initializing summernote
        // });

        $(".btn-upload").click(function(){
            var kosong = "";
            var input = $("[name='pertanyaan[]']");
            $(".pesan-error").html("");
            for(var a = 1; a <=5 ; a++){
                var c = $("#pertanyaan-"+ a).val();
                if(c == ""){
                    console.log("ha");
                    $('.pesan-error'+a).addClass("p-2 rounded");
                    $(".pesan-error"+a).append("<span class='bg-danger text-white'>Harap lengkapi isi bidang pada pertanyaan nomor " + a + "</span><br>");
                }else{
                    if(a === 2){
                        break;
                    }
                    $(".form-soal").submit();
                }
            }
        });
    });
</script>




<?php if($pesan_update = Session::get('success_update_materi')): ?>
<script>
    berhasilUpdateMateri()
</script>
<?php endif; ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wahyu/Desktop/mozart-elearning/resources/views/mentor/pages/question/question_edit.blade.php ENDPATH**/ ?>