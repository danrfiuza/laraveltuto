@extends('layouts.master')
@section('content')
    <div class="col-sm-8 blog-main">
        <h2 class>{{$post->title}}</h2>
        @if(count($post->tags))
            <ul>
                @foreach($post->tags as $tag)
                <li><a href="/posts/tags/{{$tag->name}}">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        @endif
        {{$post->body}}

        <div class="comments">
            <ul class="list-group">
            @foreach($post->comments as $comment)
            <li class="list-group-item">
                <strong>{{$comment->created_at->diffForHumans()}}</strong>
                {{$comment->body}}
            </li>
            @endforeach
            </ul>
        </div>

        <div class="card">
            <div class="card-block">
                <form action="/posts/{{$post->id}}/comments" method="POST" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" id="body-comment" class="form-control" placeholder="Your comment here">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submmit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('layouts.content')