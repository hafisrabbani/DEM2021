@extends('login.main')

@section('title')
    Register Page
@endsection

@section('main')
    
    <div class="">
        <h1 class="pt-5 mt-2 text-center text-white">Register</h1>
    </div>
    <div class="container fixed-bottom bg-white" style="min-height:70%;border-radius: 20px 20px 0 0">
        <div class="row justify-content-center">
            <div class="col-12 mt-3">
                <form method="POST" action="/register">
                    @csrf
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username">
                      @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                      @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                      @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                  </form>
                  <p class="text-center mt-5">Sudah Punya Akun? <a href="/login">Login</a></p>
            </div>
        </div>
        <small class="fixed-bottom text-center mb-5">&copy; 2021 | EmcorpStudio</small>
    </div>

@endsection