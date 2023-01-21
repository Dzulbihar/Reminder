<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use DB;

class KategoriController extends Controller
{

/////////////////// kategori ////////////////////////////////////////

    public function kategori()
    {
        $kategori = \App\Models\Kategori::all();
        
        return view('kategori.index',[
            'kategori' => $kategori,
        ]);
    }

    public function add()
    {
        $kategori = \App\Models\Kategori::all();
        
        return view('kategori.add',[
            'kategori' => $kategori,
        ]);
    }

    public function create(Request $request)
    {
        \App\Models\Kategori::create($request->all());

        return redirect ('/kategori')->with('sukses', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $kategori = \App\Models\Kategori::find($id);

        return view('kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request ,$id)
    {       
        $kategori = \App\Models\Kategori::find($id);
        $kategori->update($request->all());

        return redirect ('/kategori')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $kategori = \App\Models\Kategori::find($id);
        $kategori->delete($kategori);

        return redirect('/kategori')->with('sukses', 'Data berhasil dihapus');
    }

    public function status($id)
    {
        //lihat data
        $kategori = \DB::table('kategori')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $kategori->status;
        //kondisi
        if($status_sekarang == '1'){
            \DB::table('kategori')->where('id',$id)->update([
                'status'=>'0'
            ]);
        }else{
            \DB::table('kategori')->where('id',$id)->update([
                'status'=>'1'
            ]);
        }
        // \Session::flash('sukses','Status berhasil di update');
        return redirect('/kategori')->with('sukses', 'Data berhasil diupdate');
    }

}
