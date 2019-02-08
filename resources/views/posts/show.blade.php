@extends('layouts.app')

@section('content')
    <a href="{{ route ('posts') }}" class="btn btn-primary">Back</a>
    <h1>{{$post->title}}</h1>
        <img style="width: 50%;" src="{{asset('/../storage/app/public/cover_images')}}/{{$post->cover_image}}">
    <div>

        {!!$post->body!!}

    </div> 
    <hr>
    <small>Written on {{ $post->created_at}} by {{$post->user->name}}</small>  
    <hr> 
    @if((!Auth::guest())&&(Auth::user()->id !== $post->id))
        <a href="{{ route ('posts') }}/{{$post->id}}/{{'edit'}}" class="btn btn-primary">Edit</a>
        {!!Form::open(['action' => ['PostControler@destroy', $post->id], 'method' =>'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif

    @endsection
