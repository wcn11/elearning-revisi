@extends('mentor.layouts.app')


@section('main-content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>
    <p class="mb-4">tesMurid yang ada pada daftar dibawah adalah murid yang mengikuti anda dan anda dapat <span
            class="badge badge-danger">mengeluarkan</span> murid anda.</p>
    <div class="col text-right mb-3 mt-3">

        <a href="{{ route('mentor.materi_upload') }}" class="btn btn-dark"> Tambah materi</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Murid</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive w-100">
                <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center;">
                            <th>Judul Materi</th>
                            <th>Materi</th>
                            <th>Pelajaran</th>
                            <th>Dibuat</th>
                            <th>Terakhir Update</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(empty($materi))
                        <tr>
                            <td colspan="6" style="text-align:center;">Anda belum membuat materi</td>
                        </tr>
                        @else
                        @foreach ($materi as $m)
                        <tr style="text-align:center;">
                            <td style="width: 35%; text-align:left;">{{ $m->judul_materi }}</td>
                            <td>
                                <button class="btn  btn-dark btn-sm btn-lihat" data-judul="{{ $m->judul_materi }}"
                                    data-materi="{{ $m->materi }}">Lihat Materi</button> |
                                <?php $id = Crypt::encrypt($m->kode_materi); ?>
                                <a class="btn  btn-success btn-sm"
                                    href="{{ action('Mentor\MateriController@downloadPDF', $id) }}">Download Materi
                                    (PDF)<br><sup>Video tidak akan tampil</sup></a>
                            </td>
                            <td>{{ $m->pelajaran->nama_pelajaran }}</td>

                            <td>{{ $m->created_at }}</td>
                            @if (empty($m->updated_at))
                            <td> Belum pernah</td>
                            @else
                            <td> {{ $m->updated_at }}</td>
                            @endif
                            <td>
                                <?php $id = Crypt::encrypt($m->id); ?>
                                <button class="btn  btn-outline-danger btn-hapus"
                                    data-link="{{ url('mentor/materi/delete', $id) }}">Hapus tugas</button> |
                                <a class="btn  btn-outline-info" href="{{ route('mentor.materi_edit', $id) }}">Edit
                                    tugas</a>
                            </td>
            </div>
            </tr>
            @endforeach
            @endif
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>

{{--  MODAL  --}}

<div class="modal fade bd-example-modal-xl modal-materi" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title"
                        style="font-size: 15px; text-align:center; font-weight:bold; text-transform:capitalize;"></h5>
                </div>
                <button type="button" class="close btn-tutup" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-konfirmasi"
                    onclick="event.preventDefault();document.getElementById('form-hapus').submit();"
                    data-dismiss="modal">Hapus</button>
                <button type="button" class="btn btn-info btn-tutup" data-dismiss="modal">Tutup</button>
                <form id="form-hapus" action="#" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scriptcss')

<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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

        $('#tabel').DataTable();

        $(".btn-hapus").click(function () {
            var id = $(this).attr('data-id');
            var link = $(this).attr('data-link');
            $(".modal-materi").modal({ backdrop: "static" });
            $("#form-hapus").attr("action", link)
            $(".modal-dialog").addClass("modal-dialog-centered");
            $(".modal-dialog").removeClass("modal-xl");
            $(".modal-dialog").addClass("modal-xs");
            $(".btn-konfirmasi").css("display", "block");
            $(".modal-title").text("Hapus materi");
            $(".modal-body").text("Apakah anda yakin ingin menghapus materi ?");
        });
        $(".btn-lihat").click(function () {
            var judul = $(this).attr("data-judul");
            var materi = $(this).attr("data-materi");
            $(".btn-konfirmasi").css("display", "none");
            $(".modal-dialog").removeClass("modal-xs");
            $(".modal-dialog").removeClass("modal-dialog-centered");
            $(".modal-dialog").addClass("modal-xl");
            $(".modal-materi").modal({ backdrop: "static" });
            $(".modal-title").append(judul);
            $(".modal-body").append(materi);
        });
        $(".btn-tutup").click(function () {
            $("#form-hapus").attr("href", "#");
            $(".btn-konfirmasi").css("display", "none");
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