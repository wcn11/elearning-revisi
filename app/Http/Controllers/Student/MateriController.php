<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mentors_student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Mentor;
use App\Materi;
use App\Mentor_pelajaran;
use App\Pelajaran;
use DOMPDF;

class MateriController extends Controller
{
    function __construct()
    {
        $this->middleware('student.auth:student');
        // if (Auth::guard('student')->check()) {
        //     $student = Student::find(Auth::guard('student')->user()->id_student);
        //     if (empty($student->id_mentor)) {
        //         return redirect()->route('student.mentor');
        //     } elseif (!empty($student->mentor_id)) {
        //         return redirect()->route('student.materi');
        //     }
        // }
    }

    public function downloadPDF($id)
    {
        // $materi_id = Crypt::decrypt($id);
        $materi = Materi::find($id);

        $pdf = DOMPDF::loadView('mentor.pages.materi.pdf', compact('materi'));

        return $pdf->download($materi->judul_materi . '.pdf');
    }

    public function index()
    {
        return view('student.home');
    }
    public function materi()
    {
        $id_student = Auth::guard('student')->user()->id_student;

        $std = Student::find($id_student);

        $student = Mentors_student::where("id_student", $id_student)->get();

        $id_mentor = array();

        foreach ($student as $s) {
            array_push($id_mentor, $s->id_mentor);
        }

        $id_mentor = array_unique($id_mentor);

        $mentor = array();

        foreach ($id_mentor as $m) {
            array_push($mentor, Mentor::find($m));
        }

        return view("student.materi", compact("mentor"));
    }

    public function materi_read($id)
    {
        $materi = Materi::find($id);

        return view('student.materi_read', compact('materi'));
    }

    public function daftar_materi($id)
    {
        $mentor = Mentor::find($id);

        return view('student.daftar_materi', compact('mentor'));
    }

    public function data_mentor($id_mentor)
    {

        $mentor = Mentors_student::where("id_mentor", $id_mentor)->where("id_student", Auth::guard("student")->user()->id_student)->get();

        $kls10 = array();
        $kls11 = array();
        $kls12 = array();

        foreach ($mentor as $m) {
            if ($m->mp_ke_ms->kode_kelas == "KLS-10") {
                array_push($kls10, Mentor_pelajaran::find($m->mp_ke_ms->kode_mentor_pelajaran));
            } else if ($m->mp_ke_ms->kode_kelas == "KLS-11") {
                array_push($kls11, Mentor_pelajaran::find($m->mp_ke_ms->kode_mentor_pelajaran));
            } else {
                array_push($kls12, Mentor_pelajaran::find($m->mp_ke_ms->kode_mentor_pelajaran));
            }
        }

        // re-declare

        $kls10 = count($kls10) > 0 ? $kls10 : 0;
        if ($kls10 > 0) {
            foreach ($kls10 as $s) {
                $s->mp_ke_mapel;
                $s->mp_ke_materi;
            }
        }

        $kls11 = count($kls11) > 0 ? $kls11 : 0;
        if ($kls11 > 0) {
            foreach ($kls11 as $s) {
                $s->mp_ke_mapel;
                $s->mp_ke_materi;
            }
        }
        $kls12 = count($kls12) > 0 ? $kls12 : 0;

        if ($kls12 > 0) {
            foreach ($kls12 as $s) {
                $s->mp_ke_mapel;
                $s->mp_ke_materi;
            }
        }

        return response()->json(array($kls10, $kls11, $kls12));
    }
}
