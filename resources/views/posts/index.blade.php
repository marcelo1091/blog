@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                    <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img style="width: 50%;" src="{{asset('/../storage/app/public/cover_images')}}/{{$post->cover_image}}">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h3><a href="{{'posts'}}/{{$post->id}}">{{$post->title}}</a></h3>
                                <small>Writen on {{$post->created_at}} by {{$post->user->name}}</small>
                            </div>
                        </div>
            </div>  
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No Posts Founded</p>
    @endif
@endsection