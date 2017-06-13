@extends('layout')

@section('content')

    <div class="col-sm-8">
        <h1>Login</h1>

        <form action="/login" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>

            @include('partials.errors')
        </form>
    </div>

@endsection