@extends('layouts.app')

@section('title', 'DeliveBoo | Login')

@section('content')
<div class="container-fluid px-0 over" id="main_login">
    <span class="contenuto_fix d-none d-lg-block">.</span>
    <div class="mt-lg-5 pb-5  px-0 px-lg-1 row justify-content-center bg_login rotondo container-fluid container-lg mx-auto  overflow-auto">
        <div class="mx-lg-1 px-0 px-lg-1 col-md-8 view_container_login ">
            <div class="card mt-3 mt-lg-5 bg_trasp py-lg-5 rounded-3 ">
                <div class="card-body  rounded-3 p-0 ">
                    <form id="login-form" method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div>
                            <div class="px-3 px-lg-5 mb-4 row d-flex flex-column text_orange_color">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" autofocus required>
                                    <div id="emailError" class="d-none text-white" role="alert"></div>
                                    @error('email')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="px-3 px-lg-5 mb-4 row d-flex flex-column text_orange_color">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="position-relative">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">
                                    <div id="visible" class="position-absolute" style="cursor: pointer">Mostra</div>
                                    <div id="passwordError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class=" px-3 px-lg-5">
                            <div class="d-flex flex-column align-items-center">
                                <button id="submitBtn" type="submit" class="button_login btn text-light w-100">
                                    {{ __('Accedi') }}
                                </button>

                                <div class="mb-1 mt-4">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-light" for="remember">
                                                {{ __('Ricordami') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
