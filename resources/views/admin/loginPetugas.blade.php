@extends('layouts.links')

<section class="container mt-4">
  <div class="login position-absolute top-50 start-50 translate-middle">
    <h1 class="text-center mb-4">Login Petugas</h1>
    @if (session("error"))
      <p class="alert alert-danger mt-5">{{ session("error") }}</p>
    @endif
    <form method="POST">
      @csrf
      <div class="form-outline mb-4">
        <input type="text" id="form2Example1" class="form-control" name="username" />
        <label class="form-label" for="form2Example1">Username</label>
      </div>
    
      <div class="form-outline mb-4">
        <input type="password" id="form2Example2" class="form-control" name="password" />
        <label class="form-label" for="form2Example2">Password</label>
      </div>
    
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
    
      <div class="text-center">
        <p>Not a member? <a href="/registerPetugas">Register</a></p>
        <p>or sign up with:</p>
        <button type="button" class="btn btn-secondary btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>
    
        <button type="button" class="btn btn-secondary btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>
    
        <button type="button" class="btn btn-secondary btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>
    
        <button type="button" class="btn btn-secondary btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>
    </form>
  </div>
</section>