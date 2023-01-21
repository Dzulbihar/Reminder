<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendala;
use App\Models\Kendala_detail;
use App\Models\Kendala_history;
use DB;
use Auth;
use App\Models\Email;

class KendalaController extends Controller
{

/////////////////// kendala ////////////////////////////////////////

    public function kendala()
    {
        $kendala = \App\Models\Kendala::orderby('created_at','DESC')->get();
        $kategori = \App\Models\Kategori::where('status','1')->get();
        $jenis_request = \App\Models\Jenis_request::where('status','1')->get();
        $email = \App\Models\Email::all();
        
        return view('kendala.index',[
            'kendala' => $kendala,
            'kategori' => $kategori,
            'jenis_request' => $jenis_request,
            'email' => $email,
        ]);
    }

    public function log()
    {
        $kendala_history = \App\Models\Kendala_history::all();
        
        return view('kendala.log',[
            'kendala_history' => $kendala_history,
        ]);
    }


    public function add()
    {
        $kendala = \App\Models\Kendala::all();
        $kategori = \App\Models\Kategori::where('status','1')->get();
        $jenis_request = \App\Models\Jenis_request::where('status','1')->get();
        
        return view('kendala.add',[
            'kendala' => $kendala,
            'kategori' => $kategori,
            'jenis_request' => $jenis_request,
        ]);
    }

    public function create(Request $request)
    {
        $messages = [
            'mimes' => 'Upload dengan format jpg, jpeg, pdf! dan silakan isi kembali datanya',
            'max' => 'Upload file maksimal 4 mb! dan silakan isi kembali datanya',
        ];
         
        $this->validate($request,[
            'file_pendukung_1' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_pendukung_2' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_pendukung_3' => 'mimes:pdf,jpg,jpeg|file|max:4096',
        ],$messages);
        
        $kendala = \App\Models\Kendala::create($request->all());

        //file_pendukung_1 
        if($request->hasFile('file_pendukung_1'))
        {
            $file_file_pendukung_1 = time()."_".$request->file('file_pendukung_1')->getClientOriginalName();
            $request->file('file_pendukung_1')->move('images/',$file_file_pendukung_1);
            $kendala->file_pendukung_1 = $file_file_pendukung_1;
            $kendala->save();
        }

        //file_pendukung_2 
        if($request->hasFile('file_pendukung_2'))
        {
            $file_file2 = time()."_".$request->file('file_pendukung_2')->getClientOriginalName();
            $request->file('file_pendukung_2')->move('images/',$file_file2);
            $kendala->file_pendukung_2 = $file_file2;
            $kendala->save();
        }

        //file_pendukung_3 
        if($request->hasFile('file_pendukung_3'))
        {
            $file_file3 = time()."_".$request->file('file_pendukung_3')->getClientOriginalName();
            $request->file('file_pendukung_3')->move('images/',$file_file3);
            $kendala->file_pendukung_3 = $file_file3;
            $kendala->save();
        }

        return redirect ('/kendala')->with('sukses', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $kendala = \App\Models\Kendala::find($id);
        $kategori = \App\Models\Kategori::where('status','1')->get();
        $jenis_request = \App\Models\Jenis_request::where('status','1')->get();

        return view('kendala.edit', [
            'kendala' => $kendala,
            'kategori' => $kategori,
            'jenis_request' => $jenis_request,
        ]);
    }

    public function update(Request $request ,$id)
    {     
        $messages = [
            'mimes' => 'Upload dengan format jpg, jpeg, pdf! dan silakan isi kembali datanya',
            'max' => 'Upload file maksimal 4 mb! dan silakan isi kembali datanya',
        ];
         
        $this->validate($request,[
            'file_pendukung_1' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_pendukung_2' => 'mimes:pdf,jpg,jpeg|file|max:4096',
            'file_pendukung_3' => 'mimes:pdf,jpg,jpeg|file|max:4096',
        ],$messages);

        $kendala = \App\Models\Kendala::find($id);
        $kendala->update($request->all());

        //file_pendukung_1 
        if($request->hasFile('file_pendukung_1'))
        {
            $file_file_pendukung_1 = time()."_".$request->file('file_pendukung_1')->getClientOriginalName();
            $request->file('file_pendukung_1')->move('images/',$file_file_pendukung_1);
            $kendala->file_pendukung_1 = $file_file_pendukung_1;
            $kendala->save();
        }

        //file_pendukung_2 
        if($request->hasFile('file_pendukung_2'))
        {
            $file_file2 = time()."_".$request->file('file_pendukung_2')->getClientOriginalName();
            $request->file('file_pendukung_2')->move('images/',$file_file2);
            $kendala->file_pendukung_2 = $file_file2;
            $kendala->save();
        }

        //file_pendukung_3 
        if($request->hasFile('file_pendukung_3'))
        {
            $file_file3 = time()."_".$request->file('file_pendukung_3')->getClientOriginalName();
            $request->file('file_pendukung_3')->move('images/',$file_file3);
            $kendala->file_pendukung_3 = $file_file3;
            $kendala->save();
        }

        return redirect ('/kendala')->with('sukses', 'Data berhasil diupdate');
    }

    public function alasan_delete($id)
    {
        $kendala = \App\Models\Kendala::find($id);
        
        return view('kendala.alasan_delete',[
            'kendala' => $kendala,
        ]);
    }

    public function delete(Request $request, $id)
    {
        $kendala = \App\Models\Kendala::find($id);

        //memindahkan data kendala ke data kendala_history
        $kendala_history = new \App\Models\Kendala_history;

        $kendala_history->user_delete = Auth::user()->name;
        $kendala_history->alasan_delete = $request->alasan_delete;
        $kendala_history->tgl_created_at = $kendala->created_at;
        $kendala_history->tgl_updated_at = $kendala->updated_at;

        $kendala_history->id = $kendala->id;
        $kendala_history->user_entry = $kendala->user_entry;
        $kendala_history->jenis_request = $kendala->jenis_request;
        $kendala_history->kategori = $kendala->kategori;
        $kendala_history->keterangan = $kendala->keterangan;
        $kendala_history->keterangan1 = $kendala->keterangan1;
        $kendala_history->target = $kendala->target;
        $kendala_history->status = $kendala->status;

        $kendala_history->file_pendukung_1 = $kendala->file_pendukung_1;
        $kendala_history->file_pendukung_2 = $kendala->file_pendukung_2;
        $kendala_history->file_pendukung_3 = $kendala->file_pendukung_3;
        $kendala_history->save();

        //menghapus data kendala 
        $kendala = \App\Models\Kendala::find($id);
        $kendala->delete($kendala);

        return redirect('/kendala')->with('sukses', 'Data berhasil dihapus');
    }

    public function restore($id)
    {
        $kendala_history = \App\Models\Kendala_history::find($id);

        //memindahkan data kendala_history ke data kendala
        $kendala = new \App\Models\Kendala;

        $kendala->created_at = $kendala_history->tgl_created_at;
        $kendala->updated_at = $kendala_history->tgl_updated_at;

        $kendala->id = $kendala_history->id;
        $kendala->user_entry = $kendala_history->user_entry;
        $kendala->jenis_request = $kendala_history->jenis_request;
        $kendala->kategori = $kendala_history->kategori;
        $kendala->keterangan = $kendala_history->keterangan;
        $kendala->keterangan1 = $kendala_history->keterangan1;
        $kendala->target = $kendala_history->target;
        $kendala->status = $kendala_history->status;

        $kendala->file_pendukung_1 = $kendala_history->file_pendukung_1;
        $kendala->file_pendukung_2 = $kendala_history->file_pendukung_2;
        $kendala->file_pendukung_3 = $kendala_history->file3;
        $kendala->save();
        
        //menghapus data kendala 
        $kendala_history = \App\Models\Kendala_history::find($id);
        $kendala_history->delete($kendala_history);

        return redirect('/kendala/log')->with('sukses', 'Data berhasil dipulihkan');
    }

    public function clear()
    {
        $kendala_history =  DB::select("DELETE FROM `kendala_history`");

        return redirect('/kendala/log')->with('sukses', 'Data berhasil dibersihkan');
    }

////////////////////////////////////////////

    public function detail($id)
    {
        $kendala = \App\Models\Kendala::find($id);
        $kendala_detail = \App\Models\Kendala_detail::where('kendala_id',$id)->where('parent',0)->get();
        $users = \App\Models\User::all();

        return view('kendala.detail', [
            'kendala' => $kendala,
            'kendala_detail' => $kendala_detail,
            'users' => $users,
        ]);
    }

////////////////////////////////////////////

    public function jenis(Request $request)
    {
        $kendala = \App\Models\Kendala::orderby('created_at','DESC')->get();
        $kategori = \App\Models\Kategori::where('status','1')->get();
        $jenis_request = \App\Models\Jenis_request::where('status','1')->get();

        // menangkap data pencarian
        $jenis = $request->jenis;

        // mengambil data dari table pegawai sesuai pencarian data
        $kendala = DB::table('kendala')
        ->where('jenis_request','like',"%".$jenis."%")
        ->get();

        // mengirim data ke view
        return view('kendala.index',
            [
            'kendala' => $kendala,
            'kategori' => $kategori,
            'jenis_request' => $jenis_request,
        ]);
    }

    public function kategori(Request $request)
    {
        $kendala = \App\Models\Kendala::orderby('created_at','DESC')->get();
        $kategori = \App\Models\Kategori::where('status','1')->get();
        $jenis_request = \App\Models\Jenis_request::where('status','1')->get();

        // menangkap data pencarian
        $cari_kategori = $request->cari_kategori;

        // mengambil data dari table pegawai sesuai pencarian data
        $kendala = DB::table('kendala')
        ->where('kategori','like',"%".$cari_kategori."%")
        ->get();

        // mengirim data ke view
        return view('kendala.index',
            [
            'kendala' => $kendala,
            'kategori' => $kategori,
            'jenis_request' => $jenis_request,
        ]);
    }
    

    public function target()
    {
        $kendala = \App\Models\Kendala::orderby('created_at','DESC')->get();
        $kategori = \App\Models\Kategori::where('status','1')->get();
        $jenis_request = \App\Models\Jenis_request::where('status','1')->get();
        
        return view('kendala.target',[
            'kendala' => $kendala,
            'kategori' => $kategori,
            'jenis_request' => $jenis_request,
        ]);
    }

    public function belum_selesai()
    {
        $kendala = \App\Models\Kendala::orderby('created_at','DESC')->get();
        $kategori = \App\Models\Kategori::where('status','1')->get();
        $jenis_request = \App\Models\Jenis_request::where('status','1')->get();
        
        return view('kendala.belum_selesai',[
            'kendala' => $kendala,
            'kategori' => $kategori,
            'jenis_request' => $jenis_request,
        ]);
    }

}
