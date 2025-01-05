@extends('layouts.master')

@section('title', __('messages.topup_coins'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4 text-primary">{{ __('messages.topup_coins') }}</h1>
        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body text-center">
                <p class="fs-5 mb-4">
                    {{ __('messages.current_balance') }}: <strong class="text-success">{{ Auth::user()->coins }} {{ __('messages.coins') }}</strong>
                </p>
                <form action="{{ route('topup.add') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success w-100">{{ __('messages.topup_100_coins') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
