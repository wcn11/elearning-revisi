<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentor;
use App\Mentor_pelajaran;
use App\Mentors_student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Pelajaran;
use App\Student;
use App\Pelajaran_student;

class MentorController extends Controller
{
    public function index()
    {
        $mentor = Mentor::all();

        // foreach ($mentor as $m) {
        //     echo $m;
        // }

        return view("student.mentor", compact('mentor'));
    }

    public function ambildata(Request $request)
    {

        $id = $request->id_mentor;

        $data_mapel = Mentor::find($id)->m_ke_mp;

        return response()->json($data_mapel);
    }

    public function mapel_mentor($id)
    {
        $mp10 = Mentor_pelajaran::where("id_mentor", $id)->where("kode_kelas", "KLS-10")->get();
        $mp11 = Mentor_pelajaran::where("id_mentor", $id)->where("kode_kelas", "KLS-11")->get();
        $mp12 = Mentor_pelajaran::where("id_mentor", $id)->where("kode_kelas", "KLS-12")->get();

        $mentor = Mentor::find($id);

        $ms = Mentors_student::where("id_mentor", $id)->where("id_student", Auth::guard("student")->user()->id_student)->get();

        $ms_array = [];

        foreach ($ms as $s) {
            $ms_array[] = $s->kode_mentor_pelajaran;
        }

        return view("student.mapel_mentor", compact('mentor', "mp10", "mp11", "mp12", "ms_array"));
    }

    public function ambil_kelas($id_mentor, $kmp)
    {
        $ms = new Mentors_student;

        $ms_max = Mentors_student::max("kode_mentor_student");

        $ms_slash = strrpos($ms_max, "-");

        $ms_substr = substr($ms_max, $ms_slash + 1) + 1;

        $id_mentor_slash = strrpos($id_mentor, "-");

        $id_mentor_substr = substr($id_mentor, $id_mentor_slash + 1) + 1;

        $kmp_slash = strrpos($kmp, "-");

        $kmp_substr = substr($kmp, $kmp_slash + 1) + 1;

        $ms->kode_mentor_student = "MS-" . $id_mentor_substr . "-" . $kmp_substr . "-" . $ms_substr;

        $ms->kode_mentor_pelajaran = $kmp;

        $ms->id_mentor = $id_mentor;

        $ms->id_student = Auth::guard('student')->user()->id_student;

        $ms->save();

        Session::flash("tambah_kelas", "berhasil");

        return redirect()->back();
    }

    public function ambildatafull()
    { // mentor dengan kuota yang sudah penuh

        $k = Mentor::all();

        $b = [];
        foreach ($k as $a) {
            $b[] =
                array(
                    "id_mentor" => $a->id_mentor,
                    "kuota-kini" => count($a->student),
                    "kuota" => $a->kuota
                );
        }

        return $b;
    }


    public function ikuti($id)
    {
        date_default_timezone_set("Asia/Jakarta");

        $id_mentor = $id;

        $mentor_student = Mentors_student::max("kode_mengikuti");

        $mentor_student_slash = strrpos($mentor_student, "-");

        $mentor_student_substr = substr($mentor_student, $mentor_student_slash + 1) + 1;

        $mentor = Mentor::find($id);

        $mentor_slash = strrpos($id_mentor, "-");

        $mentor_substr = substr($id_mentor, $mentor_slash + 1);

        $student_slash = strrpos(Auth::guard("student")->user()->id_student, "-");

        $student_substr = substr(Auth::guard("student")->user()->id_student, $student_slash + 1);

        Mentors_student::firstOrCreate([
            "kode_mengikuti" => "IKT-" . $mentor_substr . "-" . $student_substr . "-" . $mentor_student_substr,
            "id_mentor" => $id,
            "id_student" => Auth::guard("student")->user()->id_student,
            "tanggal_mengikuti" => now()
        ]);

        Session::flash("berhasil_mengikuti", $mentor->name);
        return redirect()->back();
    }

    public function unfollow($kmp)
    {
        $std = Mentors_student::where("kode_mentor_pelajaran", $kmp)->where("id_student", Auth::guard("student")->user()->id_student)->get();

        foreach ($std as $s) {
            Mentors_student::find($s->kode_mentor_student)->delete();
        }

        Session::flash("berhasil_unfollow", "berhasil");

        return redirect()->back();
    }
}
