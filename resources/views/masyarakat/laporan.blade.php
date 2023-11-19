@extends('layouts.navLogout')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="container mt-4">
            <h1 class="text-center mb-4">Laporan Pengaduan Masyarakat</h1>
            <div class="form-outline mb-3">
                <textarea class="form-control" id="textAreaExample" rows="4" name="isi_laporan"></textarea>
                <label class="form-label" for="textAreaExample">Laporan Pengaduan</label>
                @error('isi_laporan')
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Peringatan!!!',
                        text: 'Silahkan tulis laporan terlebih dahulu',
                        })
                    </script>
                @enderror
            </div>
            <div class="form-outline">
                <input type="file" id="typeText" class="form-control" name="foto" />
                @error('foto')
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Peringatan!!!',
                        text: 'Silahkan masukan bukti foto terlebih dahulu',
                        })
                    </script>
                @enderror
            </div>
            <button class="btn btn-success mt-3" type="submit" name="submit">Laporkan</button>
            <button class="btn btn-danger mt-3" type="reset">Batalkan</button>
        </section>
    </form>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>