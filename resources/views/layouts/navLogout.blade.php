@extends('layouts.links')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengaduan Masyarakat</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-secondary-subtle">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">MRHS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/laporan">Laporan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/detailLaporan">Detail Laporan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/tanggapan">Tanggapan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/verifikasi">Verifikasi</a>
              </li>
            </ul>
              <a href="/logout"><button class="btn btn-outline-danger">Logout</button></a>
          </div>
        </div>
      </nav>
      @yield('content')
</body>
</html>