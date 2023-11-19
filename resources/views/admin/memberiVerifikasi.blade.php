@extends('layouts.links')

<form action="" method="POST">
    @csrf
    <section class="container mt-4">
        <h1 class="text-center mb-4">Tanggapi Laporan Pengaduan Masyarakat</h1>
        <div class="form-outline mb-3">
            <textarea disabled class="form-control" id="textAreaExample" rows="4" name="isi_laporan">{{ $result->isi_laporan }}</textarea>
            <label class="form-label" for="textAreaExample">Laporan Pengaduan</label>
        {{-- </div>
        <div class="form-outline mb-3">
            <textarea disabled class="form-control" id="textAreaExample" rows="4" name="tanggapan"></textarea>
            <label class="form-label" for="textAreaExample">Tanggapan</label>
        </div> --}}
        <div class="form-outline mb-3">
            <label class="form-label" for="status">Status</label>
            <select name="status" id="status" style="border: 1px rgb(187, 187, 187) solid;" class="form-control" name="status">
                <option value="0" {{ $result->status == '0' ? 'selected' : '' }}>0</option>
                <option value="proses" {{ $result->status == 'proses' ? 'selected' : '' }}>proses</option>
                <option value="selesai" {{ $result->status == 'selesai' ? 'selected' : '' }}>selesai</option>
                <option value="dibatalkan" {{ $result->status == 'dibatalkan' ? 'selected' : '' }}>dibatalkan</option>
            </select>
        </div>        
        <button class="btn btn-success mt-3" type="submit" name="submit">verifikasi</button>
        <button class="btn btn-danger mt-3" type="button" onclick="redirectToDetailLaporan()">Batalkan</button>
    </section>
</form>

<script>
    function redirectToDetailLaporan() {
        window.location.href = '/tanggapanAdmin';
    }
</script>