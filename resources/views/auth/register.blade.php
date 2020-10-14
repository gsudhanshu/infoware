@extends('layouts.app')

@section('content')
<div class="container">
    @isset($message)
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endisset
    <div class="row justify-content-center">    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('register.title') }}</div>

                <div class="card-body">
                    @isset($user)
                    <form method="POST" action="{{ route('save') }}">
                    @else
                    <form method="POST" action="{{ route('register') }}">
                    @endisset
                        @csrf

                        @isset($user)
                            <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                        @endisset

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ trans('register.surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" @isset($user) value="{{ $user->surname }}" @else value="{{ old('surname') }}" @endisset autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ trans('register.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" @isset($user) value="{{ $user->name }}" @else value="{{ old('name') }}" @endisset autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="relativesname" class="col-md-4 col-form-label text-md-right">{{ trans('register.relativesname') }}</label>

                            <div class="col-md-6">
                                <input id="relativesname" type="text" class="form-control @error('relativesname') is-invalid @enderror" name="relativesname" @isset($user) value="{{ $user->relatives_name }}" @else value="{{ old('relativesname') }}" @endisset autocomplete="relativesname">

                                @error('relativesname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="aadhar_card_no" class="col-md-4 col-form-label text-md-right">{{ trans('register.aadhar') }}</label>

                            <div class="col-md-6">
                                <input id="aadhar_card_no" type="text" class="form-control @error('aadhar_card_no') is-invalid @enderror" name="aadhar_card_no" @isset($user) value="{{ $user->aadhar_card_no }}" @else value="{{ old('aadhar_card_no') }}" @endisset>

                                @error('aadhar_card_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{ trans('register.Address') }}: <br>

                        <div class="form-group row">
                            <label for="hno" class="col-md-4 col-form-label text-md-right">{{ trans('register.hno') }}</label>

                            <div class="col-md-6">
                                <input id="hno" type="text" class="form-control @error('hno') is-invalid @enderror" name="hno" @isset($user) value="{{ $user->address_street_hno }}" @else value="{{ old('hno') }}" @endisset >

                                @error('hno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="village" class="col-md-4 col-form-label text-md-right">{{ trans('register.Village') }}</label>

                            <div class="col-md-6">
                                <input id="village" type="text" class="form-control @error('village') is-invalid @enderror" name="village" @isset($user) value="{{ $user->address_village }}" @else value="{{ old('village') }}" @endisset >

                                @error('village')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taluka" class="col-md-4 col-form-label text-md-right">{{ trans('register.Taluka') }}</label>

                            <div class="col-md-6">
                                <input id="taluka" type="text" class="form-control @error('taluka') is-invalid @enderror" name="taluka" @isset($user) value="{{ $user->address_taluka }}" @else value="{{ old('taluka') }}" @endisset>

                                @error('taluka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="district" class="col-md-4 col-form-label text-md-right">{{ trans('register.District') }}</label>

                            <div class="col-md-6">
                                <select id="district" class="form-control" name="district" @isset($user) value="{{ $user->address_district }}" @else value="{{ old('district') }}" @endisset required>
                                    <option value="Ahmedabad"> {{ __('Ahmedabad')}} </option>
                                    <option value="Vadodara"> {{ __('Vadodara')}} </option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ trans('register.State') }}</label>

                            <div class="col-md-6">
                                <select id="state" class="form-control" name="state" @isset($user) value="{{ $user->address_state }}" @else value="{{ old('state') }}" @endisset required>
                                    <option value="Gujarat"> {{ __('Gujarat')}} </option>
                                    <option value="Rajasthan"> {{ __('Rajasthan')}} </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ trans('register.Country') }}</label>

                            <div class="col-md-6">
                                <select id="country" class="form-control" name="country" @isset($user) value="{{ $user->address_country }}" @else value="{{ old('country') }}" @endisset required>
                                    <option value="India"> {{ __('India')}} </option>
                                    <option value="Other"> {{ __('Other')}} </option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pincode" class="col-md-4 col-form-label text-md-right">{{ trans('register.Pincode') }}</label>

                            <div class="col-md-6">
                                <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" @isset($user) value="{{ $user->address_pincode }}" @else value="{{ old('pincode') }}" @endisset>

                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ trans('register.Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" @isset($user) value="{{ $user->phone }}" @else value="{{ old('phone') }}" @endisset>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ trans('register.mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" @isset($user) value="{{ $user->mob_no }}" @else value="{{ old('mobile') }}" @endisset>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="whatsapp" class="col-md-4 col-form-label text-md-right">{{ trans('register.whatsapp') }}</label>

                            <div class="col-md-6">
                                <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" @isset($user) value="{{ $user->whatsapp_mob_no }}" @else value="{{ old('whatsapp') }}" @endisset>

                                @error('whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telegram" class="col-md-4 col-form-label text-md-right">{{ trans('register.telegram') }}</label>

                            <div class="col-md-6">
                                <input id="telegram" type="text" class="form-control @error('telegram') is-invalid @enderror" name="telegram" @isset($user) value="{{ $user->telegram_mob_no }}" @else value="{{ old('telegram') }}" @endisset>

                                @error('telegram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ trans('register.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" @isset($user) value="{{ $user->email }}" @else value="{{ old('email') }}" @endisset required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                @isset($user) {{ trans('register.Save') }} @else {{ trans('register.Register') }} @endisset
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
