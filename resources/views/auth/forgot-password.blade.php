@extends('auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Password reset</h1>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                            @endif
                            <form method="POST" action="{{route('password.request')}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="icon-user"></i></span></div>
                                    <input name="email" class="form-control" type="email" placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                                <a href="{{route('register')}}" class="btn btn-primary active mt-3" type="button">Register
                                    Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
