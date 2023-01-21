<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendala;
use App\Models\Kendala_detail;
use DB;
//use Illuminate\Support\Facades\Mail;

class Kendala_detailController extends Controller
{
    public function komentar(Request $request ,$id)
    {
        $kendala = \App\Models\Kendala::find($id);

        $request->request->add(['kendala_id' => $kendala->id ]);
        $kendala_detail = \App\Models\Kendala_detail::create($request->all());

        //file_pendukung
        if($request->hasFile('file_pendukung'))
        {
            $file_file_pendukung = time()."_".$request->file('file_pendukung')->getClientOriginalName();
            $request->file('file_pendukung')->move('images/',$file_file_pendukung);
            $kendala_detail->file_pendukung = $file_file_pendukung;
            $kendala_detail->save();
        }

        return redirect('kendala/'.$id.'/detail')->with('sukses', 'Data berhasil disimpan');
    }

    public function komentar_edit($kendalaid, $detailid)
    {
        $kendala = \App\Models\Kendala::find($kendalaid);
        $kendala_detail = \App\Models\Kendala_detail::find($detailid);

        return view('kendala.komentar_edit', [
            'kendala' => $kendala,
            'kendala_detail' => $kendala_detail,
        ]);
    }

    public function komentar_update (Request $request, $kendalaid, $detailid)
    {     
        $messages = [
            'mimes' => 'Upload dengan format jpg, jpeg, pdf! dan silakan isi kembali datanya',
            'max' => 'Upload file maksimal 4 mb! dan silakan isi kembali datanya',
        ];
         
        $this->validate($request,[
            'file_pendukung' => 'mimes:pdf,jpg,jpeg|file|max:4096',
        ],$messages);

        $kendala = \App\Models\Kendala::find($kendalaid);
        $kendala_detail = \App\Models\Kendala_detail::find($detailid);
        $kendala_detail->update($request->all());

        //file_pendukung 
        if($request->hasFile('file_pendukung'))
        {
            $file_file_pendukung = time()."_".$request->file('file_pendukung')->getClientOriginalName();
            $request->file('file_pendukung')->move('images/',$file_file_pendukung);
            $kendala_detail->file_pendukung = $file_file_pendukung;
            $kendala_detail->save();
        }

        return redirect ('kendala/'.$kendalaid.'/detail')->with('sukses', 'Data berhasil diupdate');
    }

    public function komentar_delete(Request $request, $kendalaid, $detailid)
    {
        $kendala = \App\Models\Kendala::find($kendalaid);
        $kendala_detail = \App\Models\Kendala_detail::find($detailid);
        $kendala_detail->delete($kendala_detail);

        return redirect('kendala/'.$kendalaid.'/detail')->with('sukses', 'Data berhasil dihapus');
    }

    public function sendEmail(Request $request, $id)
    {
        //Siapkan data
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $email_body = $request->email_body;
        
        $data = array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'email_body' => $email_body
        );

        //$email_admin = \App\Models\Email_admin::where('id',1)->get();

        //Kirim email
        //$email_admin = \App\Models\Email_admin::all();
        \Mail::send('email_template', $data, function($mail) use($email, $name, $subject){
            $mail->to($email, 'no-reply')
                ->subject($subject, 'no-reply');
            $mail->from($email, $name);
        });

        return redirect ('kendala/'.$id.'/detail')->with('sukses', 'Email berhasil dikirim!');
    }

}
