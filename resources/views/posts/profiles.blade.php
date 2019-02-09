@extends('layouts.app')

@section('content')
<h1>Profil Użytkownika: {{ $user->name }}</h1>
@if(count($posts)>0)
@foreach ($posts as $post)
<div class="card card-body bg-light">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <img style="width: 50%;" src="{{asset('/../storage/app/public/cover_images')}}/{{$post->cover_image}}">
        </div>
        <div class="col-md-8 col-sm-8">
            <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{$post->title}}</a></h3>
            <small>Writen on {{$post->created_at}}</small>
        </div>
    </div>
</div>

@endforeach
{{$posts->links('vendor.pagination.bootstrap-4')}}
@else
<p>No Posts Founded</p>
@endif
@endsection