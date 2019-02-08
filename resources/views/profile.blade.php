@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                </div>
                <a class="btn btn-primary" href="{{route('create')}}">Create Post</a>
                <h3>Your Blog Post</h3>
                @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <td>Title</td>
                            <td></td>
                            <td></td>
                        </tr> 
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="{{route('edit',['id' =>$post->id])}}" class="btn btn-primary">Edit</td>
                                <td>
                                    {!!Form::open(['action' => ['PostControler@destroy', $post->id], 'method' =>'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr> 
                        @endforeach
                    </table>                   
                @else
                    <p>You have no posts</p>
                @endif   
            </div>
        </div>
    </div>
</div>
@endsection
