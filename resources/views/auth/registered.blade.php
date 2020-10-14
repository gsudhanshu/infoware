@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Registered') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ __('New User registered successfully.') }}
                        {{ __('Note down the password: ').$user->password }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
