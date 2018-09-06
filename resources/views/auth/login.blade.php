@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header text-center">Login om een boek te kunnen lenen!</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" class="col-lg-8 d-flex flex-column align-items-center mt-0 mb-0 mr-auto ml-auto">
                            @csrf

                            <input id="email" type="email"
                                   placeholder="Email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} text-center"
                                   name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            <input id="password" type="password"
                                   placeholder="Wachtwoord"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} text-center mt-4"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback mt-4" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                            <button type="submit" class="btn btn-primary mt-4">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
