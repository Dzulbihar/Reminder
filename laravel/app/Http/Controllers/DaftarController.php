<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;


class DaftarController extends Controller
{

    public function simpandaftar(Request $request)
    {
        $password = $request->password;
        // Validasi kekuatan password
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
         
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {

            return redirect ('/register')->with('sukses', 'Pasword setidaknya harus 8 karakter dan harus memiliki huruf besar, huruf kecil, angka, dan spesial karakter.');

        }else{
            
            if ($_POST['password']==$_POST['password2'] ) {

                $messages = [
                    'required' => '*kolom wajib diisi ya!!!',
                    'unique' => 'Email sudah terdaftar! silakan ulangi pendaftaran',
                ];
         
                $this->validate($request,[
                    'email' => ['required', 'max:255',Rule::unique('users')->where('email', $request->email)],
                ],$messages);

                $request->request->add(['role' => 'User' ]);
                $request->request->add(['name' => $request->name ]);
                $request->request->add(['email' => $request->email ]);
                $request->request->add(['password' => bcrypt($request->password) ]);

                $user = \App\Models\User::create($request->all());

                return redirect ('/login')->with('sukses', 'Pendaftaran berhasil disimpan');

            }else {
                return redirect ('/register')->with('sukses', 'Password yang Anda Masukan Tidak Sama! Silakan ulangi kembali!');
            }

        }

    }

}