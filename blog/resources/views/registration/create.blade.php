@extends('layouts.master')
@section('content')
<div class="col-sm-8">
    <h1>Register</h1>
    <form action="/register" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
    
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        <button class="btn btn-primary" type="submit">Register</button>
        @include('layouts.errors')
    </form>
</div>
@endsection