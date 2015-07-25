@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Reset your password</h1>
            <hr>
            <form method="POST" action="/password/email">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Send Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
@stop