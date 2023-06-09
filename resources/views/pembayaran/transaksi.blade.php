@extends('main.bootstrap')
@section('content')
<div class="text-center py-5 bg-dark text-white">
    <h3>Transaksi Spp</h3>
</div>
<div class="container mt-4">
    <div class="d-flex justify-content-center text-center">
        <div class="crad text-bg-success ms-5 me-5 w-100">
            <div class="card-header">
                <b>Total Dibayar</b>
            </div>
        </div>
        <div class="card-body">
            <h3>Rp. {{ $total ['total_dibayar'] }}</h3>
        </div>
        <div>

            <div class="card text-bg-danger me-5 ms-5 w-100">
                <div class="card-header">
                    <b>Total Belum Dibayar</b>
                </div>
            </div>
            <div class="card-body">
                <h3>Rp. {{ $total ['total_belomdibayar']}}</h3>
            </div>
        </div>
        <hr>
        @if (Session::has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ Session::get('sukses') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @else (Session::has('gagal'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ Session::get('gagal') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h4>Transaksi Spp</h4>
            </div>
        </div>
        <div class="d-flex justify-content-center text-center">
            <div class="me-2"><b>NIS : {{ $siswa->nis }}</b></div>
            <div class="me-2"><b>Nama : {{ $siswa->user->name }}</b></div>
            <div><b>Kelas : {{ $siswa->kelas->kelas }}</b></div>
        </div>
        <div>
            <a href="{{ url('pembayaran')}}" class="btn btn-warning">Kembali</a>
            <button type="button" class="btn btn-primary" data-bs-tonggle="modal" data-bs-target="#exampleModal">Tambah</button>
        </div>
    </div>
    <hr>
    <div class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>Spp</th>
                <th>Jumlah Bayar</th>
                <th>Kelolah</th>
            </tr>
        </thead>
        <tbody>
            @if ($pembayaran->count() == 0)
            <tr class="text-center">
                <td colspan="6"><strong>Belom ada transaksi.</strong></td>
            </tr>
            @else
            @foreach ($pembayaran as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->user->name}}</td>
                <td>{{$data->tanggal_bayar}}</td>
                <td>{{$data-spp->tahun}}</td>
                <td>{{ 'Rp.' .$data->nominal}}</td>
                <td>
                    <a href="{{ url("/pembayaran/hapus/$data->id") }}" class="btn btn-danger">Hapus</a>
                    <a href="{{ url("/pembayaran/hapus/$data->id") }}" class="btn btn-danger">Edit</a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title fs-5" id="exampleModalLabel">Tambah Transaksi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('pembayaran/simpan') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                        <div class="form-group mt-2">
                            <label for="siswa">Petugas</label>
                            <input type="text" name="petugas" id="petugas" value="{{ auth()->user()->name }}" readonly >
                            <div class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="siswa">siswa</label>
                                <input type="text" name="siswa" id="siswa" readonly value="{{ $siswa->user->name }}" class="form-control">
                            </div>
                            <div class="form-group mt-2">
                                <label for="spp_id">SPP</label>
                                <select name="spp_id" id="spp_id" class="form-select"> required>
                                    <option value="" disabled selected>-Pilih SPP-</option>
                                    @foreach ($spp as $data )
                                    @php
                                        $kurang = $data->nominal - $pembayaranSpp[$loop->iteration - 1];
                                        $kurang = "(Rp. $kurang)";
                                    @endphp
                                    <option value="{{ $data->id }}">
                                        {{ $pembayaranSpp->[$loop->iteration - 1] >= $data->nominal ? 'disable' : '' }}>
                                        {{ $data->tahun . '- Rp.' .$data->nominal }}
                                        {{ $pembayaranSpp[$loop->interation - 1] >= $data->nominal ? '(LUNAS)' : $kurangnya }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label for="tanggal_bayar">Tanggal</label>
                                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" required>
                            </div>


                            <div class="form-group mt-2">
                                <label for="jumlah_bayar">jumlah bayar</label>
                                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
