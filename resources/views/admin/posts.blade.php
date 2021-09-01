@extends('layouts.main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="container">
        <h1 class="mt-3">Posts</h1>
        <div class="row">
            <div class="col-12">
                <a href="" class="btn btn-primary" data-toggle="modal"
                   data-target="#createPost">Create Post</a>
            </div>
        </div>
        <div class="row">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="col-12 custom-card">
                        <div class="card mt-3">
                            <div class="card-header">{{$post->title}}</div>
                            <div class="card-body">
                                <b>{{$post->description}}</b>
                                <hr>
                                {{ $post->content }}
                            </div>
                            <div class="card-footer">
                                <span class="btn btn-danger pointer" data-toggle="modal"
                                     data-target="#deletePost{{$post->id}}"><i
                                        class="la la-trash la-lg"></i>
                                </span>
                                <span class="btn btn-primary pointer" data-toggle="modal"
                                     data-target="#editPost{{$post->id}}"><i class="la la-edit la-lg"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deletePost{{$post->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-danger" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete {{ $post->name }}</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this post?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close
                                    </button>
                                    <a class="btn btn-danger" type="button" href="{{ route('admin.website.post.destroy', $post->id) }}">Delete</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal fade" id="editPost{{$post->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-primary modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit {{ $post->title }}</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editPostsForm{{$post->id}}" method="POST" action="{{ route('admin.website.post.edit', $post->id) }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" required name="title" class="form-control" value="{{ $post->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" required cols="10" rows="4" class="form-control">{{ $post->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea name="content" required cols="10" rows="7" class="form-control">{{ $post->content }}</textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close
                                    </button>
                                    <a class="btn btn-primary" type="button" href="#" onclick="event.preventDefault(); $('#editPostsForm{{$post->id}}').submit();">Update</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                There is no posts for this website to show yet
            @endif
        </div>

        <div class="modal fade" id="createPost" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Post</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form id="createPostForm" method="POST" action="{{ route('admin.website.post.create') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="website_id" value="{{ $websiteId }}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" required name="title" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" required cols="10" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" required cols="10" rows="7" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close
                        </button>
                        <a class="btn btn-primary" type="button" href="#" onclick="event.preventDefault(); $('#createPostForm').submit();">Create</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
