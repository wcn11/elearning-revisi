<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor_pelajaran;
use Illuminate\Support\Facades\Auth;
use App\Mentor;
use App\Pelajaran;
use App\Kelas;
use Illuminate\Support\Facades\Session;

class MapelController extends Controller
{
    public function index()
    {
        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);

        $mapel = Pelajaran::all();

        $kls10 = Mentor_pelajaran::where("id_mentor", Auth::guard('mentor')->user()->id_mentor)->where("kode_kelas", "KLS-10")->get();

        $kls11 = Mentor_pelajaran::where("id_mentor", Auth::guard('mentor')->user()->id_mentor)->where("kode_kelas", "KLS-11")->get();

        $kls12 = Mentor_pelajaran::where("id_mentor", Auth::guard('mentor')->user()->id_mentor)->where("kode_kelas", "KLS-12")->get();

        // $std10 = [];
        // foreach ($kls10 as $a) {
        //     $std10[] = array($a->mp_ke_ms);
        // }

        // echo count($std10);

        return view("mentor.pages.mapel.index", compact("mentor", "mapel", "kls10", "kls11", "kls12"));
    }

    public function tambah_mapel(Request $r)
    {

        $kelas = Mentor_pelajaran::where("id_mentor", Auth::guard("mentor")->user()->id_mentor)->where("kode_mapel", $r->mapel)->where("kode_kelas", $r->kode_kelas)->count();

        if ($kelas > 0) {
            Session::flash("sudah_ada", "gagal");

            return redirect()->back();
        } else {
            $mapel1 = $r->mapel;
            $id_mentor = Auth::guard('mentor')->user()->id_mentor;

            $kelas_substr = substr($r->kode_kelas, strrpos($r->kode_kelas, "-") + 1);

            $mentor_slash = strrpos($id_mentor, "-");

            $mentor_substr = substr($id_mentor, $mentor_slash + 1);

            $mpl_slash = strrpos($mapel1, "-");

            $mpl_substr = substr($mapel1, $mpl_slash + 1);

            $mp_jumlah = Mentor_pelajaran::max("kode_mentor_pelajaran");

            $mp_jumlah_slash = strrpos($mp_jumlah, "-");

            $mp_jumlah_substr = substr($mp_jumlah, $mp_jumlah_slash + 1) + 1;

            $mp = new Mentor_pelajaran;

            $mp->kode_mentor_pelajaran = "MP-" . $mentor_substr . "-" . $kelas_substr . "-" . $mpl_substr . "-" . $mp_jumlah_substr;

            $mp->id_mentor = $id_mentor;

            $mp->kode_mapel = $mapel1;

            $mp->kode_kelas = $r->kode_kelas;

            $mp->save();

            Session::flash("berhasil_tambah", "berhasil");

            return redirect()->back();
        }
    }

    public function edit_kuota(Request $request)
    {
        $pelajaran = Mentor_pelajaran::find($request->kmp);

        $pelajaran->kuota = $request->kuota_baru;

        $pelajaran->update();

        Session::flash("kuota_berhasil", "berhasil");

        return redirect()->back();
    }

    public function hapus_mapel(Request $request)
    {
        $kmp = $request->kmp;
        $mapel = Mentor_pelajaran::find($kmp);

        $mapel->delete();

        Session::flash("pelajaran_dihapus", "Mata pelajaran berhasil dihapus");

        return redirect()->back();
    }
}
