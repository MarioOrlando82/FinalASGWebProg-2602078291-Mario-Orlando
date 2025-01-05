@extends('layouts.master')

@section('title', __('messages.payment_checkout'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4 text-primary">{{ __('messages.payment_checkout') }}</h1>
        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <p class="text-center fs-5 mb-4">
                    {{ __('messages.registration_fee') }}: <strong class="text-success">{{ $user->registration_price }}</strong> {{ __('messages.coins') }}
                </p>
                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="amount" class="form-label">{{ __('messages.enter_payment_amount') }}</label>
                        <input type="number" class="form-control shadow-sm" id="amount" name="amount" required placeholder="{{ __('messages.enter_amount_placeholder') }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.pay') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
