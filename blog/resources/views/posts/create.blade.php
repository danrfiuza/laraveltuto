@extends('layouts.master')
@section('content')
<h3 class="pb-3 mb-4 font-italic border-bottom">
    Create a Post
</h3>

<form method="post" action="/posts">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : 'is-valid' }}" id="title" aria-describedby="emailHelp" placeholder="Enter Title" name="title">
        <small id="emailHelp" class="form-text text-muted">{{ $errors->has('title') ? $errors->first('title') : 'Looks Good' }}</small>
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <input type="text" class="form-control" id="body" placeholder="body" name="body">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection