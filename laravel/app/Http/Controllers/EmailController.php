<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use DB;

class EmailController extends Controller
{


/////////////////// email ////////////////////////////////////////

    public function email()
    {
        $email = \App\Models\Email::all();
        
        return view('email.index',[
            'email' => $email,
        ]);
    }

    public function edit($id)
    {
        $email = \App\Models\Email::find($id);

        return view('email.edit', [
            'email' => $email,
        ]);
    }

    public function update(Request $request ,$id)
    {       
        $email = \App\Models\Email::find($id);
        $email->update($request->all());

        return redirect ('/email')->with('sukses', 'Data berhasil diupdate');
    }

}
