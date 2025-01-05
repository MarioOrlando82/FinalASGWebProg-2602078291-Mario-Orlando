@extends('layouts.master')

@section('title', __('messages.payment_overpaid'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-danger mb-4">{{ __('messages.payment_overpaid') }}</h1>
        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body text-center">
                <p class="fs-5 mb-4">
                    {{ __('messages.sorry_overpaid', ['amount' => $overPaid]) }}
                    {{ __('messages.add_balance_question') }}
                </p>
                <form action="{{ route('payment.addToWallet') }}" method="POST" class="d-inline-block me-2">
                    @csrf
                    <button type="submit" class="btn btn-success">{{ __('messages.yes') }}</button>
                </form>
                <form action="{{ route('payment.checkout') }}" method="GET" class="d-inline-block">
                    <button type="submit" class="btn btn-secondary">{{ __('messages.no') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
