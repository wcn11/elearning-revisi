@extends('student.layouts.app')

@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Update data diri</h1>
    <p class="mb-4"></p>
    <div class="col text-right mb-3 mt-3">

        <button class="btn btn-dark btn-update"> Update</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data diri</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive w-100">

            <form class="form-update" action="{{ route('student.profil_update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                                <div class="row">
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Nama</span>
                                        </div>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Nama" value="{{$student->name}}" required>
                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">E-mail</span>
                                        </div>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Email anda" value="{{$student->email}}" required>
                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white">Status e-mail</span>
                                        </div>
                                        @if($student->email_verified_at == "")
                                            <h5 class="bg-danger rounded w-50 p-2 mt-2 text-white text-center">Belum di verifikasi <i class="fas fa-exclamation-circle"></i></h5>
                                            <em class="text-dark-50"><a class="font-weight-bold text-danger  btn-kirim-email" href="javascript:void(0)">Klik disini</a> untuk kirim ulang email verifikasi.</em>
                                        @else
                                            <h5 class="bg-success rounded w-50 p-2 mt-2 text-white text-center">Telah di verifikasi <i class="fas fa-check-circle"></i></h5>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-info text-white">Kelas</span>
                                            </div>

                                            <input type="password" style="background-color: #4dbea5;" class="password" readonly data-target=".modal-ganti-password" value="password" type="button" data-toggle="modal">
                                            <br>
                                            <em class="text-dark-50 mt-5"><sup>Klik <span class="badge badge-info text-white" data-toggle="modal" data-target=".modal-ganti-password" style="color:#4dbea5;">ubah password</span> untuk ganti password anda</sup></em>
                                        </div>

                                        <div class="col-md-12 mb-3">
    
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-info text-white">Ubah password</span>
                                                </div>
    
                                                <input type="password" style="background-color: #4dbea5;" class="password" readonly data-target=".modal-ganti-password" value="password" type="button" data-toggle="modal">
                                                <br>
                                                <em class="text-dark-50 mt-5"><sup>Klik <span class="badge badge-info text-white" data-toggle="modal" data-target=".modal-ganti-password" style="color:#4dbea5;">ubah password</span> untuk ganti password anda</sup></em>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin">
                        <div class="card" style="border:0;">
                            <div class="card-body">
                                <div class="form-row">
                                        <div class="input-group-prepend w-100 mb-2">
                                                <span class="input-group-text bg-info text-white">Foto Profil</span>
                                            </div><br>
                                            <input type='file' name="file" value="{{$student->foto}}" class="fom-control w-100 text-center text-white" id="inputFile" style="background-color:#4dbea5; padding:20px; border-radius:25px;" />
                    {{-- {!! HTML::image($mentor->foto, 'Foto Profil', array('class' => 'rounded-circle text-center img-fluid gambar')) !!} --}}

                                </div>
                                <div class="col-md-12 p-2 text-center mt-3">

                                    <img id="image_upload_preview" src="{{url('images/'. $student->foto)}}" class="rounded gambar border-success border border-20" alt="your image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <input type="hidden" name="foto_lama" value="{{ $student->foto}}">
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}

<div class="modal fade bd-example-modal-xl modal-materi" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-konfirmasi" onclick="event.preventDefault();document.getElementById('form-hapus').submit();" data-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-info btn-tutup" data-dismiss="modal">Tutup</button>
                <form id="form-hapus" action="#" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}

<div class="modal fade  modal-ganti-password" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col text-center">
                        Ganti Password
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                    <div class="form-group row">
                        <label for="oldPassword" class="col-md-5 col-form-label text-md-right">{{ __('Password lama') }}</label>

                        <span class="password-salah w-100 text-danger text-center">Password yang anda masukkan saat ini salah</span>
                        <div class="col-md-12">
                            <input id="current_password" type="password" class="form-control" name="current_password" value="" required autofocus>

                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password baru') }}</label>

                        <span class=" w-100 text-danger text-center password_sama text-center">Password baru anda tidak boleh sama dengan password lama anda!</span>
                        <span class=" password_tidak_sama w-100 text-danger password_tidak_sama text-center">Password baru anda tidak sama dengan password Konfirmasi!</span>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_baru" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('Konfirmasi password baru') }}</label>

                        <div class="col-md-12">
                            <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-6">
                            <button type="button" class="btn btn-info btn-ganti-password">
                                        {{ __('Ganti Password') }}
                                    </button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


<div class="modal fade modal-update" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      Anda harus melengkapi seluruh field!
    </div>
  </div>
</div>

@endsection @section('scriptcss')

<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .gambar {
        width: 100%;
        height: auto;
        min-height: 200px;
    }
    .password {
	background-color: #4dbea5;
	border: 0px;
	border-radius: 5px;
	padding: 2px;
	font-size: 20px;
    color: white;
    text-align: center;
    margin-top: 2px;
}
.password-salah,
    .password_tidak_sama,
    .password_sama{
        display: none;
    }
</style>
@endsection @section('scriptjs')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>

$(".btn-ganti-password").click(function() {

$(".current_password").hide();
$(".password_sama").hide()
$(".password_tidak_sama").hide();
// $("#current_password").val("");

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    type: "post",
    url: "{{ url('/student/password/change') }}",
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
        }
    }
});
});


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });

    $('.btn-update').click(function(){
        var name = $("[name='name']").val();
        var email = $("[email='email']").val();

        if(name == "" && email == ""){
            $(".modal-update").modal();
        }else{
            $(".form-update").submit();
        }
    });
</script>


@if ($pesan_hapus = Session::get('update_profil'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda berhasil mengupdate profil!',
        'success'
    )

</script>
@endif

@endsection