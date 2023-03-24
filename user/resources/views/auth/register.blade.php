@extends('layouts.app')

@section('content')


    <div class="container ">
        
        
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Number') }}</label>

                                <div class="col-md-6">
                                    <input id="number" type="text"
                                        class="form-control @error('number') is-invalid @enderror" name="number"
                                      required >

                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Supervisor Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('supervisor_email') is-invalid @enderror"
                                        name="supervisor_email" value="{{ old('supervisor_email') }}" required
                                        autocomplete="supervisor_email">

                                    @error('supervisor_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="department"
                                    class="col-md-4 col-form-label text-md-end">{{ __('department') }}</label>

                                <div class="col-md-6">
                                    <select id="department" type="name"
                                        class="form-control @error('department') is-invalid @enderror" name="department"
                                        value="{{ old('department') }}" required autocomplete="department">
                                        <option>-------HEAD OFFICE---------</option>
                                        <option style="text-transform:lowercase" value="h-ACCOUNTS">ACCOUNTS
                                        </option>
                                        <option style="text-transform:lowercase" value="h-ADMINISTRATION">ADMINISTRATION
                                        </option>
                                        <option style="text-transform:lowercase" value="h-ADVERTISING">ADVERTISING
                                        </option>
                                        <option style="text-transform:lowercase" value="h-BUSINESS WEEKLY">BUSINESS WEEKLY
                                        </option>
                                        <option style="text-transform:lowercase" value="h-CIRCULATION">CIRCULATION
                                        </option>
                                        <option style="text-transform:lowercase" value="h-DIGITAL">DIGITAL
                                        </option>
                                        <option style="text-transform:lowercase" value="h-GMS">GMS
                                        </option>
                                        <option style="text-transform:lowercase" value="h-HERALD">HERALD
                                        </option>
                                        <option style="text-transform:lowercase" value="h-H-METRO">H-METRO
                                        </option>
                                        <option style="text-transform:lowercase" value="h-HUMAN RESOURCES">HUMAN RESOURCES
                                        </option>
                                        <option style="text-transform:lowercase" value="h-IT">IT
                                        </option>
                                        <option style="text-transform:lowercase" value="h-KNOWLEDGE CENTRE">KNOWLEDGE CENTRE
                                        </option>
                                        <option style="text-transform:lowercase" value="h-KWAYEDZA">KWAYEDZA
                                        </option>
                                        <option style="text-transform:lowercase" value="h-PHOTOGRAPHIC">PHOTOGRAPHIC
                                        </option>
                                        <option style="text-transform:lowercase" value="h-PRODUCTION">PRODUCTION
                                        </option>
                                        <option style="text-transform:lowercase" value="h-SECURITY">SECURITY
                                        </option>
                                        <option style="text-transform:lowercase" value="h-SUBS">SUBS
                                        </option>
                                        <option style="text-transform:lowercase" value="h-SUBURBAN">SUBURBAN
                                        </option>
                                        <option style="text-transform:lowercase" value="h-SUNDAY MAIL">SUNDAY MAIL
                                        </option>
                                        <option style="text-transform:lowercase" value="h-TECHNICAL">TECHNICAL
                                        </option>
                                        <option style="text-transform:lowercase" value="h-TRANSPORT">TRANSPORT

                                        </option>
                                        <option>------NATPRINT-------</option>

                                        <option>--------BULAWAYO---------</option>
                                        <option style="text-transform:lowercase" value="b-ACCOUNTS">ACCOUNTS
                                        </option>
                                        <option style="text-transform:lowercase" value="b-ADMINISTRATION">ADMINISTRATION
                                        </option>
                                        <option style="text-transform:lowercase" value="b-ADVERTISING">ADVERTISING
                                        </option>
                                        <option style="text-transform:lowercase" value="b-BUSINESS WEEKLY">BUSINESS WEEKLY
                                        </option>
                                        <option style="text-transform:lowercase" value="b-CIRCULATION">CIRCULATION
                                        </option>
                                        <option style="text-transform:lowercase" value="b-DIGITAL">DIGITAL
                                        </option>
                                        <option style="text-transform:lowercase" value="b-GMS">GMS
                                        </option>
                                        <option style="text-transform:lowercase" value="b-HERALD">HERALD
                                        </option>
                                        <option style="text-transform:lowercase" value="b-H-METRO">H-METRO
                                        </option>
                                        <option style="text-transform:lowercase" value="b-HUMAN RESOURCES">HUMAN RESOURCES
                                        </option>
                                        <option style="text-transform:lowercase" value="b-IT">IT
                                        </option>
                                        <option style="text-transform:lowercase" value="b-KNOWLEDGE CENTRE">KNOWLEDGE CENTRE
                                        </option>
                                        <option style="text-transform:lowercase" value="b-KWAYEDZA">KWAYEDZA
                                        </option>
                                        <option style="text-transform:lowercase" value="b-PHOTOGRAPHIC">PHOTOGRAPHIC
                                        </option>
                                        <option style="text-transform:lowercase" value="b-PRODUCTION">PRODUCTION
                                        </option>
                                        <option style="text-transform:lowercase" value="b-SECURITY">SECURITY
                                        </option>
                                        <option style="text-transform:lowercase" value="b-SUBS">SUBS
                                        </option>
                                        <option style="text-transform:lowercase" value="b-SUBURBAN">SUBURBAN
                                        </option>
                                        <option style="text-transform:lowercase" value="b-SUNDAY MAIL">SUNDAY MAIL
                                        </option>
                                        <option style="text-transform:lowercase" value="b-TECHNICAL">TECHNICAL
                                        </option>
                                        <option style="text-transform:lowercase" value="b-TRANSPORT">TRANSPORT

                                        </option>
                                        <option>--------MUTARE--------</option>
                                    </select>
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
