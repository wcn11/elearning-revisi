<?php $__env->startSection('main-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-dark">Pilih mentor untuk melihat daftar materi</h6>
        </div>
        <div class="card-body container-utama ">
            <div class="row ml-2">

                <div class="col-lg-3">

                    <div class="row overflow-auto"
                        style="height: 60%; min-height:60%; max-height: 60%; border-right: 5px solid grey;">

                        <?php $__currentLoopData = $mentor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 p-0">

                            <div class="card m-2">

                                <a href="javascript:void(0)" class="btn-mentor" data-mentor="<?php echo e($m->id_mentor); ?>"><img
                                        class="rounded" src="<?php echo e(url('images/'.$m->foto)); ?>"
                                        style="width:100%;height:100%;"></a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="text-center">

                        <div class="container-fluid p-2">

                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-10-tab" data-toggle="pill" href="#pills-10"
                                        role="tab" aria-controls="pills-10" aria-selected="true">KELAS 10</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-11-tab" data-toggle="pill" href="#pills-11" role="tab"
                                        aria-controls="pills-11" aria-selected="false">KELAS 11</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-12-tab" data-toggle="pill" href="#pills-12" role="tab"
                                        aria-controls="pills-12" aria-selected="false">KELAS 12</a>
                                </li>
                            </ul>


                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-10" role="tabpanel"
                                    aria-labelledby="pills-10-tab">

                                    <div class="container-10">

                                        <span> Pilih Mentor Dahulu </span>

                                    </div>

                                    <div class="proses">
                                        Sedang memproses...
                                        <div class="spinner-border text-success" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="pills-11" role="tabpanel" aria-labelledby="pills-11-tab">

                                    <div class="container-11">

                                        <span> Pilih Mentor Dahulu </span>

                                    </div>

                                    <div class="proses">
                                        Sedang memproses...
                                        <div class="spinner-border text-success" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-12" role="tabpanel" aria-labelledby="pills-12-tab">

                                    <div class="container-12">

                                        <span> Pilih Mentor Dahulu </span>

                                    </div>

                                    <div class="proses">
                                        Sedang memproses...
                                        <div class="spinner-border text-success" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

            </div>
        </div>

        


        
    </div>
</div>

</div>
</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptcss'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
<link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<style>
    .box {
        /* background-color: peru; */
        height: 1000px;
        overflow-x: scroll;
        overflow-y: scroll;
    }

    .box-10 {
        visibility: hidden;
    }

    .proses {
        display: none;
    }

    .nama {
        position: absolute;
        bottom: 8px;
        left: 16px;
    }

    .badge-keterangan {
        position: absolute;
        bottom: 25%;
    }

    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
    }

    .flip-card-inner {
        position: relative;
        width: 90%;
        height: 90%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }

    .flip-card-front {
        background-color: #bbb;
        color: black;
    }

    .flip-card-back {
        background-color: #2980b9;
        color: white;
        transform: rotateY(180deg);
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptjs'); ?>

<script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function() {
    $('#tabel').DataTable();

    $(".btn-mentor").on("click", function(){
        var kode = $(this).attr("data-mentor");

        $.ajax({
            type: "get", 
            url: "<?php echo e(url('student/data_mentor')); ?>" + "/" + kode,
            beforeSend: function(){
                $(".proses").show();
            },
            success: function(hasil){

                $(".proses").hide();

                // KELAS 10
                    if(0 < hasil[0].length){

                        //untuk bagian kepala
                        $(".container-10").html("");

                        $(".container-10").prepend(
                            "<nav>" +
                                "<div class='nav nav-tabs kepala-10' id='nav-tab' role='tablist'>"
                        );

                        for(var i = 0; i < hasil[0].length; i++){
                            $(".kepala-10").append(
                                "<a class='nav-item nav-link' id='nav-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "-tab' data-toggle='tab' href='#nav-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "' role='tab' aria-controls='nav-home' aria-selected='true'>" + hasil[0][i]['mp_ke_mapel'].nama_pelajaran + "</a>"
                            );
                        }

                        $(".container-10 nav div a:first-child").addClass("active");
                        $(".container-10").show();
                        //end bagian kepala 10

                        // untuk bagian body 10
                        $(".container-10").append(
                            "<div class='tab-content body-10' id='pills-tabContent'>"
                        );
                        
                        for(var i = 0; i < hasil[0].length; i++){
                            $(".tab-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel).html("");
                            $(".body-10").append(
                                "<div class='tab-pane fade show tab-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "' id='nav-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "' role='tabpanel' aria-labelledby='pills-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "-tab'>" +
                                    "<div class='card-deck'>" +
                                    "<div class='row box box-10-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "'>" +
                                    "</div>" +
                                    "</div>" +
                                "</div>" 
                            );

                            if(hasil[0][i]['mp_ke_materi'].length >  0){
                                for(var j = 0; j < hasil[0][i]['mp_ke_materi'].length; j++){
                                        
                                        $(".box-10-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel).append(

                                            "<div class='col-md-4 mb-4'>" +

                                                "<div class='card'>" +
                                                    "<a href='<?php echo e(url('student/materi/read')); ?>/" + hasil[0][i]['mp_ke_materi'][j]['kode_materi'] +"'><img src='<?php echo e(url('images/cover_materi')); ?>/" + hasil[0][i]['mp_ke_materi'][j]['cover'] +"' class='card-img-top cover-materi' alt='...'></a>" +
                                                    "<div class='card-body'>" +
                                                        "<h5 class='card-title'>" + hasil[0][i]['mp_ke_materi'][j]['judul_materi'] + "</h5>" +
                                                        "<p class='card-text'><span class='badge badge-pills badge-success'>" + hasil[0][i]['mp_ke_mapel']['nama_pelajaran'] + "</span></p>" +
                                                        "<p class='card-text'><small class='text-muted'>" + hasil[0][i]['mp_ke_mapel']['dibuat'] + "</small></p>" +
                                                    "</div>" +
                                                "</div>" +
                                            "</div>"
                                        );

                                }
                            }else{
                                $(".box-10-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel).append(
                                    "<div class='text-center'>Mentor ini belum menambahkan materi pada <span class='badge badge-pill badge-success'>" + hasil[0][i]['mp_ke_mapel'].nama_pelajaran + "</span></div>"
                                );
                            }
                        }

                        $(".body-10 div:first-child").addClass("active");
                    }else if(hasil[0] == 0){
                        $(".container-10").html("");
                        $(".container-10").html("<div class='text-center'>Mentor ini belum menambahkan materi pada kelas 10 atau anda belum memilih mata pelajaran pada kelas ini</div>");
                    }

                // KELAS 11
                if(0 < hasil[1].length){

                    //untuk bagian kepala
                    $(".container-11").html("");

                    $(".container-11").prepend(
                        "<nav>" +
                            "<div class='nav nav-tabs kepala-11' id='nav-tab' role='tablist'>"
                    );

                    for(var i = 0; i < hasil[1].length; i++){
                        $(".kepala-11").append(
                            "<a class='nav-item nav-link' id='nav-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel + "-tab' data-toggle='tab' href='#nav-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel + "' role='tab' aria-controls='nav-home' aria-selected='true'>" + hasil[1][i]['mp_ke_mapel'].nama_pelajaran + "</a>"
                        );
                    }

                    $(".container-11 nav div a:first-child").addClass("active");
                    $(".container-11").show();
                    //end bagian kepala 11

                    // untuk bagian body 11
                    $(".container-11").append(
                        "<div class='tab-content body-11' id='pills-tabContent'>"
                    );
                    
                    for(var i = 0; i < hasil[1].length; i++){
                        $(".tab-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel).html("");
                        $(".body-11").append(
                            "<div class='tab-pane fade show tab-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel + "' id='nav-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel + "' role='tabpanel' aria-labelledby='pills-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel + "-tab'>" +
                                "<div class='card-deck'>" +
                                    "<div class='row justify-content-center box box-11-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel + "'>" +
                                    "</div>" +
                                "</div>" +
                            "</div>" 
                        );

                        if(hasil[1][i]['mp_ke_materi'].length >  0){
                            for(var j = 0; j < hasil[1][i]['mp_ke_materi'].length; j++){
                                    
                                    $(".box-11-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel).append(

                                        "<div class='col-md-4 mb-4'>" +

                                            "<div class='card'>" +
                                                "<a href='javascript:void(0)'><img src='<?php echo e(url('images/cover_materi')); ?>/" + hasil[1][i]['mp_ke_materi'][j]['cover'] +"' class='card-img-top cover-materi' alt='...'></a>" +
                                                "<div class='card-body'>" +
                                                    "<h5 class='card-title'>" + hasil[1][i]['mp_ke_materi'][j]['judul_materi'] + "</h5>" +
                                                    "<p class='card-text'><span class='badge badge-pills badge-success'>" + hasil[1][i]['mp_ke_mapel']['nama_pelajaran'] + "</span></p>" +
                                                    "<p class='card-text'><small class='text-muted'>" + hasil[1][i]['mp_ke_mapel']['dibuat'] + "</small></p>" +
                                                "</div>" +
                                            "</div>" +
                                        "</div>"
                                    );

                            }
                        }else{
                            $(".box-11-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel).html("");
                            $(".box-11-" + hasil[1][i].kode_mentor_pelajaran + "-" + hasil[1][i]['mp_ke_mapel'].kode_mapel).append(
                                "<div class='text-center'>Mentor ini belum menambahkan materi pada pelajaran <span class='badge badge-pill badge-success'>" + hasil[1][i]['mp_ke_mapel'].nama_pelajaran + "</span></div>"
                            );
                        }
                    }

                    $(".body-11 div:first-child").addClass("active");
                }else if(hasil[1] == 0){
                    $(".container-11").html("");
                    $(".container-11").html("<div class='text-center'>Mentor ini belum menambahkan materi pada kelas 11 atau anda belum memilih mata pelajaran pada kelas ini</div>");
                }
                // end  kelas 11

                    // KELAS 12

                if(0 < hasil[2].length){

                    //untuk bagian kepala
                    $(".container-12").html("");

                    $(".container-12").prepend(
                        "<nav>" +
                            "<div class='nav nav-tabs kepala-12' id='nav-tab' role='tablist'>"
                    );

                    for(var i = 0; i < hasil[0].length; i++){
                        $(".kepala-12").append(
                            "<a class='nav-item nav-link' id='nav-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "-tab' data-toggle='tab' href='#nav-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "' role='tab' aria-controls='nav-home' aria-selected='true'>" + hasil[0][i]['mp_ke_mapel'].nama_pelajaran + "</a>"
                        );
                    }

                    $(".container-12 nav div a:first-child").addClass("active");
                    $(".container-12").show();
                    //end bagian kepala 10

                    // untuk bagian body 10
                    $(".container-12").append(
                        "<div class='tab-content body-12' id='pills-tabContent'>"
                    );

                    for(var i = 0; i < hasil[0].length; i++){
                        $(".body-12").append(
                            "<div class='tab-pane fade show' id='pills-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "' role='tabpanel' aria-labelledby='pills-" + hasil[0][i].kode_mentor_pelajaran + "-" + hasil[0][i]['mp_ke_mapel'].kode_mapel + "-tab'>...</div>" 
                        );
                    }

                    $(".body-12 div:first-child").addClass("active");
                    $(".container-12").show();
                    }else if(hasil[2] == 0){
                        $(".container-12").html("");
                        $(".container-12").html("<div class='text-center'>Mentor ini belum menambahkan materi pada kelas 12 atau anda belum memilih mata pelajaran pada kelas ini</div>");
                    }
            }
        });
    });
} );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wahyu/Desktop/mozart-elearning/resources/views/student/materi.blade.php ENDPATH**/ ?>