@extends('layouts.main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary" data-toggle="modal"
                        data-target="#createWebsite">Create website</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <div class="table-responsive" style="overflow: hidden!important;">
                    <table class="table table-striped text-center" id="list_of_blog_posts_table" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($websites as $website)
                            <tr>
                                <td>{{ $website['id'] }}</td>
                                <td>{{strlen($website->name) > 20 ? substr($website->name,0, 20) . ' ...' : $website->name}}</td>
                                <td>
                                    <a href="{{ $website->url }}">{{strlen($website->url) > 30 ? substr($website->url,0, 30) . ' ...' : $website->url}}</a>
                                </td>

                                <td style="display: flex; justify-content: center">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="text-danger pointer"  data-toggle="modal"
                                               data-target="#deleteModal{{$website->id}}"> <i class="la la-trash la-lg"></i></div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-primary pointer" data-toggle="modal"
                                               data-target="#editWebsite{{$website->id}}"> <i class="la la-edit la-lg"></i></div>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{ route('admin.website.post.index', $website->id) }}">Show Posts</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal{{$website->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete {{ $website->name }}</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this website?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close
                                            </button>
                                            <a class="btn btn-danger" type="button" href="{{ route('admin.website.destroy', $website->id) }}">Delete</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal fade" id="editWebsite{{$website->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-primary" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit {{ $website->name }}</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                           <form id="editWebsiteForm{{$website->id}}" method="POST" action="{{ route('admin.website.edit', $website->id) }}">
                                               {!! csrf_field() !!}
                                               <div class="form-group">
                                                   <label>Name</label>
                                                   <input type="text" required name="name" class="form-control" value="{{ $website->name }}">
                                               </div>
                                               <div class="form-group">
                                                   <label>URL</label>
                                                   <input type="text" required name="url" class="form-control" value="{{ $website->url }}">
                                               </div>
                                           </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close
                                            </button>
                                            <a class="btn btn-primary" type="button" href="#" onclick="event.preventDefault(); $('#editWebsiteForm{{$website->id}}').submit();">Update</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createWebsite" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit {{ $website->name }}</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="createWebsiteForm" method="POST" action="{{ route('admin.website.create') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" required name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" required name="url" class="form-control" >
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close
                    </button>
                    <a class="btn btn-primary" type="button" href="#" onclick="event.preventDefault(); $('#createWebsiteForm').submit();">Create</a>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

    <script>
                    $(document).ready(function () {
                        $('#list_of_blog_posts_table').DataTable();
                    });

    </script>
@endsection
