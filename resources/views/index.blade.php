@extends('auth.main')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <a class="btn btn-primary float-right ml-3" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-primary float-right" href="{{ route('register') }}">Register</a>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">Websites</div>
            <div class="card-body">
                <div class="row">
                    @if(count($websites) > 0)
                        @foreach($websites as $website)
                            <div class="col-10">
                                <a target="_blank" href="{{ route('show.posts', $website->id) }}">{{ $website->name }}</a>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#subscribeModal{{$website->id}}"> Subscribe</button>
                            </div> <br> <br>
                            <div class="modal fade" id="subscribeModal{{$website->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-primary modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Subscribe to {{$website->name}}</h4>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="subscribeForm{{$website->id}}" method="POST" action="{{ route('subscribe', $website->id) }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="website_id" value="{{ $website->id }}">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" required name="email" class="form-control" >
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close
                                            </button>
                                            <a class="btn btn-danger" type="button" href="#" onclick="event.preventDefault(); $('#subscribeForm{{$website->id}}').submit();">Subscribe</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        There is no websites to show yet
                    @endif
                </div>
            </div>
        </div>

@endsection

