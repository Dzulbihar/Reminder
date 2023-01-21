<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class Master_userController extends Controller
{

/////////////////// master_user ////////////////////////////////////////

    public function master_user()
    {
        $master_user = \App\Models\User::all();
        
        return view('master_user.index',[
            'master_user' => $master_user,
        ]);
    }

    public function add()
    {
        $master_user = \App\Models\User::all();
        
        return view('master_user.add',[
            'master_user' => $master_user,
        ]);
    }

    public function create(Request $request)
    {
        $password = $request->password;
        // Validasi kekuatan password
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
         
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {

            return redirect ('/master_user/add')->with('sukses', 'Pasword setidaknya harus 8 karakter dan harus memiliki huruf besar, huruf kecil, angka, dan spesial karakter.');

        }else{

            if ($_POST['password']==$_POST['password2'] ) {

                $messages = [
                    'required' => '*kolom wajib diisi ya!!!',
                    'unique' => 'Email sudah terdaftar! silakan ulangi pendaftaran',
                ];
         
                $this->validate($request,[
                    'email' => ['required', 'max:255',Rule::unique('users')->where('email', $request->email)],
                ],$messages);

                $request->request->add(['role' => $request->role ]);
                $request->request->add(['name' => $request->name ]);
                $request->request->add(['email' => $request->email ]);
                $request->request->add(['password' => bcrypt($request->password) ]);

                $user = \App\Models\User::create($request->all());

                return redirect ('/master_user')->with('sukses', 'Pendaftaran berhasil disimpan');

            }else {
                return redirect ('/master_user/add')->with('sukses', 'Password yang Anda Masukan Tidak Sama! Silakan ulangi kembali!');
            }
        }

        \App\Models\User::create($request->all());

        return redirect ('/master_user')->with('sukses', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $master_user = \App\Models\User::find($id);

        return view('master_user.edit', [
            'master_user' => $master_user,
        ]);
    }

    public function update(Request $request ,$id)
    {       
        $master_user = \App\Models\User::find($id);
        $master_user->update($request->all());

        return redirect ('/master_user')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $master_user = \App\Models\User::find($id);
        $master_user->delete($master_user);

        return redirect('/master_user')->with('sukses', 'Data berhasil dihapus');
    }

    public function status($id)
    {
        //lihat data
        $users = \DB::table('users')->where('id',$id)->first();
        //lihat status sekarang
        $status_sekarang = $users->status;
        //kondisi
        if($status_sekarang == '1'){
            \DB::table('users')->where('id',$id)->update([
                'status'=>'0'
            ]);
        }else{
            \DB::table('users')->where('id',$id)->update([
                'status'=>'1'
            ]);
        }
        // \Session::flash('sukses','Status berhasil di update');
        return redirect('/master_user')->with('sukses', 'Data berhasil diupdate');
    }


}
