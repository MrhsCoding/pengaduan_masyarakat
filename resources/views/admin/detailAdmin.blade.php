@extends('layouts.links')

<section class="container mt-5 paper">
    <h1 class="text-center">Detail Laporan Pengaduan</h1>
    <div class="mt-5">
        <p>Nama Pelapor: {{ $result->username }}</p>
        <p>NIK Pelapor: {{ $result->nik }}</p>
    </div>
    <div class="laporanPengaduan mt-5">
        <p>Laporan Pengaduan: {{ $result->isi_laporan }}</p>
    </div>
    <div class="fotoLaporan mt-5">
        <h5 class="text-center mb-4">Foto Bukti Kejadian</h5>
        <div class="container">
            <div class="row">
              <div class="col-md">
                <a class="ripple"><img width="100%" alt="example" class="img-fluid rounded" src="{{asset("storage/img/$result->foto")}}" /></a>
              </div>
            </div>
          </div>
    </div>
</section>
<center>
  <a href="/detailLaporanAdmin"><button type="button" class="btn btn-primary mt-4 mb-4">Kembali</button></a>
  <a href="/detailLaporan/print/{{ $result->id_pengaduan }}" target="blank"><button type="button" class="btn btn-primary mt-4 mb-4">print</button></a>
</center>