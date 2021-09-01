@extends('auth.main')

@section('content')
    <div class="container">
        <div class="row">

                    <div class="col-12">
                        <div class="card mt-5">
                            <div class="card-header">{{$post->title}}</div>
                            <div class="card-body">
                                <b>{{$post->description}}</b>
                                <hr>
                                {{ $post->content }}
                            </div>
                            <div class="card-footer"><a href="" class="btn btn-danger">Subscribe</a></div>
                        </div>
                    </div>
        </div>

    </div>
@endsection
