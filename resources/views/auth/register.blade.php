@extends('layouts.app')

@section('content')
<div class="container-fluid px-0 overflow-hidden" id="main_login">
    <span class="contenuto_fix d-none d-lg-block">.</span>
    <div class="pb-0 row mt-lg-5 justify-content-center bg_register rotondo h-100 h-lg-auto  overflow-lg-scroll overflow-x-hidden container-fluid container-lg mx-auto">
        <div class="col-md-8 px-0 px-sm-2">
            <div class="card bg_trasp text_orange_color">
                <div class="card-body px-0 px-sm-2 overflow-lg-scroll mb-5">
                    <form method="POST" action="{{ route('register') }}" class="d-flex flex-column justify-content-center pt-2">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            {{-- input Nome Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="name" class="col-lg-6 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Inserisci Nome" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Cognome Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="surname" class="col-md-6 col-form-label text-md-right">{{ __('Surname') }}</label>

                                <div class="">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" placeholder="Inserisci Cognome" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Email Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Inserisci Email" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Password Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Inserisci Password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Conferma Password Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Ripeti Password" autocomplete="new-password">
                                </div>
                            </div>

                            {{-- input Nome Ristorante --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="activity_name" class="col-md-6 col-form-label text-md-right">{{ __('Activity Name') }}</label>

                                <div class="">
                                    <input id="activity_name" type="text" class="form-control @error('activity_name') is-invalid @enderror" name="activity_name" value="{{ old('activity_name') }}" required autocomplete="activity_name" placeholder="Inserisci Nome Attività" autofocus>

                                    @error('activity_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Tipololgie Ristorante (many to many) --}}
                            <div class="mb-3 row d-flex flex-column col-lg-6 px-4">
                                <label for="typologies" class="form-label">{{ __('Typologies') }}</label>
                                <select
                                    multiple
                                    class="form-select form-select-lg "
                                    name="typologies[]"
                                    id="typologies"
                                >
                                @foreach ($typologies as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            {{-- input Indirizzo Ristorante --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="address" class="col-md-6 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Inserisci Indirizzo Attività" autofocus>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input P.IVA Ristorante --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="piva" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva') }}</label>

                                <div class="">
                                    <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror" name="piva" value="{{ old('piva') }}" required placeholder="Inserisci Partita Iva" autocomplete="piva" autofocus>

                                    @error('piva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Immagine Ristorante - Ancora da ultimare --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>

                                <div class="">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 row mb-0">
                            <div>
                                <button type="submit" class="w-100 btn button_register text-light">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
