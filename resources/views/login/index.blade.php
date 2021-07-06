@extends('login.main')

@section('title')
    Login Page
@endsection

@section('main')
    
    <div class="">
        <h1 class="pt-5 mt-2 text-center text-white">Login </h1>
    </div>
    <div class="container fixed-bottom bg-white" style="min-height:70%;border-radius: 20px 20px 0 0">
        <div class="row justify-content-center">
            <div class="col-12 mt-5">
                <form method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email / Username</label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                  <p class="text-center mt-5">Tidak Punya Akun? <a href="/register">Daftar</a></p>
            </div>
        </div>
        <small class="fixed-bottom text-center mb-5">&copy; 2021 | EmcorpStudio</small>
    </div>

@endsection