@extends('layouts.navAdmin')

@section('content')
<section class="container mt-4">
  <h1 class="text-center mb-4">Detail Laporan Admin</h1>
  <table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Pelapor</th>
        <th>Nik</th>
        <th>Laporan</th>
        <th>Foto</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($results as $result)
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
            <div class="ms-3">
              <p class="fw-bold mb-1">{{ $result->username }}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $result->nik }}</p>
        </td>
        <td>
          <p class="fw-normal mb-1">{{ $result->isi_laporan }}</p>
        </td>
        <td>
          <img width="100" src='{{asset("storage/img/$result->foto")}}' />
        </td>
        <td>
          <span class="badge badge-success rounded-pill d-inline">{{ $result->status }}</span>
        </td>
        <td>
          <a href="/detailLaporanAdmin/detailAdmin/{{ $result->id_pengaduan }}">
            <button type="button" class="btn btn-link btn-sm btn-rounded">Detail</button>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>