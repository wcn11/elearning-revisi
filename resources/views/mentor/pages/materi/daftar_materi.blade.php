@extends('mentor.layouts.app')


@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">Murid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">


    </div>

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

        {{-- KELAS 10 --}}
        <div class="tab-pane fade show active" id="pills-10" role="tabpanel" aria-labelledby="pills-10-tab">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($materi_10 as $m10)
                        <a class="nav-item nav-link" id="nav-{{ $m10->kode_mentor_pelajaran }}-tab" data-toggle="tab"
                            href="#nav-{{ $m10->kode_mentor_pelajaran }}" role="tab"
                            aria-controls="nav-{{ $m10->kode_mentor_pelajaran }}"
                            aria-selected="true">{{ $m10->mp_ke_mapel->nama_pelajaran }}</a>
                        @endforeach
                    </div>
                </nav>

                {{-- <input type="hidden" value="{{ $mentor->m_ke_mp->count() }}" name="jumlah_materi"> --}}
                <div class="tab-content" id="nav-tabContent">

                    @foreach ($materi_10 as $m10)
                    <div class="tab-pane fade p-2" id="nav-{{ $m10->kode_mentor_pelajaran }}" role="tabpanel"
                        aria-labelledby="nav-{{ $m10->kode_mentor_pelajaran }}-tab">

                        <div class="w-100 text-center m-2">
                            <form action="{{ route('mentor.tambah_materi') }}" class="form" method="get">

                                <input type="hidden" name="kmp" value="{{ $m10->kode_mentor_pelajaran }}">
                                <button type="submit" class="btn btn-dark text-right"><i class="fas fa-plus"></i> Tambah
                                    materi</button>
                            </form>
                        </div>

                        <div class="table-responsive w-100">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Cover</th>
                                        <th>Judul Materi</th>
                                        <th>Materi</th>
                                        <th>Kelas</th>
                                        <th>Pelajaran</th>
                                        <th>Dibuat</th>
                                        <th>Terakhir Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($m10->mp_ke_materi->count() > 0)
                                    @foreach($m10->mp_ke_materi as $m2)
                                    <tr class="text-center">
                                        <td>
                                            <div class="p-1 cover">
                                                <img src="{{ url('/images/cover_materi/'.$m2->cover) }}"
                                                    class="gambar border-secondary border w-100 border-0">
                                            </div>
                                        </td>
                                        <td>{{ $m2->judul_materi }}</td>
                                        <td>
                                            <button class="btn btn-info btn-lihat" data-id="{{ $m2->kode_materi }}"><i
                                                    class="fas fa-eye"></i> Lihat materi</button>
                                            <div class="m-1"></div>
                                            <a href="{{ route('mentor.download_materi', $m2->kode_materi) }}"
                                                target="_blank" class="btn btn-success btn-cetak"><i
                                                    class="fas fa-file-pdf"></i> Cetak
                                                Materi<br><small>Video tidak akan tampil</small></a>
                                        </td>
                                        <td>{{ $m10->kelas_ke_mp->kelas }}</td>
                                        <td>{{ $m2->mapel_ke_materi->nama_pelajaran }}</td>
                                        <td>{{ $m2->dibuat }}</td>
                                        <td>{{ $m2->diupdate }}</td>
                                        <td>
                                            <div class="p-1">
                                                <a class="btn btn-warning"
                                                    href="{{ route('mentor.edit_materi', $m2->kode_materi) }}"><i
                                                        class="fas fa-edit"></i> edit</a>
                                                <button class="btn btn-danger btn-hapus"
                                                    data-id="{{ $m2->kode_materi }}"><i class="fas fa-edit"></i>
                                                    hapus</button>
                                            </div>
                                            <form class="form-hapus-{{ $m2->kode_materi }}"
                                                action="{{ route('mentor.hapus_materi') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="kode_materi">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="8">Anda Belum Membuat Materi Untuk Mata
                                            Pelajaran ini.
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

        {{-- KELAS 11 --}}
        <div class="tab-pane fade" id="pills-11" role="tabpanel" aria-labelledby="pills-11-tab">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($materi_11 as $m10)
                        <a class="nav-item nav-link" id="nav-{{ $m10->kode_mentor_pelajaran }}-tab" data-toggle="tab"
                            href="#nav-{{ $m10->kode_mentor_pelajaran }}" role="tab"
                            aria-controls="nav-{{ $m10->kode_mentor_pelajaran }}"
                            aria-selected="true">{{ $m10->mp_ke_mapel->nama_pelajaran }}</a>
                        @endforeach
                    </div>
                </nav>

                {{-- <input type="hidden" value="{{ $mentor->m_ke_mp->count() }}" name="jumlah_materi"> --}}
                <div class="tab-content" id="nav-tabContent">

                    @foreach ($materi_11 as $m11)
                    <div class="tab-pane fade p-2" id="nav-{{ $m11->kode_mentor_pelajaran }}" role="tabpanel"
                        aria-labelledby="nav-{{ $m11->kode_mentor_pelajaran }}-tab">

                        <div class="w-100 text-center m-2">
                            <form action="{{ route('mentor.tambah_materi') }}" class="form" method="get">

                                <input type="hidden" name="kmp" value="{{ $m11->kode_mentor_pelajaran }}">
                                {{-- <input type="hidden" name="kmp" value="{{  }}"> --}}
                                <button type="submit" class="btn btn-dark text-right"><i class="fas fa-plus"></i> Tambah
                                    materi</button>
                            </form>
                        </div>

                        <div class="table-responsive w-100">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Cover</th>
                                        <th>Judul Materi</th>
                                        <th>Materi</th>
                                        <th>Kelas</th>
                                        <th>Pelajaran</th>
                                        <th>Dibuat</th>
                                        <th>Terakhir Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($m11->mp_ke_materi->count() > 0)
                                    @foreach($m11->mp_ke_materi as $m2)
                                    <tr class="text-center">
                                        <td>
                                            <div class="p-1 cover">
                                                <img src="{{ url('/images/cover_materi/'.$m2->cover) }}"
                                                    class="gambar border-secondary border w-100 border-0">
                                            </div>
                                        </td>
                                        <td>{{ $m2->judul_materi }}</td>
                                        <td>
                                            <button class="btn btn-info btn-lihat" data-id="{{ $m2->kode_materi }}"><i
                                                    class="fas fa-eye"></i> Lihat materi</button>
                                            <div class="m-1"></div>
                                            <a href="{{ route('mentor.download_materi', $m2->kode_materi) }}"
                                                target="_blank" class="btn btn-success btn-cetak"><i
                                                    class="fas fa-file-pdf"></i> Cetak
                                                Materi<br><small>Video tidak akan tampil</small></a>
                                        </td>
                                        <td>{{ $m10->kelas_ke_mp->kelas }}</td>
                                        <td>{{ $m2->mapel_ke_materi->nama_pelajaran }}</td>
                                        <td>{{ $m2->dibuat }}</td>
                                        <td>{{ $m2->diupdate }}</td>
                                        <td>
                                            <div class="p-1">
                                                <a class="btn btn-warning"
                                                    href="{{ route('mentor.edit_materi', $m2->kode_materi) }}"><i
                                                        class="fas fa-edit"></i> edit</a>
                                                <button class="btn btn-danger btn-hapus"
                                                    data-id="{{ $m2->kode_materi }}"><i class="fas fa-edit"></i>
                                                    hapus</button>
                                            </div>
                                            <form class="form-hapus-{{ $m2->kode_materi }}"
                                                action="{{ route('mentor.hapus_materi') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="kode_materi">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="8">Anda Belum Membuat Materi Untuk Mata
                                            Pelajaran ini.
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>

        {{-- KELAS 12 --}}
        <div class="tab-pane fade" id="pills-12" role="tabpanel" aria-labelledby="pills-12-tab">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($materi_12 as $m10)
                        <a class="nav-item nav-link" id="nav-{{ $m10->kode_mentor_pelajaran }}-tab" data-toggle="tab"
                            href="#nav-{{ $m10->kode_mentor_pelajaran }}" role="tab"
                            aria-controls="nav-{{ $m10->kode_mentor_pelajaran }}"
                            aria-selected="true">{{ $m10->mp_ke_mapel->nama_pelajaran }}</a>
                        @endforeach
                    </div>
                </nav>

                {{-- <input type="hidden" value="{{ $mentor->m_ke_mp->count() }}" name="jumlah_materi"> --}}
                <div class="tab-content" id="nav-tabContent">

                    @foreach ($materi_12 as $m12)
                    <div class="tab-pane fade p-2" id="nav-{{ $m12->kode_mentor_pelajaran }}" role="tabpanel"
                        aria-labelledby="nav-{{ $m12->kode_mentor_pelajaran }}-tab">

                        <div class="w-100 text-center m-2">
                            <form action="{{ route('mentor.tambah_materi') }}" class="form" method="get">

                                <input type="hidden" name="kmp" value="{{ $m12->kode_mentor_pelajaran }}">
                                {{-- <input type="hidden" name="kmp" value="{{  }}"> --}}
                                <button type="submit" class="btn btn-dark text-right"><i class="fas fa-plus"></i> Tambah
                                    materi</button>
                            </form>
                        </div>

                        <div class="table-responsive w-100">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center;">
                                        <th>Cover</th>
                                        <th>Judul Materi</th>
                                        <th>Materi</th>
                                        <th>Kelas</th>
                                        <th>Pelajaran</th>
                                        <th>Dibuat</th>
                                        <th>Terakhir Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($m12->mp_ke_materi->count() > 0)
                                    @foreach($m12->mp_ke_materi as $m2)
                                    <tr class="text-center">
                                        <td>
                                            <div class="p-1 cover">
                                                <img src="{{ url('/images/cover_materi/'.$m2->cover) }}"
                                                    class="gambar border-secondary border w-100 border-0">
                                            </div>
                                        </td>
                                        <td>{{ $m2->judul_materi }}</td>
                                        <td>
                                            <button class="btn btn-info btn-lihat" data-id="{{ $m2->kode_materi }}"><i
                                                    class="fas fa-eye"></i> Lihat materi</button>
                                            <div class="m-1"></div>
                                            <a href="{{ route('mentor.download_materi', $m2->kode_materi) }}"
                                                target="_blank" class="btn btn-success btn-cetak"><i
                                                    class="fas fa-file-pdf"></i> Cetak
                                                Materi<br><small>Video tidak akan tampil</small></a>
                                        </td>
                                        <td>{{ $m12->kelas_ke_mp->kelas }}</td>
                                        <td>{{ $m2->mapel_ke_materi->nama_pelajaran }}</td>
                                        <td>{{ $m2->dibuat }}</td>
                                        <td>{{ $m2->diupdate }}</td>
                                        <td>
                                            <div class="p-1">
                                                <a class="btn btn-warning"
                                                    href="{{ route('mentor.edit_materi', $m2->kode_materi) }}"><i
                                                        class="fas fa-edit"></i> edit</a>
                                                <button class="btn btn-danger btn-hapus"
                                                    data-id="{{ $m2->kode_materi }}"><i class="fas fa-edit"></i>
                                                    hapus</button>
                                            </div>
                                            <form class="form-hapus-{{ $m2->kode_materi }}"
                                                action="{{ route('mentor.hapus_materi') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="kode_materi">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class="text-center" colspan="8">Anda Belum Membuat Materi Untuk Mata
                                            Pelajaran ini.
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

{{--  MODAL  --}}

<div class="modal fade modal-materi" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h5 class="modal-title"
                        style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body isi-materi">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-tutup" data-dismiss="modal">Tutup</button>

            </div>
        </div>
    </div>
</div>




@endsection

@section('scriptcss')

<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .container-hapus:hover,
    .container-edit:hover {
        background-color: ivory;
        cursor: pointer;
    }

    .gambar {
        width: 60%;
        text-align: center !important;
    }

    .sorting_1 {
        width: 20%;
    }
</style>

@endsection

@section('scriptjs')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function () {

        $(".nav-tabs .nav-item:first-child").addClass("active");
        $(".tab-content .tab-pane:first-child").addClass("active show");

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function() {
        readURL(this);
    });


        for(var c = 0; c < $("[name='jumlah_materi']").val(); c++){
            $("#tabel-" + c).DataTable();
        }

        $(".btn-lihat").click(function(){
            var id = $(this).attr("data-id");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ url('mentor/materi/ambildata') }}" + "/" + id,
                data: {
                    kode_materi: id
                },
                success:function(hasil){
                    $(".modal-title").text("");
                    $(".isi-materi").html("");
                    $(".modal-title").text(hasil.judul_materi);
                    $(".isi-materi").html(hasil.materi);
                }
            });
        });

        $(".btn-hapus").click(function(){

            var id = $(this).attr("data-id");
            $("[name='kode_materi']").val(id);

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data materi tidak akan bisa dikembalikan!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#343a40',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        $(".form-hapus-"+id).submit();
                    }
                })
        });

        $(".btn-edit").click(function(){
            var id = $(this).attr("data-id");

            console.log(id);

            $(".form-edit-" + id).submit();

        });

        $('#tabel').DataTable();

        $(".btn-lihat").click(function () {
            var judul = $(this).attr("data-judul");
            var materi = $(this).attr("data-materi");
            $(".modal-dialog").removeClass("modal-xs");
            $(".modal-materi").modal({ backdrop: "static" });
            $(".modal-title").append(judul);
            $(".modal-body").append(materi);
        });
        $(".btn-tutup").click(function () {
            $(".modal-title").text("");
            $(".modal-body").text("");
        });
    });
</script>

@if(Session::get('success_upload_materi'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah menambahkan materi baru!',
        'success'
    )
</script>
@endif

@if(Session::get('success_update_materi'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah mengupdate materi!',
        'success'
    )
</script>
@endif

@if(Session::get('hapus_materi'))
<script>
    Swal.fire(
        'Berhasil!',
        'Anda telah menghapus materi!',
        'success'
    )
</script>


@endif
@endsection