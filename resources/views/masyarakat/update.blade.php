@extends('layouts.links')

<form action="" method="POST">
    @csrf
    <section class="container mt-4">
        <h1 class="text-center mb-4">Update Laporan Pengaduan Masyarakat</h1>
        <div class="form-outline mb-3">
            <textarea class="form-control" id="textAreaExample" rows="4" name="isi_laporan">{{ $result->isi_laporan }}</textarea>
            <label class="form-label" for="textAreaExample">Laporan Pengaduan</label>
        </div>
        <div class="form-outline">
            <input type="file" id="typeText" class="form-control" name="foto" value="{{ $result->foto }}"/>
        </div>
        <button class="btn btn-success mt-3" type="submit" name="submit">Ubah</button>
        <button class="btn btn-danger mt-3" type="button" onclick="redirectToDetailLaporan()">Batalkan</button>
    </section>
</form>

<script>
    function redirectToDetailLaporan() {
        window.location.href = '/detailLaporan';
    }
</script>