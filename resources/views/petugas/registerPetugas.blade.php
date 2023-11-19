@extends('layouts.links')

<section class="container mt-4">
  <div class="login position-absolute top-50 start-50 translate-middle">
    <h1 class="text-center mb-4">Tambahkah Petugas</h1>
    @if (session("success"))
      <p class="alert alert-success mt-5">{{ session("success") }}</p>
    @endif
    @if (session("error"))
      <p class="alert alert-danger mt-5">{{ session("error") }}</p>
    @endif
  <form method="POST" action="">
    @csrf
  <div class="form-outline mb-4">
    <input type="text" id="form2Example1" class="form-control" name="nama_petugas" required />
    <label class="form-label" for="form2Example1">Name</label>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="form2Example2" class="form-control" name="username" required />
    <label class="form-label" for="form2Example2">Username</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="password" required />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="form2Example2" class="form-control" name="tlp" required />
    <label class="form-label" for="form2Example2">Phone Number</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4">Tambahkan</button>
  <a href="/home"><button type="button" class="btn btn-danger btn-block mb-4">Kembali</button></a>
</form>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>