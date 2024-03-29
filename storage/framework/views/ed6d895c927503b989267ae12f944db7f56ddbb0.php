 <?php $__env->startSection('main-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Soal Editor</h1>

        <div class="clearfix">

            <button class="btn btn-success btn-lg mb-4 mr-4 btn-upload float-right">Upload soal</button>

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
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($soal_judul->pelajaran->nama_pelajaran); ?>

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
            <input type="hidden" id="kode_judul_soal" name="kode_judul_soal" value="<?php echo e($soal_judul->kode_judul_soal); ?>">
            <div class="card-body" id="containersoal">

                <?php for($i = 0; $i < $soal_judul->jumlah_soal; $i++): ?>


                    <h6 class="m-0 font-weight-bold text-info">Soal ke <?php echo e($i + 1); ?></h6>
                    <br>
                    <div class="row">
                        <div class="col-md-6 grid-margin">
                            <div class="form-group ">
                                <div class=" bg-danger pesan-error"></div>
                                <label for="pertanyaan">Pertanyaan ke <?php echo e($i + 1); ?> <i class="text-success fas fa-check"></i></label>
                                <d required="required" name="pertanyaan" data-id="<?php echo e($soal[$i]['kode_soal']); ?>" data-increment="<?php echo e($i); ?>" class="form-control pertanyaan pertanyaan-<?php echo e($i); ?>" id="pertanyaan-<?php echo e($i); ?>" aria-describedby="textHelp" placeholder="Enter text"></d>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 1  </label>
                                <input type="text" required="required" name="pilihan1" class="form-control pilihan1" data-id="<?php echo e($soal[$i]['kode_soal']); ?>" id="pilihan1-<?php echo e($i); ?>-<?php echo e($soal[$i]['kode_soal']); ?>" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 2  </label>
                                <input type="text" required="required" name="pilihan2" class="form-control pilihan2" data-id="<?php echo e($soal[$i]['kode_soal']); ?>" id="pilihan2-<?php echo e($i); ?>-<?php echo e($soal[$i]['kode_soal']); ?>" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 3  </label>
                                <input type="text" required="required" name="pilihan3" class="form-control pilihan3" data-id="<?php echo e($soal[$i]['kode_soal']); ?>" id="pilihan3-<?php echo e($i); ?>-<?php echo e($soal[$i]['kode_soal']); ?>" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 4  </label>
                                <input type="text" required="required" name="pilihan4" class="form-control pilihan4" data-id="<?php echo e($soal[$i]['kode_soal']); ?>" id="pilihan4-<?php echo e($i); ?>-<?php echo e($soal[$i]['kode_soal']); ?>" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputtext1">Pilihan ke 5  </label>
                                <input type="text" required="required" name="pilihan5" class="form-control pilihan5" data-id="<?php echo e($soal[$i]['kode_soal']); ?>" id="pilihan5-<?php echo e($i); ?>-<?php echo e($soal[$i]['kode_soal']); ?>" aria-describedby="textHelp" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label for="pilihan_benar">Pilihan Benar</label>
                                <select class="form-control pilihan_benar is-valid" name="pilihan_benar" data-id="<?php echo e($soal[$i]['kode_soal']); ?>" required="required">
                                    <?php for($a = 1; $a <= 5; $a++): ?>
                                        <option value="<?php echo e($a); ?>">Pilihan <?php echo e($a); ?></option>
                                    <?php endfor; ?>
                                </select>
                                <p class="help-block"></p>
                                <?php if($errors->has('pilihan_benar')): ?>
                                <p class="help-block">
                                    <?php echo e($errors->first('pilihan_benar')); ?>

                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php endfor; ?>

        </form>
        <br>
        </div>
    </div>
    </form>
</div>
<div id="editor">
    <div id='edit' style='margin-top:30px;'>
    </div>
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
    .note-editor{
        border: 2px solid #28a745 !important;
    }
</style>
<?php $__env->stopSection(); ?> <?php $__env->startSection('scriptjs'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {

        // $(".note-editor").addClass("is-valid");

        Swal.fire(
        'Autosave!',
        'Demi kenyamanan, pekerjaan anda akan di save otomatis oleh sistem!<br><br>Centang hijau (<i class="fas fa-check text-success"></i>) menandakan inputan telah di save. <br><br>Pastikan seluruh field telah tercentang hijau',
        'info'
        )

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

        $('.summernote').summernote({
            height: 600, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });

        $(".btn-upload").click(function(){

            Swal.fire({
                title: 'Anda telah selesai?',
                text: "Anda bisa mengedit soal pada bagian edit soal nanti!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Upload!',
                cancelButtonText: 'belum selesai'
                }).then((result) => {
                if (result.value) {
                    window.location.href = "<?php echo e(url('mentor/soal')); ?>";
                }
            })

        });
        // start auto save !! start auto save !! start auto save !! start auto save !!

        for(var i = 0; i < $("#jumlah-soal").val(); i++){
            $(".pertanyaan-" + i ).summernote({
                height: 250, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true, // set focus to editable area after initializing summernote
                callbacks: {
                    onChange: function(e){

                        var kode_judul_soal = $("#kode_judul_soal").val();
                        var kode_soal = $(this).attr("data-id");
                        var pertanyaan = $(this).summernote("code");
                        var id = $(this).attr("id");
                        var data_increment = $(this).attr("data-increment");


                        $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type: "post",
                                url: "<?php echo e(url('mentor/soal/autosave/pertanyaan')); ?>",
                                data:{
                                    kjs: kode_judul_soal,
                                    ks: kode_soal,
                                    pertanyaan: pertanyaan
                                },
                                success: function(hasil){
                                    if(hasil == "berhasil"){
                                        $("#" + id).addClass("is-valid");

                                    }
                                }
                            });

                    }
                }
            });
        }

        $(".pilihan1").on("change input keyup", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan1 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "<?php echo e(url('mentor/soal/autosave/pilihan1')); ?>",
                    data:{
                        ks: kode_soal,
                        pilihan1: pilihan1
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
            });

        $(".pilihan2").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan2 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "<?php echo e(url('mentor/soal/autosave/pilihan2')); ?>",
                    data:{
                        ks: kode_soal,
                        pilihan2: pilihan2
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan3").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan3 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "<?php echo e(url('mentor/soal/autosave/pilihan3')); ?>",
                    data:{
                        ks: kode_soal,
                        pilihan3: pilihan3
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan4").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan4 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "<?php echo e(url('mentor/soal/autosave/pilihan4')); ?>",
                    data:{
                        ks: kode_soal,
                        pilihan4: pilihan4
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan5").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan5 = $(this).val();
            var id = $(this).attr("id");

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "<?php echo e(url('mentor/soal/autosave/pilihan5')); ?>",
                    data:{
                        ks: kode_soal,
                        pilihan5: pilihan5
                    },
                    success: function(hasil){
                        $("#" + id).addClass("is-valid");
                    }
                });
        });

        $(".pilihan_benar").on("change", function(){

            var kode_soal = $(this).attr("data-id");
            var pilihan_benar = $(this).val();

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "<?php echo e(url('mentor/soal/autosave/pilihan_benar')); ?>",
                    data:{
                        ks: kode_soal,
                        pilihan_benar: pilihan_benar
                    },
                    success: function(hasil){
                        // console.log(hasil);
                    }
                });
        });


    });
</script>



<?php if($pesan_update = Session::get('success_update_materi')): ?>
<script>
    berhasilUpdateMateri()
</script>
<?php endif; ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('mentor.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mozzart/Desktop/TA/mozart-elearning/resources/views/mentor/pages/question/question_create.blade.php ENDPATH**/ ?>