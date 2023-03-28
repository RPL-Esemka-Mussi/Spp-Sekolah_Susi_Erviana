<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    public function tambah()
    {
        return view('kelas.tambah');
    }

    public function simpan(Request $request)
    {
        try {

            kelas::create([
                'kelas' => $request->kelas,
                'kompotensi_keahlian' => $request->kompotensi_keahlian
            ]);

            return redirect('kelas')->with('sukses', 'Data berhasih ditambahkan');
        } catch (\Exception $e) {
            return redirect('kelas')->with('gagal', 'Data gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        try {
            $kelas = kelas::findOrFail($id);

            return view('kelas.edit', compact('kelas'));
        } catch (\Exception $e) {
            return redirect('kelas')->with('gagal', 'Data tidak ditemukan');
        }
    }

    public function update(Request $request)
    {
        try {
                 Kelas::where('id', $request->id)->update([
                     'kelas' => $request->kelas,
                     'kompotensi_keahlian' => $request->kompotensi_keahlian,
                 ]);


            return redirect('kelas')->with('sukses', 'Data berhasil diupdate.');
         }catch (\Exception $e) {
             return redirect('kelas')->with('gagal', 'Data gagal diupdate.');
         }
    }

    public function hapus($id)
    {
        try {
            $kelas = Kelas::findOrfail($id);

            Kelas::destroy($id);

            return redirect('kelas')->with('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('kelas')->with('gagal', 'Data tidak ditemukan');
        }
    }
}
