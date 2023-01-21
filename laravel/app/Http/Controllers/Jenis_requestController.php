<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_request;
use DB;

class Jenis_requestController extends Controller
{

/////////////////// jenis_request ////////////////////////////////////////

    public function jenis_request()
    {
        $jenis_request = \App\Models\Jenis_request::all();
        
        return view('jenis_request.index',[
            'jenis_request' => $jenis_request,
        ]);
    }

    public function add()
    {
        $jenis_request = \App\Models\Jenis_request::all();
        
        return view('jenis_request.add',[
            'jenis_request' => $jenis_request,
        ]);
    }

    public function create(Request $request)
    {
        \App\Models\Jenis_request::create($request->all());

        return redirect ('/jenis_request')->with('sukses', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $jenis_request = \App\Models\Jenis_request::find($id);

        return view('jenis_request.edit', [
            'jenis_request' => $jenis_request,
        ]);
    }

    public function update(Request $request ,$id)
    {       
        $jenis_request = \App\Models\Jenis_request::find($id);
        $jenis_request->update($request->all());

        return redirect ('/jenis_request')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $jenis_request = \App\Models\Jenis_request::find($id);
        $jenis_request->delete($jenis_request);

        return redirect('/jenis_request')->with('sukses', 'Data berhasil dihapus');
    }

    public function status($id)
    {
        //lihat data
        $jenis_request = \DB::table('jenis_request')->where('id',$id)->first();
        //$jenis_request = \App\Models\Jenis_request::find($id);
        //lihat status sekarang
        $status_sekarang = $jenis_request->status;
        //kondisi
        if($status_sekarang == '1'){
            \DB::table('jenis_request')->where('id',$id)->update([
                'status'=>'0'
            ]);
        }else{
            \DB::table('jenis_request')->where('id',$id)->update([
                'status'=>'1'
            ]);
        }
        // \Session::flash('sukses','Status berhasil di update');
        return redirect('/jenis_request')->with('sukses', 'Data berhasil diupdate');
    }


}
