@extends('layouts.navLogout')

@section('content')
<section class="container mt-4">
  <h1 class="text-center mb-4">Tanggapan</h1>
  <table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Pelapor</th>
        <th>Laporan</th>
        <th>Tanggal</th>
        <th>Tanggapan</th>
        <th>Perantara</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($results as $result)
      <tr>
        {{-- <td>
          <p class="fw-normal mb-1">{{ $result->id_tanggapan }}</p>
        </td> --}}
        <td>
          <div class="d-flex align-items-center">
            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
            <div class="ms-3">
              <p class="fw-bold mb-1">{{ $result->username }}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $result->isi_laporan }}</p>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $result->tgl_tanggapan }}</p>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $result->tanggapan }}</p>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $result->nama_petugas }}</p>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>