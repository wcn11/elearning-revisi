<?php

Route::group(['namespace' => 'Mentor'], function () {
    Route::get('/', 'HomeController@index')->name('mentor.dashboard')->middleware("mentor.verified");

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('mentor.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('mentor.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('mentor.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('mentor.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('mentor.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('mentor.password.reset');

    // Must verify email
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('mentor.verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('mentor.verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('mentor.verification.verify');

    // Route::get("redirect/{driver}", "Auth\LoginController@redirectToProvider")->name("login.mentor.provider");
    // Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.mentor.callback');
    // Students
    Route::group(['middleware' => ['mentor.auth', 'mentor.verified']], function () {

        // Route::group(['middleware' => ['mentor.cek_mapel']], function () {

        Route::post('/password/change', 'HomeController@changePassword')->name('mentor.password.change');

        Route::get('student', "StudentController@index")->name('mentor.student');
        Route::post('student/hapus', "StudentController@hapus_mapel")->name('mentor.hapus_mapel');
        Route::post('student/destroy', 'StudentController@destroy')->name('mentor.student_destroy');
        Route::post('student/unfollow/{id}', 'StudentController@unfollow')->name('mentor.unfollow');
        Route::post('student/update_kuota', 'StudentController@update_kuota')->name('mentor.update_kuota');

        // Route::post('addItem', 'StudentController@addItem');

        Route::get('materi', 'MateriController@index')->name('mentor.materi');
        Route::get('materi/tambah', 'MateriController@tambah_materi')->name('mentor.tambah_materi');
        Route::post('materi/upload_aksi', 'MateriController@materi_upload_aksi')->name('mentor.materi_upload_aksi');
        Route::get('materi/edit/{id}', 'MateriController@materi_edit')->name('mentor.edit_materi');
        Route::post('materi/update', 'MateriController@materi_update')->name('mentor.materi_update');
        Route::post('materi/hapus', 'MateriController@hapus_materi')->name('mentor.hapus_materi');
        Route::post('materi/ambildata/{kode_materi}', 'MateriController@ambil_data');
        Route::get("materi/downloadPDF/{id}", "MateriController@downloadPDF")->name("mentor.download_materi");

        Route::get('soal', 'SoalController@index')->name('mentor.soal');
        Route::post('soal/create/title', 'SoalController@question_create_title')->name('mentor.question_create_title');
        Route::post('soal/update/title', 'SoalController@question_update_title')->name('mentor.question_update_title');
        Route::post('soal/datapersoal', 'SoalController@data_persoal')->name('mentor.soal_data_persoal');
        Route::get('soal/read/{id}', 'SoalController@soal_read')->name('mentor.soal_read');
        Route::get('soal/edit/{id}', 'SoalController@soal_edit')->name('mentor.soal_edit');
        Route::post('soal/update', 'SoalController@soal_update')->name('mentor.soal_update');
        Route::post('soal/hapus/soal/{id}', 'SoalController@hapus_soal')->name('mentor.hapus_soal');
        Route::get("soal/buat_soal/{kode_judul_soal}", "SoalController@buat_soal_view")->name("mentor.buat_soal");

        Route::get('profil', 'HomeController@profil')->name('mentor.profil');
        Route::post('profil/update', 'HomeController@profil_update')->name('mentor.profil_update');

        //auto save
        Route::post("soal/autosave/pertanyaan", "SoalController@autosave_pertanyaan");
        Route::post("soal/autosave/pilihan1", "SoalController@autosave_pilihan1");
        Route::post("soal/autosave/pilihan2", "SoalController@autosave_pilihan2");
        Route::post("soal/autosave/pilihan3", "SoalController@autosave_pilihan3");
        Route::post("soal/autosave/pilihan4", "SoalController@autosave_pilihan4");
        Route::post("soal/autosave/pilihan5", "SoalController@autosave_pilihan5");
        Route::post("soal/autosave/pilihan_benar", "SoalController@autosave_pilihan_benar");

        Route::any('ViewerJS/{al l? }', function () {

            return View::make('ViewerJS.index');
        });
        // });

        // Route::get("mapel", 'PelajaranController@index')->name('mentor.mapel');
        // Route::post("pelajaran/tambah", 'PelajaranController@tambah')->name('mentor.tambah_mapel');
        // Route::post("pelajaran/update", 'PelajaranController@update')->name('mentor.update_mapel');
        // Route::post("pelajaran/ambil_data", "PelajaranController@ambilData");
        // Route::post("pelajaran/hapus/{id}", "PelajaranController@hapus");
        // Route::get("pelajaran/cetak/{id}", 'PelajaranController@cetak');
        // Route::post("pelajaran/update/kuota/{id}", 'PelajaranController@update_kuota');

        Route::get("mapel", "MapelController@index")->name("mentor.mapel");

        Route::post("mapel/tambah", "MapelController@tambah_mapel")->name("mentor.tambah_mapel");

        Route::post("mapel/edit/kuota", "MapelController@edit_kuota")->name("mentor.edit_kuota");

        Route::post('mapel/hapus', 'MapelController@hapus_mapel')->name('mentor.hapus_mapel'); //
    });
});
