@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                </div>
                <br>
                <a class="btn btn-primary" href="{{route('create')}}">Create Post</a>
                <br><br>
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
                                <td>
                                    {!!Form::open(['action' => ['PostControler@destroy', $post->id], 'method' =>'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                    <a href="{{route('posts.edit',['id' =>$post->id])}}" class="btn btn-primary float-right">Edit</a>                    
                                    <a href="{{ route('posts.show',['id'=>$post->id])}}"class="btn btn-primary float-right">Show</a>
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
