@extends('auth.main')

@section('content')
    <div class="container">
        <h1 class="mt-3">Posts</h1>
        <div class="row">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 custom-card">
                        <div class="card mt-3">
                            <div class="card-header">{{strlen($post->title) > 35 ? substr($post->title, 0 , 35) . '...' : $post->title}}</div>
                            <div class="card-body">
                                {{strlen($post->description) > 300 ? substr($post->description, 0 , 300) . '...' : $post->description}}
                            </div>
                            <div class="card-footer"><a href="{{ route('show.post.details', [$post->website->id, $post->id]) }}" class="btn btn-primary">Show more</a></div>
                        </div>
                    </div>
                @endforeach
            @else
                There is no posts for this website to show yet
            @endif
        </div>

    </div>
@endsection
