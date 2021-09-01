@extends('auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <h1>Register</h1>
                        <p class="text-muted">Create your account</p>
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="icon-user"></i></span></div>
                                <input name="name" class="form-control" type="text" placeholder="Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="icon-user"></i></span></div>
                                <input name="username" class="form-control" type="text" placeholder="Username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                <input name="email" class="form-control" type="text" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="icon-lock"></i></span></div>
                                <input name="password" class="form-control" type="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                            class="icon-lock"></i></span></div>
                                <input name="password_confirmation" class="form-control" type="password" placeholder="Repeat password">
                            </div>
                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                        </form>
                    </div>
                    <div class="card-footer p-4">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-facebook" type="button"><span>facebook</span></button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-twitter" type="button"><span>twitter</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
