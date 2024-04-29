@extends('layouts.app')

@section('title', 'DeliveBoo | Register')

@section('content')
<div class="container-fluid px-0 overflow-hidden" id="main_login">
    <span class="contenuto_fix d-none d-lg-block">.</span>
    <div class="pb-0 row mt-lg-5 justify-content-center bg_register rotondo h-100 h-lg-auto  overflow-lg-scroll overflow-x-hidden container-fluid container-lg mx-auto">
        <div class="col-md-8 px-0 px-sm-2">
            <div class="card bg_trasp text_orange_color">
                <div class="card-body px-0 px-sm-2 overflow-lg-scroll mb-5">
                    <form id="register-form" method="POST" action="{{ route('register') }}" class="d-flex flex-column justify-content-center pt-2" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row d-flex justify-content-center">
                            {{-- input Nome Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="name" class="col-lg-6 col-form-label text-md-right">{{ __('Nome') }}<span class="text-danger"> *</span></label>

                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" required placeholder="Inserisci Nome" autofocus>
                                    <div id="nameError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('name')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Cognome Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="surname" class="col-md-6 col-form-label text-md-right">{{ __('Cognome') }}<span class="text-danger"> *</span></label>

                                <div class="">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="off" placeholder="Inserisci Cognome" autofocus required>
                                    <div id="surnameError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('surname')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Email Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}<span class="text-danger"> *</span></label>

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Inserisci Email" autocomplete="off" required>
                                    <div id="emailError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('email')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Password Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <div>
                                    <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}<span class="text-danger"> *</span></label>
                                    <div id="rule">
                                        <ul class="mb-0 pb-1">
                                            <li id="speciale">Inserisci un carattere speciale(@!#/)</li>
                                            <li id="maiuscolo">Inserisci almeno un carattere maiuscolo</li>
                                            <li id="lung">Inserisci almeno 8 carateri</li>
                                            <li id="numero">Inserisci almeno un numero</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Inserisci Password" autocomplete="off" required>
                                    <div id="visible" class="position-absolute" style="cursor: pointer">Mostra</div>
                                    <div id="passwordError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('password')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            {{-- input Conferma Password Utente --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Ripeti password') }}<span class="text-danger"> *</span></label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ripeti Password" autocomplete="off" required>
                                    <div id="passwordConfirmError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                </div>
                            </div>

                            {{-- input Nome Ristorante --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="activity_name" class="col-md-12 col-form-label text-md-right">{{ __('Nome del ristorante') }}<span class="text-danger"> *</span></label>

                                <div class="">
                                    <input id="activity_name" type="text" class="form-control @error('activity_name') is-invalid @enderror" name="activity_name" value="{{ old('activity_name') }}" autocomplete="off" placeholder="Inserisci Nome Attività" autofocus required>
                                    <div id="activityNameError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('activity_name')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Tipololgie Ristorante (many to many) --}}
                            <div class="mb-3 row d-flex flex-column col-lg-6 px-4">
                                <label for="typologies" class="form-label">{{ __('Tipologie') }}<span class="text-danger"> *</span></label>
                                <select
                                    multiple
                                    class="form-select form-select-lg "
                                    name="typologies[]"
                                    id="typologies"
                                    required
                                >
                                @foreach ($typologies as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                                </select>
                                <div id="typologiesError" class="d-none text-danger" role="alert"></div>
                            </div>

                            {{-- input Indirizzo Ristorante --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="address" class="col-md-12 col-form-label text-md-right">{{ __('Indirizzo del ristorante') }}<span class="text-danger"> *</span></label>

                                <div class="">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="off" placeholder="Inserisci Indirizzo Attività" autofocus required>
                                    <div id="addressError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('address')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- input P.IVA Ristorante --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="piva" class="col-md-12 col-form-label text-md-right">{{ __('Partita Iva') }}<span class="text-danger"> *</span></label>

                                <div class="">
                                    <input id="piva" type="text" class="form-control @error('piva') is-invalid @enderror" name="piva" value="{{ old('piva') }}" placeholder="Inserisci Partita Iva" autocomplete="off" autofocus maxlength="11" required>
                                    <div id="pivaError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('piva')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- input Immagine Ristorante - Ancora da ultimare --}}
                            <div class="mb-4 row d-flex flex-column col-lg-6">
                                <label for="image" class="col-md-12 col-form-label text-md-right">{{ __('Immagine') }}<span class="text-danger"> *</span></label>

                                <div class="">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="off" autofocus required>
                                    <div id="imageError" class="d-none bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert"></div>
                                    @error('image')
                                    <div class="bg-danger text-white rounded-pill fit-content px-3 py-1 mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 row mb-0">
                            <div>
                                <button type="submit" class="w-100 btn button_register text-light">
                                    {{ __('Registrati') }}
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


