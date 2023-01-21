<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::post('/simpandaftar', [App\Http\Controllers\DaftarController::class, 'simpandaftar']);


Route::group(['middleware' => ['auth','checkRole:Admin,User']],function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

///////////// kendala  ////////////
    Route::get('/kendala', [App\Http\Controllers\KendalaController::class, 'kendala']);

    Route::get('/kendala/add', [App\Http\Controllers\KendalaController::class, 'add']);
    Route::post('/kendala/create', [App\Http\Controllers\KendalaController::class, 'create']);

    Route::get('/kendala/{id}/edit', [App\Http\Controllers\KendalaController::class, 'edit']);
    Route::post('/kendala/{id}/update', [App\Http\Controllers\KendalaController::class, 'update']);
    Route::get('/kendala/{id}/alasan_delete', [App\Http\Controllers\KendalaController::class, 'alasan_delete']);
    Route::get('/kendala/{id}/delete', [App\Http\Controllers\KendalaController::class, 'delete']);

    Route::get('/kendala/jenis', [App\Http\Controllers\KendalaController::class, 'jenis']);
    Route::get('/kendala/kategori', [App\Http\Controllers\KendalaController::class, 'kategori']);

    Route::get('/kendala/log', [App\Http\Controllers\KendalaController::class, 'log']);
    Route::get('/kendala/{id}/restore', [App\Http\Controllers\KendalaController::class, 'restore']);
    Route::get('/kendala/clear', [App\Http\Controllers\KendalaController::class, 'clear']);

    Route::get('/kendala/{id}/detail', [App\Http\Controllers\KendalaController::class, 'detail']);

    Route::get('/target', [App\Http\Controllers\KendalaController::class, 'target']);
    Route::get('/belum_selesai', [App\Http\Controllers\KendalaController::class, 'belum_selesai']);

///////////// kendala detail ////////////
    Route::post('/kendala/{id}/komentar', [App\Http\Controllers\Kendala_detailController::class, 'komentar']);
    Route::get('/kendala/{kendalaid}/{detailid}/komentar_edit', [App\Http\Controllers\Kendala_detailController::class, 'komentar_edit']);
    Route::post('/kendala/{kendalaid}/{detailid}/komentar_update', [App\Http\Controllers\Kendala_detailController::class, 'komentar_update']);
    Route::get('/kendala/{kendalaid}/{detailid}/komentar_delete', [App\Http\Controllers\Kendala_detailController::class, 'komentar_delete']);

    Route::post('/kendala/{id}/send_email', [App\Http\Controllers\Kendala_detailController::class, 'sendEmail'])->name('send.email');

///////////// master_user  ////////////
    Route::get('/master_user', [App\Http\Controllers\Master_userController::class, 'master_user']);
    Route::get('/master_user/add', [App\Http\Controllers\Master_userController::class, 'add']);
    Route::post('/master_user/create', [App\Http\Controllers\Master_userController::class, 'create']);

    Route::get('/master_user/status/{id}', [App\Http\Controllers\Master_userController::class, 'status']);

    Route::get('/master_user/{id}/edit', [App\Http\Controllers\Master_userController::class, 'edit']);
    Route::post('/master_user/{id}/update', [App\Http\Controllers\Master_userController::class, 'update']);
    Route::get('/master_user/{id}/delete', [App\Http\Controllers\Master_userController::class, 'delete']);

///////////// jenis_request  ////////////
    Route::get('/jenis_request', [App\Http\Controllers\Jenis_requestController::class, 'jenis_request']);
    Route::get('/jenis_request/add', [App\Http\Controllers\Jenis_requestController::class, 'add']);
    Route::post('/jenis_request/create', [App\Http\Controllers\Jenis_requestController::class, 'create']);

    Route::get('/jenis_request/status/{id}', [App\Http\Controllers\Jenis_requestController::class, 'status']);

    Route::get('/jenis_request/{id}/edit', [App\Http\Controllers\Jenis_requestController::class, 'edit']);
    Route::post('/jenis_request/{id}/update', [App\Http\Controllers\Jenis_requestController::class, 'update']);
    Route::get('/jenis_request/{id}/delete', [App\Http\Controllers\Jenis_requestController::class, 'delete']);

///////////// kategori  ////////////
    Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'kategori']);
    Route::get('/kategori/add', [App\Http\Controllers\KategoriController::class, 'add']);
    Route::post('/kategori/create', [App\Http\Controllers\KategoriController::class, 'create']);

    Route::get('/kategori/status/{id}', [App\Http\Controllers\KategoriController::class, 'status']);

    Route::get('/kategori/{id}/edit', [App\Http\Controllers\KategoriController::class, 'edit']);
    Route::post('/kategori/{id}/update', [App\Http\Controllers\KategoriController::class, 'update']);
    Route::get('/kategori/{id}/delete', [App\Http\Controllers\KategoriController::class, 'delete']);    

///////////// email  ////////////
    Route::get('/email', [App\Http\Controllers\EmailController::class, 'email']);
    Route::get('/email/{id}/edit', [App\Http\Controllers\EmailController::class, 'edit']);
    Route::post('/email/{id}/update', [App\Http\Controllers\EmailController::class, 'update']);
});

