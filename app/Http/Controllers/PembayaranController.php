<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembayaran;
use App\Models\siswa;
use App\Models\spp;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $keyword = null;

        if($request->cari != null){
            $siswa = Siswa::with('user')->whereRelation('user', 'name', 'Like', "%$request->cari%")->orderBy('kelas_id', 'ASC')->get();
            $keyword = $request->cari;
        }else{
            $siswa = Siswa::orderby('kelas_id', 'ASC')->get();
        }

        return view('pembayaran.index', compact('siswa', 'keyword'));

    }

    public function transaksi($id)
    {
        $dibayar=0;
        $tagihan=0;
        try {
            $siswa = Siswa::findOrFail($id)->get();
            $pembayaran = Pembayaran::where('siswa_id', $id)->get();
            $spp = SPP::all();
        }
        catch (\Exception $e)
        {
            return redirect('pembayaran')->with('gagal', 'Data tidak diitemukan');
        }
        return view('pembayaran.bayar', compact('spp', 'pembayaran'));
    }
}
