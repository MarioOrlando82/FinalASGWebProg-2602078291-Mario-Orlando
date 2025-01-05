@extends('layouts.master')

@section('title', __('messages.login'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4 text-primary">{{ __('messages.login') }}</h1>
        <div class="card shadow-sm mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <form action="/user/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
                        <input type="email" class="form-control shadow-sm" id="email" name="email" required placeholder="{{ __('messages.enter_email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('messages.password') }}</label>
                        <input type="password" class="form-control shadow-sm" id="password" name="password" required placeholder="{{ __('messages.enter_password') }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.login') }}</button>
                </form>
                <p class="text-center mt-3 mb-0">
                    {{ __('messages.no_account') }} <a href="{{ route('user.register') }}" class="text-primary">{{ __('messages.register_here') }}</a>.
                </p>
            </div>
        </div>
    </div>
@endsection
