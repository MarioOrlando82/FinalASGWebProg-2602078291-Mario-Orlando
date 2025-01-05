@extends('layouts.master')

@section('title', __('messages.avatars'))

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">{{ __('messages.avatars') }}</h1>

        <div class="row g-4">
            @foreach ($avatars as $avatar)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset($avatar->image_path) }}" class="card-img-top" alt="{{ __('messages.avatar_image') }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ __('messages.price') }}: {{ $avatar->price }} {{ __('messages.coins') }}</h5>
                            <form action="{{ route('avatar.buy') }}" method="POST" class="mb-3">
                                @csrf
                                <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                                <button type="submit" class="btn btn-success w-100">{{ __('messages.buy') }}</button>
                            </form>
                            <form action="{{ route('avatar.send') }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="avatar_id" value="{{ $avatar->id }}">
                                <div class="mb-3">
                                    <label for="receiver_id" class="form-label">{{ __('messages.send_to') }}:</label>
                                    <select name="receiver_id" id="receiver_id" class="form-select" required>
                                        <option value="" disabled selected>{{ __('messages.select_user') }}</option>
                                        @foreach ($users as $user)
                                            @if ($user->id !== Auth::id())
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary w-100">{{ __('messages.send') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
