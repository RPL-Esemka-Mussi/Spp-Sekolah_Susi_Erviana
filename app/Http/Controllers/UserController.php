<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users') );
    }

    public function tambah()
    {
        return view('user.tambah');
    }

    public function simpan(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'Level' => $request->Level,
            ]);

            return redirect('user')->with('sukses', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect('user')->with('gagal', 'Data gagal ditambahkan.');
        }
    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);

            return view('user.edit', compact('user'));
        } catch (\Exception $e) {
            return redirect('user')->with('gagal', 'Data gagal ditambahkan.');
        }
    }

    public function update(Request $request)
    {
        try {
           if ($request->password != null) {
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'level' => $request->level,
                ]);
           } else {
            User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $request->level,
            ]);
           }

           return redirect('user')->with('sukses', 'Data berhasil diupdate.');
        }catch (\Exception $e) {
            return redirect('user')->with('gagal', 'Data gagal diupdate.');
        }
    }

    public function hapus($id)
    {
        try{
            User::findOrfail($id);
            User::destroy($id);

            return redirect('user')->with('sukses', 'Data berhasil diupdate.');
        }catch (\Exception $e) {
            $massage = $e->getMessage();
            return redirect('user')->with('gagal', 'Data berhasil diupdate.' . "($message)");
        }

    }
}


?>
