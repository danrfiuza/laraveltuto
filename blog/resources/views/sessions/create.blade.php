@extends('layouts.master')
@section('content')
<div class="col-md-8">
    <h1>Sign In</h1>
    <form action="/login" method="POST">
        {{csrf_field()}}
        <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button class="btn btn-primary">Log In</button>
    </form>
    @include('layouts.errors')
</div>
@endsection