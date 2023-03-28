<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::all();

        return view('spp.index', compact('spp') );
    }

    public function tambah()
    {
        return view('spp.tambah');
    }

    public function simpan(Request $request)
    {
        try {
            Spp::create([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,

            ]);

            return redirect('spp')->with('sukses', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect('spp')->with('gagal', 'Data gagal ditambahkan.');
        }
    }

    public function edit()
    {
        try {
            $spp = Spp::findOrFail();

            return view('spp.edit', compact('spp'));
        } catch (\Exception $e) {
            return redirect('spp')->with('gagal', 'Data gagal ditambahkan.');
        }
    }

    public function update(Request $request)
    {
        try {
            Spp::where('id', $request->id)->update([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);

            return redirect('spp')->with('sukses', 'Data berhasil diupdate.');
        }catch (\Exception $e) {
            return redirect('spp')->with('gagal', 'Data berhasil diupdate.');
        }
    }

    public function hapus($id)
    {
        try{
            $spp = Spp::firstOrfail($id);

            Spp::destroy($id);

            return redirect('spp')->with('sukses', 'Data berhasil diupdate.');
        }catch (\Exception $e) {
            return redirect('spp')->with('gagal', 'Data berhasil diupdate.');
        }

    }
}


?>

