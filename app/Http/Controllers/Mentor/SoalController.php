<?php

namespace App\Http\Controllers\Mentor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Pelajaran;
use App\Soal;
use App\Soal_pilihan;
use App\Tes;
use App\Soal_judul;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Mentor;
use App\Mentor_pelajaran;

class SoalController extends Controller
{
    public function index()
    {
        // $sj10 = Soal_judul::where('id_mentor', Auth::guard('mentor')->user()->id_mentor)->where("kode_kelas", "KLS-10")->get();
        // $sj11 = Soal_judul::where('id_mentor', Auth::guard('mentor')->user()->id_mentor)->where("kode_kelas", "KLS-11")->get();
        // $sj12 = Soal_judul::where('id_mentor', Auth::guard('mentor')->user()->id_mentor)->where("kode_kelas", "KLS-12")->get();

        $pelajaran = Pelajaran::all();

        $mentor = Mentor::find(Auth::guard('mentor')->user()->id_mentor);

        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $js10 = Mentor_pelajaran::where("id_mentor", $id_mentor)->where("kode_kelas", "KLS-10")->get();

        $js11 = Mentor_pelajaran::where("id_mentor", $id_mentor)->where("kode_kelas", "KLS-11")->get();

        $js12 = Mentor_pelajaran::where("id_mentor", $id_mentor)->where("kode_kelas", "KLS-12")->get();

        return view('mentor.pages.question.index', compact("js10", "js11", "js12", "mentor", 'pelajaran'));
    }

    public function soal_read($kode_judul_soal)
    {
        $id = Crypt::decrypt($kode_judul_soal);

        $soal = Soal::where('kode_judul_soal', $id)->inRandomOrder()->get();

        foreach ($soal as $s) {
            echo $s->soal_pilihan;
        }
    }

    public function tes()
    {
        $soal = Soal_judul::find(500934080001);

        date_default_timezone_set('Asia/Jakarta');
        if (now() > $soal->tanggal_selesai) {
            echo "lewat";
        } elseif (now() > $soal->tanggal_mulai) {
            echo "kerjakan";
        } else {
            echo "belum waktunya";
        }
    }

    public function question_create_title(Request $request)
    {
        $id_mentor = Auth::guard('mentor')->user()->id_mentor;
        $id_mentor_slash = strrpos($id_mentor, "-");
        $id_mentor_substr = substr($id_mentor, $id_mentor_slash + 1);

        $sj = Soal_judul::all();

        $js_array = array();

        foreach ($sj as $m) {
            array_push($js_array, substr($m->kode_judul_soal, strrpos($m->kode_judul_soal, "-") + 1));
        }

        echo count($js_array) > 0 ? max($js_array) + 1 : 1;

        $kode_js = count($js_array) > 0 ? max($js_array) + 1 : 1;;

        $kode_mapel = $request->kode_mapel;
        $kode_mapel_slash = strrpos($kode_mapel, "-");
        $kode_mapel_substr = substr($kode_mapel, $kode_mapel_slash + 1);

        $tanggal_mulai  = $request->tanggal_mulai;
        $jam_mulai      = $request->jam_mulai;

        $sub_tjm = $tanggal_mulai . " " . $jam_mulai . ":00";

        $tanggal_selesai  = $request->tanggal_selesai;
        $jam_selesai     = $request->jam_selesai;

        $sub_tjs = $tanggal_selesai . " " . $jam_selesai . ":00";

        $sj = new Soal_judul;

        $sj->kode_judul_soal = "KJS-"
            . $id_mentor_substr . "-"
            . $kode_mapel_substr . "-"
            . $kode_js;

        $sj->kode_mapel = $request->kode_mapel;

        $sj->kode_mentor_pelajaran = $request->kode_mentor_pelajaran;

        $sj->id_mentor = $id_mentor;

        $sj->judul = $request->judul;

        $sj->jumlah_soal = $request->jumlah_soal;

        $sj->tanggal_mulai = $sub_tjm;

        $sj->tanggal_selesai = $sub_tjs;

        $sj->save();

        $soal_judul = Soal_judul::find($sj->kode_judul_soal);

        $id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        for ($i = 0; $i < $request->jumlah_soal; $i++) {

            $sl = Soal::all();

            $soal_array = array();

            foreach ($sl as $m) {
                array_push($soal_array, substr($m->kode_soal, strrpos($m->kode_soal, "-") + 1));
            }

            $kode_soal = count($soal_array) > 0 ? max($soal_array) + 1 : 1;

            $sl = Soal::create([
                'kode_soal' => "SOAL-" . $mentor_substr . "-" . $kode_soal,
                'id_mentor' => $id_mentor,
                'kode_judul_soal' => $sj->kode_judul_soal,
                'pertanyaan' => "",
                'pilihan1' => "",
                'pilihan2' => "",
                'pilihan3' => "",
                'pilihan4' => "",
                'pilihan5' => "",
                'pilihan_benar' => ""
            ]);
        }

        $kode_encrypted = Crypt::encrypt($sj->kode_judul_soal);

        return redirect()->route("mentor.buat_soal", $kode_encrypted);
    }

    public function buat_soal_view($kode_judul_soal)
    {
        $kode_judul_soal = Crypt::decrypt($kode_judul_soal);

        $soal_judul = Soal_judul::find($kode_judul_soal);

        $soal = Soal::where("kode_judul_soal", $soal_judul->kode_judul_soal)->get();

        return view("mentor.pages.question.question_create", compact("soal_judul", "soal"));
    }

    public function data_persoal(Request $request)
    {
        $id = Soal_judul::find($request->id);

        $mp = Mentor::find(Auth::guard('mentor')->user()->id_mentor);

        return response()->json($id);
    }

    public function question_update_title(Request $r)
    {

        $sj = Soal_judul::find($r->kode_judul_soal);

        $sj->kode_mapel   = $r->kode_mapel_update;
        $sj->judul          = $r->judul_update;
        $sj->kode_mentor_pelajaran          = $r->kode_mentor_pelajaran_update;

        $kmp = Mentor_pelajaran::find($r->kode_mentor_pelajaran_update);

        $sj->kode_mapel = $kmp->kode_mapel;

        $sj->jumlah_soal    = $r->jumlah_soal_update;
        $sj->tanggal_mulai  = $r->tgl_mulai_update  . " " . $r->jam_mulai_update . ":00";
        $sj->tanggal_selesai  = $r->tanggal_selesai_update . " " . $r->jam_selesai_update . ":00";
        $sj->save();


        Session::flash("berhasil_update_judul", "berhasil_update_judul");

        return redirect()->back();
    }

    public function hapus_soal($id)
    {
        $soal = Soal_judul::find($id);

        $soal->delete();

        Session::flash("hapus_soal");

        return back();
    }

    public function question_create(Request $request)
    {
        $soal = Soal::create($request->all());

        $id_mentor = Soal::find($soal->id);

        $id_mentor->id_mentor = Auth::guard('mentor')->user()->id_mentor;

        $id_mentor->save();

        foreach ($request->pilihan as $key => $value) {
            $benar = $request->pilihan_benar == $key ? 1 : 0;
            Soal_pilihan::insert([
                'soal_id' => $soal->id,
                'pilihan' => $value,
                'pilihan_benar' => $benar
            ]);
        }
    }

    public function hasil($id)
    {
        $test = Tes::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get();
        }

        return view('results.show', compact('test', 'results'));
    }

    public function soal_edit($id)
    {

        $soal_judul = Soal_judul::find($id);

        $soal = Soal::where("kode_judul_soal", $id)->get();

        return view("mentor.pages.question.question_edit", ['soal' => $soal, 'soal_judul' => $soal_judul]);
    }

    public function soal_update(Request $request)
    {
        $kjs = $request->kode_judul_soal;

        $soal = Soal::where("kode_judul_soal", $kjs)->get();

        foreach ($soal as $s_key => $s_value) {
            $sl = Soal::find($s_value->kode_soal);
            $sl->pertanyaan = $request->pertanyaan[$s_key];
            $sl->pilihan1  = $request->pilihan1[$s_key];
            $sl->pilihan2  = $request->pilihan2[$s_key];
            $sl->pilihan3  = $request->pilihan3[$s_key];
            $sl->pilihan4  = $request->pilihan4[$s_key];
            $sl->pilihan5  = $request->pilihan5[$s_key];
            $sl->pilihan_benar = $request->pilihan_benar[$s_key];
            $sl->update();
        }

        Session::flash("update_soal");

        return redirect()->route('mentor.soal');
    }


    // AUTO_SAVE AUTO_SAVE AUTO_SAVE AUTO_SAVE AUTO_SAVE AUTO_SAVE AUTO_SAVE AUTO_SAVE AUTO_SAVE

    public function autosave_pertanyaan(Request $request)
    {

        $ks = $request->ks;

        $pertanyaan = $request->pertanyaan;

        $soal = Soal::find($ks);

        $soal->pertanyaan = $pertanyaan;

        $soal->update();

        return "berhasil";
    }

    public function autosave_pilihan1(Request $request)
    {

        $ks = $request->ks;

        $pilihan1 = $request->pilihan1;

        $soal = Soal::find($ks);

        $soal->pilihan1 = $pilihan1;

        $soal->update();

        return "berhasil";
    }

    public function autosave_pilihan2(Request $request)
    {

        $ks = $request->ks;

        $pilihan2 = $request->pilihan2;

        $soal = Soal::find($ks);

        $soal->pilihan2 = $pilihan2;

        $soal->update();

        return "berhasil";
    }

    public function autosave_pilihan3(Request $request)
    {

        $ks = $request->ks;

        $pilihan3 = $request->pilihan3;

        $soal = Soal::find($ks);

        $soal->pilihan3 = $pilihan3;

        $soal->update();

        return "berhasil";
    }

    public function autosave_pilihan4(Request $request)
    {

        $ks = $request->ks;

        $pilihan4 = $request->pilihan4;

        $soal = Soal::find($ks);

        $soal->pilihan4 = $pilihan4;

        $soal->update();

        return "berhasil";
    }

    public function autosave_pilihan5(Request $request)
    {

        $ks = $request->ks;

        $pilihan5 = $request->pilihan5;

        $soal = Soal::find($ks);

        $soal->pilihan5 = $pilihan5;

        $soal->update();

        return "berhasil";
    }

    public function autosave_pilihan_benar(Request $request)
    {

        $ks = $request->ks;

        $pilihan_benar = $request->pilihan_benar;

        $soal = Soal::find($ks);

        $soal->pilihan_benar = $pilihan_benar;

        $soal->update();

        return "berhasil";
    }

    // end auto save
}
