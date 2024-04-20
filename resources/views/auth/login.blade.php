@extends('layouts.app')

@section('content')
<div class="container-fluid container-lg">
    <div class="row justify-content-center bg_login">
        <div class="mx-1 col-md-8 view_container_login ">
            <div class="card mt-3 mt-lg-5 bg_trasp py-lg-5 rounded-3 ">


                <div class="card-body  rounded-3 p-0 ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <div class="px-3 px-lg-5 mb-4 row d-flex flex-column text_orange_color">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-3 px-lg-5 mb-4 row d-flex flex-column text_orange_color">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class=" px-3 px-lg-5">
                            <div class="d-flex flex-column align-items-center">
                                <button  type="submit" class="button_login btn text-light w-100">
                                    {{ __('Login') }}
                                </button>

                                <div class="mb-1 mt-4">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-light" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
